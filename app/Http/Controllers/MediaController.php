<?php

namespace App\Http\Controllers;

use App\Models\MediaFile;
use App\Models\MediaFolder;
use App\Models\MediaShare;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = MediaFile::with('uploader');
        
        if ($request->collection) {
            $query->where('collection', $request->collection);
        }
        
        if ($request->folder_id) {
            $query->where('folder_id', $request->folder_id);
        }
        
        $files = $query->latest()->paginate(20);
        
        return view('dashboard.mediatheque.index', [
            'files' => $files,
            'folders' => MediaFolder::whereNull('parent_id')->with('children')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:102400', // 100MB max
            'folder_id' => 'nullable|exists:media_folders,id',
            'collection' => 'required|string',
            'is_public' => 'boolean'
        ]);

        $file = $request->file('file');
        $path = $file->store('media/' . $request->collection);

        $media = MediaFile::create([
            'name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getMimeType(),
            'collection' => $request->collection,
            'size_in_bytes' => $file->getSize(),
            'uploaded_by' => Auth::id(),
            'is_public' => $request->is_public ?? false,
            'folder_id' => $request->folder_id
        ]);

        return response()->json($media);
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:media_folders,id'
        ]);

        $folder = MediaFolder::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'created_by' => Auth::id()
        ]);

        return response()->json($folder);
    }

    public function createShare(Request $request, MediaFile $file)
    {
        $request->validate([
            'expires_at' => 'nullable|date|after:now',
            'download_limit' => 'nullable|integer|min:1'
        ]);

        $share = $file->shares()->create([
            'token' => Str::random(32),
            'expires_at' => $request->expires_at,
            'download_limit' => $request->download_limit
        ]);

        return response()->json([
            'share_url' => route('media.shared', $share->token)
        ]);
    }

    public function download(MediaShare $share)
    {
        if (!$share->isValid()) {
            abort(403, 'This share link has expired or reached its download limit.');
        }

        $share->incrementDownloadCount();

        return Storage::download(
            $share->file->file_path,
            $share->file->name
        );
    }

    public function destroy(MediaFile $file)
    {
        Storage::delete($file->file_path);
        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }

    public function destroyFolder(MediaFolder $folder)
    {
        // Delete all files in the folder
        MediaFile::where('folder_id', $folder->id)->each(function ($file) {
            Storage::delete($file->file_path);
            $file->delete();
        });

        // Delete the folder and its subfolders
        $folder->delete();

        return response()->json(['message' => 'Folder deleted successfully']);
    }
}