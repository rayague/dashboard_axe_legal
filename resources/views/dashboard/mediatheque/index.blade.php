@extends('dashboard.layout')

@section('title', 'Médiathèque - Gestion des Fichiers')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-photo-video text-primary mr-2"></i>
            Médiathèque
        </h1>
        <div class="btn-group">
            <button class="btn btn-primary btn-sm" onclick="showUploadModal()">
                <i class="fas fa-upload mr-1"></i>
                Nouveau Fichier
            </button>
            <button class="btn btn-info btn-sm" onclick="showFolderModal()">
                <i class="fas fa-folder-plus mr-1"></i>
                Nouveau Dossier
            </button>
        </div>
    </div>

    <!-- Folder Structure -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dossiers</h6>
                </div>
                <div class="card-body">
                    <div id="folder-tree">
                        <ul class="list-unstyled">
                            @foreach($folders as $folder)
                                @include('dashboard.mediatheque.partials.folder', ['folder' => $folder])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- File List -->
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Fichiers</h6>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary btn-sm" onclick="toggleViewMode('grid')">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="toggleViewMode('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="files-container" class="row" data-view-mode="grid">
                        @foreach($files as $file)
                            @include('dashboard.mediatheque.partials.file-card', ['file' => $file])
                        @endforeach
                    </div>
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Fichier</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Fichier</label>
                            <input type="file" class="form-control-file" name="file" required>
                        </div>
                        <div class="form-group">
                            <label>Collection</label>
                            <select class="form-control" name="collection" required>
                                <option value="documents">Documents</option>
                                <option value="images">Images</option>
                                <option value="videos">Vidéos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dossier</label>
                            <select class="form-control" name="folder_id">
                                <option value="">Racine</option>
                                @foreach($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->getPath() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="isPublic" name="is_public">
                            <label class="custom-control-label" for="isPublic">Fichier public</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Téléverser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Folder Modal -->
    <div class="modal fade" id="folderModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="folderForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom du dossier</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Dossier parent</label>
                            <select class="form-control" name="parent_id">
                                <option value="">Racine</option>
                                @foreach($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->getPath() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function showUploadModal() {
        $('#uploadModal').modal('show');
    }

    function showFolderModal() {
        $('#folderModal').modal('show');
    }

    function toggleViewMode(mode) {
        const container = document.getElementById('files-container');
        container.dataset.viewMode = mode;
    }

    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch('{{ route("dashboard.media.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            $('#uploadModal').modal('hide');
            location.reload();
        });
    });

    document.getElementById('folderForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch('{{ route("dashboard.media.folders.store") }}', {
            method: 'POST',
            body: JSON.stringify(Object.fromEntries(formData)),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            $('#folderModal').modal('hide');
            location.reload();
        });
    });

    function createShare(fileId) {
        fetch(`/dashboard/mediatheque/${fileId}/share`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Copy share URL to clipboard
            navigator.clipboard.writeText(data.share_url);
            alert('Lien de partage copié dans le presse-papier');
        });
    }

    function deleteFile(fileId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?')) {
            fetch(`/dashboard/mediatheque/${fileId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(() => location.reload());
        }
    }

    function deleteFolder(folderId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce dossier et tout son contenu ?')) {
            fetch(`/dashboard/mediatheque/folders/${folderId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(() => location.reload());
        }
    }
</script>
@endsection