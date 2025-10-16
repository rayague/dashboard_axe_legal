<?php

namespace App\Http\Controllers;

use App\Models\AIAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function analyze(Request $request)
    {
        $request->validate([
            'document' => 'required|file|max:10240', // max 10MB
            'analysis_type' => 'required|in:contract_review,legal_research,document_generation'
        ]);

        $path = $request->file('document')->store('ai-documents');
        
        $analysis = AIAnalysis::create([
            'user_id' => auth()->id(),
            'document_path' => $path,
            'analysis_type' => $request->analysis_type,
            'status' => 'pending'
        ]);

        // Queue the analysis job
        dispatch(new ProcessAIAnalysis($analysis));

        return response()->json([
            'message' => 'Analysis queued successfully',
            'analysis_id' => $analysis->id
        ]);
    }

    public function generateDocument(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:ai_templates,id',
            'variables' => 'required|array'
        ]);

        $template = AITemplate::findOrFail($request->template_id);
        
        $analysis = AIAnalysis::create([
            'user_id' => auth()->id(),
            'analysis_type' => 'document_generation',
            'status' => 'pending',
            'metadata' => [
                'template_id' => $template->id,
                'variables' => $request->variables
            ]
        ]);

        // Queue the document generation job
        dispatch(new GenerateAIDocument($analysis));

        return response()->json([
            'message' => 'Document generation queued',
            'analysis_id' => $analysis->id
        ]);
    }

    public function getStatus($id)
    {
        $analysis = AIAnalysis::findOrFail($id);
        
        return response()->json([
            'status' => $analysis->status,
            'result' => $analysis->result,
            'confidence_score' => $analysis->confidence_score
        ]);
    }

    public function getTemplates()
    {
        $templates = AITemplate::where('is_active', true)
            ->orderBy('category')
            ->get();

        return response()->json($templates);
    }
}