<li>
    <div class="d-flex align-items-center mb-2">
        <i class="fas fa-folder text-warning mr-2"></i>
        <span>{{ $folder->name }}</span>
        <button class="btn btn-link btn-sm p-0 ml-auto" onclick="deleteFolder({{ $folder->id }})">
            <i class="fas fa-trash text-danger"></i>
        </button>
    </div>
    @if($folder->children->count() > 0)
        <ul class="list-unstyled ml-3">
            @foreach($folder->children as $child)
                @include('dashboard.mediatheque.partials.folder', ['folder' => $child])
            @endforeach
        </ul>
    @endif
</li>