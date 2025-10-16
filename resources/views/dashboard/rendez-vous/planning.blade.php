@extends('dashboard.layout')

@section('title', 'Planning des Rendez-vous - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-calendar-alt text-primary mr-2"></i>
            Planning des Rendez-vous
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Rendez-vous</li>
                    <li class="breadcrumb-item active" aria-current="page">Planning</li>
                </ol>
            </nav>
            <a href="{{ route('dashboard.rendez-vous.nouveau') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouveau RDV</span>
                <span class="d-sm-none">Nouveau</span>
            </a>
        </div>
    </div>

    <!-- Planning Controls -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-filter mr-2"></i>
                        Filtres et Navigation
                    </h6>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-primary active" id="viewDay">Jour</button>
                        <button type="button" class="btn btn-outline-primary" id="viewWeek">Semaine</button>
                        <button type="button" class="btn btn-outline-primary" id="viewMonth">Mois</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="font-weight-bold">Date sélectionnée</label>
                    <input type="date" class="form-control" id="selectedDate" value="">
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="font-weight-bold">Avocat</label>
                    <select class="form-control" id="lawyerFilter">
                        <option value="">Tous les avocats</option>
                        <option value="marie-dubois">Me Marie Dubois</option>
                        <option value="pierre-martin">Me Pierre Martin</option>
                        <option value="sophie-bernard">Me Sophie Bernard</option>
                        <option value="jean-dupont">Me Jean Dupont</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="font-weight-bold">Salle</label>
                    <select class="form-control" id="roomFilter">
                        <option value="">Toutes les salles</option>
                        <option value="salle-a">Salle A</option>
                        <option value="salle-b">Salle B</option>
                        <option value="salle-c">Salle C</option>
                        <option value="visio">Visioconférence</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="font-weight-bold">Statut</label>
                    <select class="form-control" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="confirme">Confirmé</option>
                        <option value="en-attente">En attente</option>
                        <option value="reporte">Reporté</option>
                        <option value="annule">Annulé</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RDV Aujourd'hui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirmés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">En Attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Taux Occupation</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">78%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar View -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-calendar fa-fw mr-2"></i>
                Planning - <span id="currentViewTitle">Aujourd'hui</span>
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <a class="dropdown-item" href="#" onclick="exportPlanning()">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exporter en PDF
                    </a>
                    <a class="dropdown-item" href="#" onclick="printPlanning()">
                        <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                        Imprimer
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <!-- Day View -->
            <div id="dayView" class="calendar-view">
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th width="80">Heure</th>
                                <th>Me Marie Dubois</th>
                                <th>Me Pierre Martin</th>
                                <th>Me Sophie Bernard</th>
                                <th>Me Jean Dupont</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-muted">08:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">09:00</td>
                                <td>
                                    <div class="appointment-slot bg-success text-white p-2 rounded mb-1">
                                        <div class="font-weight-bold">Sophie Bernard</div>
                                        <div class="small">Consultation juridique</div>
                                        <div class="small">1h - 60,000 FCFA</div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">10:00</td>
                                <td></td>
                                <td>
                                    <div class="appointment-slot bg-primary text-white p-2 rounded mb-1">
                                        <div class="font-weight-bold">Michel Dubois</div>
                                        <div class="small">Suivi de dossier</div>
                                        <div class="small">45min - 33,750 FCFA</div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">11:00</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="appointment-slot bg-info text-white p-2 rounded mb-1">
                                        <div class="font-weight-bold">Isabelle Leroy</div>
                                        <div class="small">Médiation</div>
                                        <div class="small">2h - 110,000 FCFA</div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">12:00</td>
                                <td colspan="4" class="text-center bg-light text-muted">
                                    <i class="fas fa-utensils mr-2"></i>Pause déjeuner
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">13:00</td>
                                <td colspan="4" class="text-center bg-light text-muted">
                                    <i class="fas fa-utensils mr-2"></i>Pause déjeuner
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">14:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="appointment-slot bg-warning text-dark p-2 rounded mb-1">
                                        <div class="font-weight-bold">Jean Martin</div>
                                        <div class="small">Conseil stratégique</div>
                                        <div class="small">1h30 - 97,500 FCFA</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">15:00</td>
                                <td>
                                    <div class="appointment-slot bg-secondary text-white p-2 rounded mb-1">
                                        <div class="font-weight-bold">Marie Lecomte</div>
                                        <div class="small">Signature documents</div>
                                        <div class="small">30min - 30,000 FCFA</div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">16:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">17:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Week View -->
            <div id="weekView" class="calendar-view d-none">
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th width="80"></th>
                                <th class="text-center">Lun 15</th>
                                <th class="text-center">Mar 16</th>
                                <th class="text-center">Mer 17</th>
                                <th class="text-center">Jeu 18</th>
                                <th class="text-center">Ven 19</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-muted">09:00</td>
                                <td>
                                    <div class="appointment-mini bg-success text-white p-1 rounded mb-1">
                                        <div class="small font-weight-bold">Sophie B.</div>
                                        <div class="small">Consultation</div>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="appointment-mini bg-primary text-white p-1 rounded mb-1">
                                        <div class="small font-weight-bold">Michel D.</div>
                                        <div class="small">Suivi</div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">10:00</td>
                                <td></td>
                                <td>
                                    <div class="appointment-mini bg-info text-white p-1 rounded mb-1">
                                        <div class="small font-weight-bold">Isabelle L.</div>
                                        <div class="small">Médiation</div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="appointment-mini bg-warning text-dark p-1 rounded mb-1">
                                        <div class="small font-weight-bold">Jean M.</div>
                                        <div class="small">Conseil</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">14:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="appointment-mini bg-secondary text-white p-1 rounded mb-1">
                                        <div class="small font-weight-bold">Marie L.</div>
                                        <div class="small">Signature</div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Month View -->
            <div id="monthView" class="calendar-view d-none">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th>Lun</th>
                                <th>Mar</th>
                                <th>Mer</th>
                                <th>Jeu</th>
                                <th>Ven</th>
                                <th>Sam</th>
                                <th>Dim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="calendar-day text-muted">28</td>
                                <td class="calendar-day text-muted">29</td>
                                <td class="calendar-day text-muted">30</td>
                                <td class="calendar-day">1</td>
                                <td class="calendar-day">2
                                    <div class="appointment-dot bg-success"></div>
                                </td>
                                <td class="calendar-day">3</td>
                                <td class="calendar-day">4</td>
                            </tr>
                            <tr>
                                <td class="calendar-day">5</td>
                                <td class="calendar-day">6
                                    <div class="appointment-dot bg-primary"></div>
                                </td>
                                <td class="calendar-day">7</td>
                                <td class="calendar-day">8
                                    <div class="appointment-dot bg-warning"></div>
                                </td>
                                <td class="calendar-day">9</td>
                                <td class="calendar-day">10</td>
                                <td class="calendar-day">11</td>
                            </tr>
                            <tr>
                                <td class="calendar-day">12</td>
                                <td class="calendar-day">13</td>
                                <td class="calendar-day">14</td>
                                <td class="calendar-day">15
                                    <div class="appointment-dot bg-info"></div>
                                    <div class="appointment-dot bg-success"></div>
                                </td>
                                <td class="calendar-day bg-primary text-white">16</td>
                                <td class="calendar-day">17</td>
                                <td class="calendar-day">18</td>
                            </tr>
                            <tr>
                                <td class="calendar-day">19</td>
                                <td class="calendar-day">20</td>
                                <td class="calendar-day">21</td>
                                <td class="calendar-day">22</td>
                                <td class="calendar-day">23</td>
                                <td class="calendar-day">24</td>
                                <td class="calendar-day">25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Appointments List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-list-alt mr-2"></i>
                Rendez-vous d'Aujourd'hui - Détail
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-left-success h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="font-weight-bold text-success mb-0">09:00 - 10:00</h6>
                                <span class="badge badge-success">Confirmé</span>
                            </div>
                            <h6 class="font-weight-bold mb-1">Sophie Bernard</h6>
                            <p class="text-muted mb-2">Consultation juridique - Révision contrat de travail</p>
                            <div class="row text-sm">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-success mr-1"></i>
                                    Me Marie Dubois
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-door-open text-success mr-1"></i>
                                    Salle A
                                </div>
                            </div>
                            <div class="row text-sm mt-1">
                                <div class="col-6">
                                    <i class="fas fa-coins text-success mr-1"></i>
                                    60,000 FCFA
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-success mr-1"></i>
                                    06 12 34 56 78
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-success btn-sm mr-1">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button class="btn btn-outline-success btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-left-primary h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="font-weight-bold text-primary mb-0">10:00 - 10:45</h6>
                                <span class="badge badge-info">En cours</span>
                            </div>
                            <h6 class="font-weight-bold mb-1">Michel Dubois</h6>
                            <p class="text-muted mb-2">Suivi de dossier - Contentieux commercial</p>
                            <div class="row text-sm">
                                <div class="col-6">
                                    <i class="fas fa-user-tie text-primary mr-1"></i>
                                    Me Pierre Martin
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-video text-primary mr-1"></i>
                                    Visioconférence
                                </div>
                            </div>
                            <div class="row text-sm mt-1">
                                <div class="col-6">
                                    <i class="fas fa-coins text-primary mr-1"></i>
                                    33,750 FCFA
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-phone text-primary mr-1"></i>
                                    06 98 76 54 32
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-pause"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .appointment-slot {
        cursor: pointer;
        transition: all 0.2s;
        min-height: 60px;
    }

    .appointment-slot:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .appointment-mini {
        cursor: pointer;
        min-height: 40px;
    }

    .calendar-day {
        height: 80px;
        width: 14.28%;
        vertical-align: top;
        position: relative;
        padding: 5px;
    }

    .appointment-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin: 1px;
    }

    .calendar-view {
        min-height: 400px;
    }

    @media (max-width: 768px) {
        .appointment-slot, .appointment-mini {
            font-size: 0.8rem;
        }

        .calendar-day {
            height: 60px;
            font-size: 0.8rem;
        }

        .table th, .table td {
            padding: 0.5rem 0.25rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Initialize date to today
    document.getElementById('selectedDate').value = new Date().toISOString().split('T')[0];

    // View switching
    document.getElementById('viewDay').addEventListener('click', function() {
        switchView('day');
    });

    document.getElementById('viewWeek').addEventListener('click', function() {
        switchView('week');
    });

    document.getElementById('viewMonth').addEventListener('click', function() {
        switchView('month');
    });

    function switchView(view) {
        // Hide all views
        document.querySelectorAll('.calendar-view').forEach(el => el.classList.add('d-none'));

        // Show selected view
        document.getElementById(view + 'View').classList.remove('d-none');

        // Update button states
        document.querySelectorAll('#viewDay, #viewWeek, #viewMonth').forEach(btn => btn.classList.remove('active'));
        document.getElementById('view' + view.charAt(0).toUpperCase() + view.slice(1)).classList.add('active');

        // Update title
        const titles = {
            'day': 'Aujourd\'hui',
            'week': 'Cette semaine',
            'month': 'Ce mois'
        };
        document.getElementById('currentViewTitle').textContent = titles[view];
    }

    // Date navigation
    document.getElementById('selectedDate').addEventListener('change', function() {
        // Update calendar based on selected date
        console.log('Date changed to:', this.value);
        // Here you would typically make an AJAX call to load appointments for the selected date
    });

    // Filter functionality
    document.getElementById('lawyerFilter').addEventListener('change', applyFilters);
    document.getElementById('roomFilter').addEventListener('change', applyFilters);
    document.getElementById('statusFilter').addEventListener('change', applyFilters);

    function applyFilters() {
        // Get filter values
        const lawyer = document.getElementById('lawyerFilter').value;
        const room = document.getElementById('roomFilter').value;
        const status = document.getElementById('statusFilter').value;

        // Apply filters to appointments
        console.log('Applying filters:', { lawyer, room, status });
        // Here you would typically filter the displayed appointments
    }

    // Export functions
    function exportPlanning() {
        Swal.fire({
            title: 'Export en cours...',
            text: 'Génération du fichier PDF du planning',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function printPlanning() {
        window.print();
    }

    // Appointment actions
    function editAppointment(id) {
        // Redirect to edit page or open modal
        console.log('Editing appointment:', id);
    }

    function cancelAppointment(id) {
        Swal.fire({
            title: 'Annuler le rendez-vous ?',
            text: 'Cette action ne peut pas être annulée.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Oui, annuler',
            cancelButtonText: 'Non, garder'
        }).then((result) => {
            if (result.value) {
                // Cancel appointment
                Swal.fire('Annulé !', 'Le rendez-vous a été annulé.', 'success');
            }
        });
    }

    // Real-time updates (mock)
    function updatePlanningStats() {
        // This would typically fetch real-time data from the server
        // For demo purposes, we'll just show it's working
        console.log('Updating planning statistics...');
    }

    // Update stats every 5 minutes
    setInterval(updatePlanningStats, 300000);

    // Mobile responsiveness
    function handleMobileView() {
        if (window.innerWidth < 768) {
            // Automatically switch to day view on mobile
            switchView('day');
        }
    }

    // Handle window resize
    window.addEventListener('resize', handleMobileView);

    // Initial mobile check
    handleMobileView();
</script>
@endsection
