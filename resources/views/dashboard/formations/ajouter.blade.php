@extends('dashboard.layout')

@section('title', 'Ajouter Formation - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-graduation-cap text-warning mr-2"></i>
            Ajouter une Formation
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
            </ol>
        </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Nouvelle Formation
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.formations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="titre" class="form-label font-weight-bold">
                                        <i class="fas fa-tag mr-1"></i>
                                        Titre de la formation
                                    </label>
                                    <input type="text" class="form-control" id="titre" name="titre" required placeholder="Ex: Droit des contrats commerciaux">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duree" class="form-label font-weight-bold">
                                        <i class="fas fa-clock mr-1"></i>
                                        Durée (en heures)
                                    </label>
                                    <input type="number" class="form-control" id="duree" name="duree" required placeholder="Ex: 20">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prix" class="form-label font-weight-bold">
                                        <i class="fas fa-coins mr-1"></i>
                                        Prix (FCFA)
                                    </label>
                                    <input type="number" step="1" class="form-control" id="prix" name="prix" required placeholder="Ex: 149950">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="niveau" class="form-label font-weight-bold">
                                        <i class="fas fa-layer-group mr-1"></i>
                                        Niveau
                                    </label>
                                    <select class="form-control" id="niveau" name="niveau" required>
                                        <option value="">Sélectionner un niveau</option>
                                        <option value="debutant">Débutant</option>
                                        <option value="intermediaire">Intermédiaire</option>
                                        <option value="avance">Avancé</option>
                                        <option value="expert">Expert</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="form-label font-weight-bold">
                                        <i class="fas fa-folder mr-1"></i>
                                        Catégorie
                                    </label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach(\App\Models\FormationCategory::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_lecons" class="form-label font-weight-bold">
                                        <i class="fas fa-play-circle mr-1"></i>
                                        Nombre de leçons
                                    </label>
                                    <input type="number" class="form-control" id="nombre_lecons" name="nombre_lecons" placeholder="Ex: 15">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label font-weight-bold">
                                        <i class="fas fa-image mr-1"></i>
                                        Image de la formation
                                    </label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                    <small class="form-text text-muted">Formats acceptés: JPG, PNG, WEBP. Taille recommandée: 800x600px</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mt-4">
                                        <input type="checkbox" class="custom-control-input" id="populaire" name="populaire">
                                        <label class="custom-control-label font-weight-bold" for="populaire">
                                            <i class="fas fa-fire mr-1 text-danger"></i>
                                            Formation populaire
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label font-weight-bold">
                                <i class="fas fa-align-left mr-1"></i>
                                Description
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Décrivez le contenu et les objectifs de la formation..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="objectifs" class="form-label font-weight-bold">
                                <i class="fas fa-bullseye mr-1"></i>
                                Objectifs pédagogiques
                            </label>
                            <textarea class="form-control" id="objectifs" name="objectifs" rows="3" placeholder="Listez les compétences que les participants acquerront..."></textarea>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.formations.liste') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i>
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="fas fa-save mr-2"></i>
                                Créer la formation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Auto-resize textareas
    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
@endsection
