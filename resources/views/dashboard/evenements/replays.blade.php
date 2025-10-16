@extends('dashboard.layout')

@section('title', 'Replays et Enregistrements - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-play-circle text-primary mr-2"></i>
            Replays et Enregistrements
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('evenements.index') }}">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Replays</li>
                </ol>
            </nav>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary btn-sm" onclick="uploadVideo()">
                    <i class="fas fa-upload mr-1"></i>
                    <span class="d-none d-sm-inline">Upload</span>
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="createPlaylist()">
                    <i class="fas fa-list mr-1"></i>
                    <span class="d-none d-sm-inline">Playlist</span>
                </button>
                <button type="button" class="btn btn-info btn-sm" onclick="viewAnalytics()">
                    <i class="fas fa-chart-bar mr-1"></i>
                    <span class="d-none d-sm-inline">Analytics</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Video Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Vidéos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Vues Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12,458</div>
                            <div class="text-xs text-success">+23% ce mois</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Durée Totale</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">248h</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Temps Moyen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">34 min</div>
                            <div class="text-xs text-info">Par visionnage</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Videos Section -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-fire mr-2"></i>
                        Vidéos les Plus Populaires
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card video-card">
                                <div class="video-thumbnail">
                                    <img src="{{ asset('dashboard/img/video-thumb1.jpg') }}"
                                         class="card-img-top" alt="Video thumbnail">
                                    <div class="play-overlay">
                                        <i class="fas fa-play-circle"></i>
                                    </div>
                                    <div class="video-duration">1:45:20</div>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="card-title">Réformes du Code Pénal 2025</h6>
                                    <p class="card-text text-muted small">Dr. Diabaté • 2,847 vues</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Il y a 3 jours</small>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary" onclick="playVideo(1)">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="btn btn-sm btn-secondary" onclick="downloadVideo(1)">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card video-card">
                                <div class="video-thumbnail">
                                    <img src="{{ asset('dashboard/img/video-thumb2.jpg') }}"
                                         class="card-img-top" alt="Video thumbnail">
                                    <div class="play-overlay">
                                        <i class="fas fa-play-circle"></i>
                                    </div>
                                    <div class="video-duration">2:15:30</div>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="card-title">Droit du Travail Modernisé</h6>
                                    <p class="card-text text-muted small">Me. Evelyne • 1,923 vues</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Il y a 1 semaine</small>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary" onclick="playVideo(2)">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="btn btn-sm btn-secondary" onclick="downloadVideo(2)">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-chart-pie mr-2"></i>
                        Catégories Populaires
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="categoriesChart"></canvas>
                    <div class="mt-3 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Droit Pénal</span><br>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Droit Civil</span><br>
                        <span class="mr-2"><i class="fas fa-circle text-warning"></i> Droit Commercial</span><br>
                        <span class="mr-2"><i class="fas fa-circle text-info"></i> Autres</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Library -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-folder-open mr-2"></i>
                Bibliothèque Vidéo
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <div class="dropdown-header">Actions:</div>
                    <a class="dropdown-item" href="#" onclick="bulkDelete()">
                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                        Supprimer sélectionnés
                    </a>
                    <a class="dropdown-item" href="#" onclick="bulkDownload()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Télécharger sélectionnés
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="exportList()">
                        <i class="fas fa-file-export fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter liste
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <select class="form-control" id="categoryFilter" onchange="filterVideos()">
                        <option value="">Toutes catégories</option>
                        <option value="droit_penal">Droit Pénal</option>
                        <option value="droit_civil">Droit Civil</option>
                        <option value="droit_commercial">Droit Commercial</option>
                        <option value="droit_travail">Droit du Travail</option>
                        <option value="droit_fiscal">Droit Fiscal</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <select class="form-control" id="qualityFilter" onchange="filterVideos()">
                        <option value="">Toutes qualités</option>
                        <option value="4k">4K</option>
                        <option value="1080p">1080p</option>
                        <option value="720p">720p</option>
                        <option value="480p">480p</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <select class="form-control" id="durationFilter" onchange="filterVideos()">
                        <option value="">Toutes durées</option>
                        <option value="short">Court (&lt; 30min)</option>
                        <option value="medium">Moyen (30-90min)</option>
                        <option value="long">Long (&gt; 90min)</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="videoSearchInput" placeholder="Rechercher une vidéo...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 mb-2">
                    <button class="btn btn-secondary btn-block" onclick="resetVideoFilters()">
                        <i class="fas fa-undo"></i>
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="videosTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAllVideos">
                                </div>
                            </th>
                            <th>Vidéo</th>
                            <th>Catégorie</th>
                            <th>Durée</th>
                            <th>Vues</th>
                            <th>Date Upload</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input video-checkbox" type="checkbox" value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="video-thumb mr-3">
                                        <img src="{{ asset('dashboard/img/video-thumb1.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 80px; height: 45px;">
                                        <div class="play-overlay-small">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <strong>Réformes du Code Pénal 2025</strong><br>
                                        <small class="text-muted">Analyse complète des nouvelles dispositions</small><br>
                                        <small class="text-info">Dr. Diabaté</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-primary">Droit Pénal</span></td>
                            <td>
                                <span class="badge badge-info">1h 45min</span><br>
                                <small class="text-muted">1080p</small>
                            </td>
                            <td>
                                <strong>2,847</strong><br>
                                <small class="text-success">+124 cette semaine</small>
                            </td>
                            <td>
                                05/01/2025<br>
                                <small class="text-muted">Il y a 5 jours</small>
                            </td>
                            <td>
                                <span class="badge badge-success">
                                    <i class="fas fa-check-circle mr-1"></i>Publié
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary btn-sm" onclick="playVideo(1)" title="Lire">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="editVideo(1)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" onclick="shareVideo(1)" title="Partager">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadVideo(1)" title="Télécharger">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteVideo(1)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input video-checkbox" type="checkbox" value="2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="video-thumb mr-3">
                                        <img src="{{ asset('dashboard/img/video-thumb2.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 80px; height: 45px;">
                                        <div class="play-overlay-small">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <strong>Droit du Travail Modernisé</strong><br>
                                        <small class="text-muted">Impact des nouvelles lois sur l'emploi</small><br>
                                        <small class="text-info">Me. Evelyne</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-success">Droit du Travail</span></td>
                            <td>
                                <span class="badge badge-info">2h 15min</span><br>
                                <small class="text-muted">1080p</small>
                            </td>
                            <td>
                                <strong>1,923</strong><br>
                                <small class="text-success">+87 cette semaine</small>
                            </td>
                            <td>
                                03/01/2025<br>
                                <small class="text-muted">Il y a 1 semaine</small>
                            </td>
                            <td>
                                <span class="badge badge-success">
                                    <i class="fas fa-check-circle mr-1"></i>Publié
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary btn-sm" onclick="playVideo(2)" title="Lire">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="editVideo(2)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" onclick="shareVideo(2)" title="Partager">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadVideo(2)" title="Télécharger">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteVideo(2)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input video-checkbox" type="checkbox" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="video-thumb mr-3">
                                        <img src="{{ asset('dashboard/img/video-thumb3.jpg') }}"
                                             alt="Thumbnail" class="img-thumbnail" style="width: 80px; height: 45px;">
                                        <div class="play-overlay-small">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <strong>Droit Commercial : Contrats Modernes</strong><br>
                                        <small class="text-muted">Techniques de négociation avancées</small><br>
                                        <small class="text-info">Me. Koffi</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge badge-warning">Droit Commercial</span></td>
                            <td>
                                <span class="badge badge-warning">En traitement</span><br>
                                <small class="text-muted">Est. 1h 30min</small>
                            </td>
                            <td>
                                <strong>-</strong><br>
                                <small class="text-muted">Pas encore publié</small>
                            </td>
                            <td>
                                08/01/2025<br>
                                <small class="text-muted">Il y a 2 jours</small>
                            </td>
                            <td>
                                <span class="badge badge-warning">
                                    <i class="fas fa-clock mr-1"></i>En traitement
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-secondary btn-sm" disabled title="En traitement">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="btn btn-info btn-sm" onclick="editVideo(3)" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="checkProgress(3)" title="Progression">
                                        <i class="fas fa-percentage"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteVideo(3)" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: Video Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-upload mr-2"></i>
                        Uploader une Vidéo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="videoFile" class="form-label">Fichier vidéo *</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="videoFile" accept="video/*" required>
                                <label class="custom-file-label" for="videoFile">Choisir un fichier...</label>
                            </div>
                            <small class="form-text text-muted">Formats acceptés: MP4, MOV, AVI. Taille max: 2GB</small>
                        </div>

                        <div class="mb-3">
                            <label for="videoTitle" class="form-label">Titre *</label>
                            <input type="text" class="form-control" id="videoTitle" required>
                        </div>

                        <div class="mb-3">
                            <label for="videoDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="videoDescription" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="videoCategory" class="form-label">Catégorie *</label>
                                <select class="form-control" id="videoCategory" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="droit_penal">Droit Pénal</option>
                                    <option value="droit_civil">Droit Civil</option>
                                    <option value="droit_commercial">Droit Commercial</option>
                                    <option value="droit_travail">Droit du Travail</option>
                                    <option value="droit_fiscal">Droit Fiscal</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="videoSpeaker" class="form-label">Intervenant</label>
                                <input type="text" class="form-control" id="videoSpeaker" placeholder="Nom de l'intervenant">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="videoThumbnail" class="form-label">Miniature</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="videoThumbnail" accept="image/*">
                                <label class="custom-file-label" for="videoThumbnail">Choisir une image...</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publishImmediately">
                                <label class="form-check-label" for="publishImmediately">
                                    Publier immédiatement après traitement
                                </label>
                            </div>
                        </div>
                    </form>

                    <!-- Upload Progress -->
                    <div id="uploadProgress" style="display: none;">
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <p class="text-center"><span id="uploadStatus">Préparation...</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="startUpload()">
                        <i class="fas fa-upload mr-1"></i>Commencer l'upload
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Video Player -->
    <div class="modal fade" id="videoPlayerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoPlayerTitle">
                        <i class="fas fa-play mr-2"></i>
                        Lecteur Vidéo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="video-player-container">
                        <video id="videoPlayer" class="w-100" controls>
                            <source src="" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture vidéo.
                        </video>
                    </div>
                    <div class="p-3">
                        <div id="videoPlayerInfo">
                            <!-- Video info populated by JavaScript -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Fermer
                    </button>
                    <button type="button" class="btn btn-success" onclick="shareCurrentVideo()">
                        <i class="fas fa-share mr-1"></i>Partager
                    </button>
                    <button type="button" class="btn btn-primary" onclick="downloadCurrentVideo()">
                        <i class="fas fa-download mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#videosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            },
            "order": [[ 5, "desc" ]], // Sort by upload date
            "pageLength": 15,
            "columnDefs": [
                { "orderable": false, "targets": [0, 7] } // Disable sorting for checkbox and actions
            ]
        });

        // Initialize charts
        initializeCharts();

        // Checkbox functionality
        $('#selectAllVideos').change(function() {
            $('.video-checkbox').prop('checked', this.checked);
        });

        $('.video-checkbox').change(function() {
            if (!this.checked) {
                $('#selectAllVideos').prop('checked', false);
            } else if ($('.video-checkbox:checked').length === $('.video-checkbox').length) {
                $('#selectAllVideos').prop('checked', true);
            }
        });
    });

    function initializeCharts() {
        // Categories Chart
        var ctx = document.getElementById("categoriesChart");
        var categoriesChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Droit Pénal', 'Droit Civil', 'Droit Commercial', 'Autres'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#f4b619', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    }

    // Video management functions
    function playVideo(id) {
        // Set video source based on ID
        const videoSources = {
            1: '/videos/reforme-code-penal-2025.mp4',
            2: '/videos/droit-travail-modernise.mp4',
            3: '/videos/droit-commercial-contrats.mp4'
        };

        const videoTitles = {
            1: 'Réformes du Code Pénal 2025',
            2: 'Droit du Travail Modernisé',
            3: 'Droit Commercial : Contrats Modernes'
        };

        const videoInfos = {
            1: {
                speaker: 'Dr. Diabaté',
                duration: '1h 45min',
                views: '2,847',
                category: 'Droit Pénal'
            },
            2: {
                speaker: 'Me. Evelyne',
                duration: '2h 15min',
                views: '1,923',
                category: 'Droit du Travail'
            }
        };

        // Update modal content
        document.getElementById('videoPlayerTitle').innerHTML = `<i class="fas fa-play mr-2"></i>${videoTitles[id]}`;
        document.getElementById('videoPlayer').src = videoSources[id];

        if (videoInfos[id]) {
            document.getElementById('videoPlayerInfo').innerHTML = `
                <h6>${videoTitles[id]}</h6>
                <p class="text-muted mb-2">Par ${videoInfos[id].speaker}</p>
                <div class="d-flex justify-content-between">
                    <small><i class="fas fa-clock mr-1"></i>Durée: ${videoInfos[id].duration}</small>
                    <small><i class="fas fa-eye mr-1"></i>Vues: ${videoInfos[id].views}</small>
                    <small><i class="fas fa-tag mr-1"></i>Catégorie: ${videoInfos[id].category}</small>
                </div>
            `;
        }

        $('#videoPlayerModal').data('video-id', id);
        $('#videoPlayerModal').modal('show');
    }

    function editVideo(id) {
        console.log('Editing video:', id);
        alert('Modification de la vidéo disponible bientôt.');
    }

    function shareVideo(id) {
        console.log('Sharing video:', id);
        if (navigator.share) {
            navigator.share({
                title: 'Vidéo Axe Legal',
                text: 'Regardez cette vidéo juridique',
                url: window.location.origin + '/videos/' + id
            });
        } else {
            alert('Lien de partage copié dans le presse-papiers');
        }
    }

    function downloadVideo(id) {
        console.log('Downloading video:', id);
        alert('Téléchargement de la vidéo en cours...');
    }

    function deleteVideo(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette vidéo ?')) {
            console.log('Deleting video:', id);
            alert('Vidéo supprimée !');
        }
    }

    function checkProgress(id) {
        console.log('Checking progress for video:', id);
        alert('Progression du traitement : 65%');
    }

    // Upload functions
    function uploadVideo() {
        document.getElementById('uploadForm').reset();
        document.getElementById('uploadProgress').style.display = 'none';
        $('#uploadModal').modal('show');
    }

    function startUpload() {
        const form = document.getElementById('uploadForm');
        if (form.checkValidity()) {
            // Show progress
            document.getElementById('uploadProgress').style.display = 'block';

            // Simulate upload progress
            let progress = 0;
            const progressBar = document.querySelector('#uploadProgress .progress-bar');
            const statusText = document.getElementById('uploadStatus');

            const interval = setInterval(() => {
                progress += Math.random() * 10;
                if (progress > 100) progress = 100;

                progressBar.style.width = progress + '%';

                if (progress < 30) {
                    statusText.textContent = 'Upload en cours...';
                } else if (progress < 70) {
                    statusText.textContent = 'Traitement de la vidéo...';
                } else if (progress < 100) {
                    statusText.textContent = 'Finalisation...';
                } else {
                    statusText.textContent = 'Upload terminé !';
                    clearInterval(interval);
                    setTimeout(() => {
                        $('#uploadModal').modal('hide');
                        alert('Vidéo uploadée avec succès !');
                    }, 1000);
                }
            }, 200);
        } else {
            form.reportValidity();
        }
    }

    // Filter functions
    function filterVideos() {
        const category = document.getElementById('categoryFilter').value;
        const quality = document.getElementById('qualityFilter').value;
        const duration = document.getElementById('durationFilter').value;
        console.log('Filtering videos:', { category, quality, duration });
    }

    function resetVideoFilters() {
        document.getElementById('categoryFilter').value = '';
        document.getElementById('qualityFilter').value = '';
        document.getElementById('durationFilter').value = '';
        document.getElementById('videoSearchInput').value = '';
        $('#videosTable').DataTable().search('').draw();
    }

    // Bulk actions
    function bulkDelete() {
        const selected = $('.video-checkbox:checked').length;
        if (selected > 0) {
            if (confirm(`Supprimer ${selected} vidéo(s) sélectionnée(s) ?`)) {
                console.log('Bulk deleting videos');
                alert(`${selected} vidéo(s) supprimée(s) !`);
            }
        } else {
            alert('Veuillez sélectionner au moins une vidéo.');
        }
    }

    function bulkDownload() {
        const selected = $('.video-checkbox:checked').length;
        if (selected > 0) {
            console.log(`Bulk downloading ${selected} videos`);
            alert(`Téléchargement de ${selected} vidéo(s) en cours...`);
        } else {
            alert('Veuillez sélectionner au moins une vidéo.');
        }
    }

    // Playlist and analytics
    function createPlaylist() {
        console.log('Creating new playlist');
        alert('Création de playlist disponible bientôt.');
    }

    function viewAnalytics() {
        console.log('Viewing video analytics');
        alert('Analytics vidéo détaillées disponibles bientôt.');
    }

    function exportList() {
        console.log('Exporting video list');
        alert('Export de la liste des vidéos...');
    }

    // Video player modal functions
    function shareCurrentVideo() {
        const id = $('#videoPlayerModal').data('video-id');
        shareVideo(id);
    }

    function downloadCurrentVideo() {
        const id = $('#videoPlayerModal').data('video-id');
        downloadVideo(id);
    }

    // Auto-pause video when modal closes
    $('#videoPlayerModal').on('hidden.bs.modal', function () {
        document.getElementById('videoPlayer').pause();
    });
</script>

<style>
    .video-card {
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .video-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .video-thumbnail {
        position: relative;
        overflow: hidden;
    }

    .play-overlay, .play-overlay-small {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 2rem;
        opacity: 0.8;
        transition: opacity 0.2s ease;
    }

    .play-overlay-small {
        font-size: 1rem;
    }

    .video-thumbnail:hover .play-overlay,
    .video-thumb:hover .play-overlay-small {
        opacity: 1;
    }

    .video-duration {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.8rem;
    }

    .video-thumb {
        position: relative;
        overflow: hidden;
        border-radius: 4px;
    }

    .video-thumb img {
        object-fit: cover;
    }

    .video-player-container {
        background: #000;
    }

    #videoPlayer {
        max-height: 60vh;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
    }

    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
</style>
@endsection
