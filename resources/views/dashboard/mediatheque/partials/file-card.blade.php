@php
    $iconClass = match($file->collection) {
        'documents' => 'fa-file-alt',
        'images' => 'fa-image',
        'videos' => 'fa-video',
        default => 'fa-file'
    };
@endphp

<div class="col-xl-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="fas {{ $iconClass }} fa-3x text-gray-300"></i>
            </div>
            <h6 class="card-title text-truncate" title="{{ $file->name }}">
                {{ $file->name }}
            </h6>
            <p class="card-text">
                <small class="text-muted">
                    {{ $file->getSizeForHumans() }} • 
                    {{ $file->created_at->format('d/m/Y') }}
                </small>
            </p>
            <div class="btn-group btn-group-sm w-100">
                <a href="{{ $file->getPublicUrl() ?: route('dashboard.media.shared', ['token' => $file->shares->first()?->token]) }}" 
                   class="btn btn-primary" target="_blank">
                    <i class="fas fa-download"></i>
                </a>
                <button class="btn btn-info" onclick="createShare({{ $file->id }})">
                    <i class="fas fa-share-alt"></i>
                </button>
                <button class="btn btn-danger" onclick="deleteFile({{ $file->id }})">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</div>