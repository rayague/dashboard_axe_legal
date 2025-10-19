@extends('dashboard.layout')

@section('title', 'Modifier Formation - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit text-warning mr-2"></i>
            Modifier la Formation
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.formations.liste') }}">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier</li>
            </ol>
        </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-edit mr-2"></i>
                        Modifier la Formation
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.formations.update', $formation) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="titre" class="form-label font-weight-bold">
                                        <i class="fas fa-tag mr-1"></i>
                                        Titre de la formation
                                    </label>
                                    <input type="text" class="form-control" id="titre" name="titre" required
                                           value="{{ old('titre', $formation->titre) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duree" class="form-label font-weight-bold">
                                        <i class="fas fa-clock mr-1"></i>
                                        Durée (en heures)
                                    </label>
                                    <input type="number" class="form-control" id="duree" name="duree" required
                                           value="{{ old('duree', $formation->duree) }}">
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
                                    <input type="number" step="1" class="form-control" id="prix" name="prix" required
                                           value="{{ old('prix', $formation->prix) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="niveau" class="form-label font-weight-bold">
                                        <i class="fas fa-layer-group mr-1"></i>
                                        Niveau
                                    </label>
                                    <select class="form-control" id="niveau" name="niveau" required>
                                        <option value="debutant" {{ $formation->niveau == 'debutant' ? 'selected' : '' }}>Débutant</option>
                                        <option value="intermediaire" {{ $formation->niveau == 'intermediaire' ? 'selected' : '' }}>Intermédiaire</option>
                                        <option value="avance" {{ $formation->niveau == 'avance' ? 'selected' : '' }}>Avancé</option>
                                        <option value="expert" {{ $formation->niveau == 'expert' ? 'selected' : '' }}>Expert</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label font-weight-bold">
                                <i class="fas fa-align-left mr-1"></i>
                                Description
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $formation->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="objectifs" class="form-label font-weight-bold">
                                <i class="fas fa-bullseye mr-1"></i>
                                Objectifs pédagogiques
                            </label>
                            <textarea class="form-control" id="objectifs" name="objectifs" rows="3">{{ old('objectifs', $formation->objectifs) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save mr-1"></i>
                                Enregistrer les modifications
                            </button>
                            <a href="{{ route('dashboard.formations.liste') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-times mr-1"></i>
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
