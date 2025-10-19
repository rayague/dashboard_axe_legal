@extends('dashboard.layout')

@section('title', 'Modifier Catégorie - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit text-warning mr-2"></i>
            Modifier Catégorie
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Catégories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier</li>
            </ol>
        </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-edit mr-2"></i>
                        Informations de la catégorie
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.categories.update', $category) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="nom" class="form-label font-weight-bold">
                                <i class="fas fa-tag mr-1"></i>
                                Nom de la catégorie <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                id="nom" name="nom" value="{{ old('nom', $category->nom) }}" required 
                                placeholder="Ex: Droit des Entreprises">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Le slug sera généré automatiquement</small>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label font-weight-bold">
                                <i class="fas fa-align-left mr-1"></i>
                                Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="3" 
                                placeholder="Décrivez cette catégorie...">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon" class="form-label font-weight-bold">
                                        <i class="fas fa-icons mr-1"></i>
                                        Icône FontAwesome <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                            id="icon" name="icon" value="{{ old('icon', $category->icon) }}" required 
                                            placeholder="fa-building">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas" id="icon-preview"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('icon')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <a href="https://fontawesome.com/icons" target="_blank">Voir les icônes disponibles</a>
                                    </small>
                                </div>

                                <!-- Icon Suggestions -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">Icônes suggérées :</small>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-building">
                                            <i class="fas fa-building"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-coins">
                                            <i class="fas fa-coins"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-file-contract">
                                            <i class="fas fa-file-contract"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-gavel">
                                            <i class="fas fa-gavel"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-home">
                                            <i class="fas fa-home"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-laptop-code">
                                            <i class="fas fa-laptop-code"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-balance-scale">
                                            <i class="fas fa-balance-scale"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fa-shield-alt">
                                            <i class="fas fa-shield-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color" class="form-label font-weight-bold">
                                        <i class="fas fa-palette mr-1"></i>
                                        Couleur <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="color" class="form-control @error('color') is-invalid @enderror" 
                                            id="color" name="color" value="{{ old('color', $category->color) }}" required 
                                            style="height: 45px;">
                                        <input type="text" class="form-control" id="color-text" readonly 
                                            value="{{ old('color', $category->color) }}" style="max-width: 100px;">
                                    </div>
                                    @error('color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Color Suggestions -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">Couleurs suggérées :</small>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #667eea; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#667eea"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #f093fb; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#f093fb"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #4facfe; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#4facfe"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #43e97b; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#43e97b"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #fa709a; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#fa709a"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #30cfd0; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#30cfd0"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #ff6b6b; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#ff6b6b"></button>
                                        <button type="button" class="btn btn-sm color-suggestion" 
                                            style="background: #feca57; width: 35px; height: 35px; border-radius: 5px;" 
                                            data-color="#feca57"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i>
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="fas fa-save mr-2"></i>
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="col-lg-4">
            <div class="card shadow sticky-top" style="top: 20px;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">
                        <i class="fas fa-eye mr-2"></i>
                        Aperçu
                    </h6>
                </div>
                <div class="card-body">
                    <div class="category-preview" style="border-left: 4px solid #667eea;" id="preview-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-circle" style="
                                width: 50px;
                                height: 50px;
                                border-radius: 50%;
                                background: #667eea15;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 15px;
                            " id="preview-icon-circle">
                                <i class="fas fa-folder fa-lg" id="preview-icon" style="color: #667eea;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 font-weight-bold" id="preview-nom">Nom de la catégorie</h5>
                                <small class="text-muted" id="preview-slug">slug-automatique</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3" id="preview-description">Description de la catégorie...</p>
                        <span class="badge badge-pill" id="preview-badge" style="background: #667eea; color: white;">
                            <i class="fas fa-graduation-cap mr-1"></i>
                            0 formation(s)
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview updates
        const nomInput = document.getElementById('nom');
        const descriptionInput = document.getElementById('description');
        const iconInput = document.getElementById('icon');
        const colorInput = document.getElementById('color');
        const colorText = document.getElementById('color-text');
        
        const previewNom = document.getElementById('preview-nom');
        const previewSlug = document.getElementById('preview-slug');
        const previewDescription = document.getElementById('preview-description');
        const previewIcon = document.getElementById('preview-icon');
        const previewIconPreview = document.getElementById('icon-preview');
        const previewCard = document.getElementById('preview-card');
        const previewIconCircle = document.getElementById('preview-icon-circle');
        const previewBadge = document.getElementById('preview-badge');

        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }

        nomInput.addEventListener('input', function() {
            previewNom.textContent = this.value || 'Nom de la catégorie';
            previewSlug.textContent = slugify(this.value) || 'slug-automatique';
        });

        descriptionInput.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'Description de la catégorie...';
        });

        iconInput.addEventListener('input', function() {
            const iconClass = this.value.startsWith('fa-') ? this.value : 'fa-' + this.value;
            previewIcon.className = 'fas ' + iconClass + ' fa-lg';
            previewIconPreview.className = 'fas ' + iconClass;
        });

        colorInput.addEventListener('input', function() {
            const color = this.value;
            colorText.value = color;
            previewCard.style.borderLeftColor = color;
            previewIcon.style.color = color;
            previewIconCircle.style.background = color + '15';
            previewBadge.style.background = color;
        });

        // Icon suggestions
        document.querySelectorAll('.icon-suggestion').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.getAttribute('data-icon');
                iconInput.value = icon;
                iconInput.dispatchEvent(new Event('input'));
            });
        });

        // Color suggestions
        document.querySelectorAll('.color-suggestion').forEach(btn => {
            btn.addEventListener('click', function() {
                const color = this.getAttribute('data-color');
                colorInput.value = color;
                colorInput.dispatchEvent(new Event('input'));
            });
        });

        // Initial preview
        iconInput.dispatchEvent(new Event('input'));
    </script>
@endsection
