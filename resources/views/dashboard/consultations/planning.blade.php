@extends('dashboard.layout')

@section('title', 'Planning des Consultations - Axe Legal')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-calendar-alt text-primary mr-2"></i>
            Planning des Consultations
        </h1>
        <div class="d-flex flex-column flex-sm-row">
            <nav aria-label="breadcrumb" class="mr-sm-3 mb-2 mb-sm-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('administration') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Services Juridiques</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Planning Consultations</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" onclick="newConsultation()">
                <i class="fas fa-plus mr-1"></i>
                <span class="d-none d-sm-inline">Nouvelle Consultation</span>
                <span class="d-sm-none">Nouveau</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aujourd'hui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8 consultations</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cette Semaine</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">34 consultations</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Revenus Semaine</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1.8M FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Taux Occupation</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">78%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Views Toggle -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-calendar mr-2"></i>
                        Planning Interactif
                    </h6>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary btn-sm active" onclick="changeView('day')">Jour</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="changeView('week')">Semaine</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="changeView('month')">Mois</button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Calendar Navigation -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-secondary btn-sm" onclick="previousPeriod()">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" onclick="today()">Aujourd'hui</button>
                            <button class="btn btn-outline-secondary btn-sm" onclick="nextPeriod()">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <h5 class="mb-0 font-weight-bold text-primary" id="currentPeriod">Octobre 2025</h5>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm" id="lawyerFilter" onchange="filterByLawyer()">
                                <option value="">Tous les avocats</option>
                                <option value="marie-dubois">Me Marie Dubois</option>
                                <option value="jean-martin">Me Jean Martin</option>
                                <option value="claire-bernard">Me Claire Bernard</option>
                                <option value="paul-leroy">Me Paul Leroy</option>
                            </select>
                        </div>
                    </div>

                    <!-- Day View -->
                    <div id="dayView" class="calendar-view">
                        <div class="day-schedule">
                            <div class="time-grid">
                                <!-- Time slots -->
                                <div class="time-slot" data-time="08:00">
                                    <div class="time-label">08:00</div>
                                    <div class="consultation-slot available" onclick="scheduleConsultation('08:00')">
                                        <span class="slot-text">Créneaux disponibles</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="09:00">
                                    <div class="time-label">09:00</div>
                                    <div class="consultation-slot booked" onclick="viewConsultation(1)">
                                        <div class="consultation-info">
                                            <div class="client-name">Sophie Bernard</div>
                                            <div class="consultation-type">Droit du travail</div>
                                            <div class="lawyer-name">Me Marie Dubois</div>
                                            <div class="consultation-amount">35 000 FCFA</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="10:00">
                                    <div class="time-label">10:00</div>
                                    <div class="consultation-slot available" onclick="scheduleConsultation('10:00')">
                                        <span class="slot-text">Créneaux disponibles</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="11:00">
                                    <div class="time-label">11:00</div>
                                    <div class="consultation-slot booked" onclick="viewConsultation(2)">
                                        <div class="consultation-info">
                                            <div class="client-name">Jean Martin</div>
                                            <div class="consultation-type">Droit des affaires</div>
                                            <div class="lawyer-name">Me Claire Bernard</div>
                                            <div class="consultation-amount">75 000 FCFA</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="12:00">
                                    <div class="time-label">12:00</div>
                                    <div class="consultation-slot break">
                                        <span class="slot-text">Pause déjeuner</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="13:00">
                                    <div class="time-label">13:00</div>
                                    <div class="consultation-slot break">
                                        <span class="slot-text">Pause déjeuner</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="14:00">
                                    <div class="time-label">14:00</div>
                                    <div class="consultation-slot pending" onclick="viewConsultation(3)">
                                        <div class="consultation-info">
                                            <div class="client-name">Amélie Leclerc</div>
                                            <div class="consultation-type">Droit civil</div>
                                            <div class="lawyer-name">Me Paul Leroy</div>
                                            <div class="consultation-amount">125 000 FCFA</div>
                                            <div class="consultation-status">En attente de confirmation</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="15:00">
                                    <div class="time-label">15:00</div>
                                    <div class="consultation-slot available" onclick="scheduleConsultation('15:00')">
                                        <span class="slot-text">Créneaux disponibles</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="16:00">
                                    <div class="time-label">16:00</div>
                                    <div class="consultation-slot booked" onclick="viewConsultation(4)">
                                        <div class="consultation-info">
                                            <div class="client-name">Marc Dupont</div>
                                            <div class="consultation-type">Droit pénal</div>
                                            <div class="lawyer-name">Me Jean Martin</div>
                                            <div class="consultation-amount">95 000 FCFA</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="17:00">
                                    <div class="time-label">17:00</div>
                                    <div class="consultation-slot available" onclick="scheduleConsultation('17:00')">
                                        <span class="slot-text">Créneaux disponibles</span>
                                    </div>
                                </div>

                                <div class="time-slot" data-time="18:00">
                                    <div class="time-label">18:00</div>
                                    <div class="consultation-slot available" onclick="scheduleConsultation('18:00')">
                                        <span class="slot-text">Créneaux disponibles</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Week View (hidden by default) -->
                    <div id="weekView" class="calendar-view" style="display: none;">
                        <div class="week-calendar">
                            <div class="week-header">
                                <div class="week-day">Lun</div>
                                <div class="week-day">Mar</div>
                                <div class="week-day">Mer</div>
                                <div class="week-day">Jeu</div>
                                <div class="week-day">Ven</div>
                                <div class="week-day">Sam</div>
                                <div class="week-day">Dim</div>
                            </div>
                            <div class="week-body">
                                <div class="week-day-col">
                                    <div class="week-day-date">30 Sep</div>
                                    <div class="mini-consultation">09:00 - Sophie B.</div>
                                    <div class="mini-consultation">14:00 - Jean M.</div>
                                </div>
                                <div class="week-day-col active">
                                    <div class="week-day-date">01 Oct</div>
                                    <div class="mini-consultation">09:00 - Sophie B.</div>
                                    <div class="mini-consultation">11:00 - Jean M.</div>
                                    <div class="mini-consultation">14:00 - Amélie L.</div>
                                    <div class="mini-consultation">16:00 - Marc D.</div>
                                </div>
                                <div class="week-day-col">
                                    <div class="week-day-date">02 Oct</div>
                                    <div class="mini-consultation">10:00 - Claire B.</div>
                                    <div class="mini-consultation">15:00 - Paul L.</div>
                                </div>
                                <div class="week-day-col">
                                    <div class="week-day-date">03 Oct</div>
                                    <div class="mini-consultation">11:00 - Marie D.</div>
                                </div>
                                <div class="week-day-col">
                                    <div class="week-day-date">04 Oct</div>
                                    <div class="mini-consultation">09:30 - Jean M.</div>
                                    <div class="mini-consultation">16:30 - Sophie B.</div>
                                </div>
                                <div class="week-day-col weekend">
                                    <div class="week-day-date">05 Oct</div>
                                    <span class="text-muted">Weekend</span>
                                </div>
                                <div class="week-day-col weekend">
                                    <div class="week-day-date">06 Oct</div>
                                    <span class="text-muted">Weekend</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Month View (hidden by default) -->
                    <div id="monthView" class="calendar-view" style="display: none;">
                        <div class="month-calendar">
                            <div class="month-header">
                                <div class="month-day">Lun</div>
                                <div class="month-day">Mar</div>
                                <div class="month-day">Mer</div>
                                <div class="month-day">Jeu</div>
                                <div class="month-day">Ven</div>
                                <div class="month-day">Sam</div>
                                <div class="month-day">Dim</div>
                            </div>
                            <div class="month-body">
                                <!-- Week 1 -->
                                <div class="month-week">
                                    <div class="month-day-cell inactive">29</div>
                                    <div class="month-day-cell inactive">30</div>
                                    <div class="month-day-cell today">
                                        <div class="day-number">1</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-primary" title="4 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">2</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-success" title="2 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">3</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-info" title="1 consultation"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell weekend">
                                        <div class="day-number">4</div>
                                    </div>
                                    <div class="month-day-cell weekend">
                                        <div class="day-number">5</div>
                                    </div>
                                </div>
                                <!-- More weeks would be generated dynamically -->
                                <div class="month-week">
                                    <div class="month-day-cell">
                                        <div class="day-number">6</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-warning" title="3 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">7</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-primary" title="5 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">8</div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">9</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-success" title="2 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell">
                                        <div class="day-number">10</div>
                                        <div class="day-consultations">
                                            <span class="consultation-dot bg-danger" title="6 consultations"></span>
                                        </div>
                                    </div>
                                    <div class="month-day-cell weekend">
                                        <div class="day-number">11</div>
                                    </div>
                                    <div class="month-day-cell weekend">
                                        <div class="day-number">12</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Legend and Quick Actions -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle mr-2"></i>
                        Légende
                    </h6>
                </div>
                <div class="card-body">
                    <div class="legend-items">
                        <div class="legend-item">
                            <div class="legend-color bg-success"></div>
                            <span>Consultation confirmée</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color bg-warning"></div>
                            <span>En attente de confirmation</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color bg-light border"></div>
                            <span>Créneaux disponibles</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color bg-secondary"></div>
                            <span>Pause / Indisponible</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color bg-danger"></div>
                            <span>Annulée / Reportée</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <button class="btn btn-outline-primary btn-sm mb-2 w-100" onclick="blockTime()">
                            <i class="fas fa-ban mr-2"></i>Bloquer créneaux
                        </button>
                        <button class="btn btn-outline-success btn-sm mb-2 w-100" onclick="bulkReschedule()">
                            <i class="fas fa-calendar-alt mr-2"></i>Reprogrammer en masse
                        </button>
                        <button class="btn btn-outline-info btn-sm mb-2 w-100" onclick="sendReminders()">
                            <i class="fas fa-bell mr-2"></i>Envoyer rappels
                        </button>
                        <button class="btn btn-outline-warning btn-sm mb-2 w-100" onclick="viewConflicts()">
                            <i class="fas fa-exclamation-triangle mr-2"></i>Voir conflits
                        </button>
                        <button class="btn btn-outline-secondary btn-sm w-100" onclick="exportPlanning()">
                            <i class="fas fa-download mr-2"></i>Exporter planning
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .time-grid {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .time-slot {
        display: flex;
        align-items: stretch;
        min-height: 80px;
        border: 1px solid #e3e6f0;
        border-radius: 8px;
        margin-bottom: 5px;
    }

    .time-label {
        flex: 0 0 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fc;
        border-right: 1px solid #e3e6f0;
        font-weight: 600;
        color: #5a5c69;
        border-radius: 8px 0 0 8px;
    }

    .consultation-slot {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        border-radius: 0 8px 8px 0;
        position: relative;
    }

    .consultation-slot.available {
        background: linear-gradient(135deg, #f8f9fc 0%, #e3e6f0 100%);
        border: 2px dashed #d1d3e2;
    }

    .consultation-slot.available:hover {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        color: white;
        transform: scale(1.02);
    }

    .consultation-slot.booked {
        background: linear-gradient(135deg, #1cc88a 0%, #17a673 100%);
        color: white;
    }

    .consultation-slot.booked:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(28, 200, 138, 0.3);
    }

    .consultation-slot.pending {
        background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);
        color: white;
    }

    .consultation-slot.pending:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(246, 194, 62, 0.3);
    }

    .consultation-slot.break {
        background: linear-gradient(135deg, #6c757d 0%, #545b62 100%);
        color: white;
        cursor: default;
    }

    .consultation-info {
        text-align: center;
        padding: 10px;
    }

    .client-name {
        font-weight: bold;
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .consultation-type {
        font-size: 0.85rem;
        margin-bottom: 3px;
        opacity: 0.9;
    }

    .lawyer-name {
        font-size: 0.8rem;
        margin-bottom: 3px;
        opacity: 0.8;
    }

    .consultation-amount {
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 3px;
    }

    .consultation-status {
        font-size: 0.75rem;
        opacity: 0.9;
    }

    .slot-text {
        font-weight: 500;
        opacity: 0.8;
    }

    /* Week View Styles */
    .week-calendar {
        border: 1px solid #e3e6f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .week-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }

    .week-header .week-day {
        padding: 15px;
        text-align: center;
        font-weight: bold;
        color: #5a5c69;
        border-right: 1px solid #e3e6f0;
    }

    .week-header .week-day:last-child {
        border-right: none;
    }

    .week-body {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        min-height: 400px;
    }

    .week-day-col {
        padding: 15px 10px;
        border-right: 1px solid #e3e6f0;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .week-day-col:last-child {
        border-right: none;
    }

    .week-day-col:hover {
        background-color: #f8f9fc;
    }

    .week-day-col.active {
        background-color: rgba(78, 115, 223, 0.1);
    }

    .week-day-col.weekend {
        background-color: #f8f9fc;
        opacity: 0.7;
    }

    .week-day-date {
        font-weight: bold;
        margin-bottom: 10px;
        color: #5a5c69;
    }

    .mini-consultation {
        background: #4e73df;
        color: white;
        padding: 5px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-bottom: 5px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .mini-consultation:hover {
        background: #224abe;
        transform: scale(1.05);
    }

    /* Month View Styles */
    .month-calendar {
        border: 1px solid #e3e6f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .month-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }

    .month-header .month-day {
        padding: 15px;
        text-align: center;
        font-weight: bold;
        color: #5a5c69;
        border-right: 1px solid #e3e6f0;
    }

    .month-header .month-day:last-child {
        border-right: none;
    }

    .month-body {
        display: flex;
        flex-direction: column;
    }

    .month-week {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .month-day-cell {
        min-height: 100px;
        padding: 8px;
        border-right: 1px solid #e3e6f0;
        border-bottom: 1px solid #e3e6f0;
        cursor: pointer;
        transition: background-color 0.2s;
        position: relative;
    }

    .month-day-cell:last-child {
        border-right: none;
    }

    .month-day-cell:hover {
        background-color: #f8f9fc;
    }

    .month-day-cell.today {
        background-color: rgba(78, 115, 223, 0.1);
        border: 2px solid #4e73df;
    }

    .month-day-cell.weekend {
        background-color: #f8f9fc;
        opacity: 0.7;
    }

    .month-day-cell.inactive {
        opacity: 0.3;
    }

    .day-number {
        font-weight: bold;
        color: #5a5c69;
        margin-bottom: 5px;
    }

    .day-consultations {
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
    }

    .consultation-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    /* Legend Styles */
    .legend-items {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 4px;
        flex-shrink: 0;
    }

    /* Quick Actions */
    .quick-actions .btn {
        text-align: left;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .consultation-info {
            padding: 5px;
        }

        .client-name {
            font-size: 0.9rem;
        }

        .consultation-type,
        .lawyer-name,
        .consultation-amount {
            font-size: 0.75rem;
        }

        .time-label {
            flex: 0 0 60px;
        }

        .week-body,
        .month-week {
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
        }

        .mini-consultation {
            font-size: 0.7rem;
            padding: 3px 5px;
        }

        .month-day-cell {
            min-height: 80px;
            padding: 5px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    let currentView = 'day';
    let currentDate = new Date();

    $(document).ready(function() {
        updateCurrentPeriod();
    });

    function changeView(view) {
        // Update active button
        $('.btn-group .btn').removeClass('active');
        $(`button[onclick="changeView('${view}')"]`).addClass('active');

        // Hide all views
        $('.calendar-view').hide();

        // Show selected view
        $(`#${view}View`).show();

        currentView = view;
        updateCurrentPeriod();
    }

    function updateCurrentPeriod() {
        const months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];

        let periodText = '';

        switch(currentView) {
            case 'day':
                periodText = `${currentDate.getDate()} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                break;
            case 'week':
                const weekStart = new Date(currentDate);
                weekStart.setDate(currentDate.getDate() - currentDate.getDay() + 1);
                const weekEnd = new Date(weekStart);
                weekEnd.setDate(weekStart.getDate() + 6);
                periodText = `${weekStart.getDate()}-${weekEnd.getDate()} ${months[weekStart.getMonth()]} ${weekStart.getFullYear()}`;
                break;
            case 'month':
                periodText = `${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                break;
        }

        $('#currentPeriod').text(periodText);
    }

    function previousPeriod() {
        switch(currentView) {
            case 'day':
                currentDate.setDate(currentDate.getDate() - 1);
                break;
            case 'week':
                currentDate.setDate(currentDate.getDate() - 7);
                break;
            case 'month':
                currentDate.setMonth(currentDate.getMonth() - 1);
                break;
        }
        updateCurrentPeriod();
        refreshCalendarData();
    }

    function nextPeriod() {
        switch(currentView) {
            case 'day':
                currentDate.setDate(currentDate.getDate() + 1);
                break;
            case 'week':
                currentDate.setDate(currentDate.getDate() + 7);
                break;
            case 'month':
                currentDate.setMonth(currentDate.getMonth() + 1);
                break;
        }
        updateCurrentPeriod();
        refreshCalendarData();
    }

    function today() {
        currentDate = new Date();
        updateCurrentPeriod();
        refreshCalendarData();
    }

    function refreshCalendarData() {
        // In a real application, this would fetch data from the server
        console.log('Refreshing calendar data for:', currentDate);
    }

    function filterByLawyer() {
        const selectedLawyer = $('#lawyerFilter').val();
        console.log('Filtering by lawyer:', selectedLawyer);

        // In a real application, this would filter the calendar data
        Swal.fire({
            icon: 'info',
            title: 'Filtre appliqué',
            text: selectedLawyer ? `Affichage des consultations de ${selectedLawyer}` : 'Affichage de tous les avocats',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function scheduleConsultation(time) {
        Swal.fire({
            title: 'Programmer une consultation',
            html: `
                <div class="form-group text-left">
                    <label for="clientName">Nom du client:</label>
                    <input type="text" class="form-control" id="clientName" placeholder="Nom et prénom">
                </div>
                <div class="form-group text-left">
                    <label for="clientEmail">Email:</label>
                    <input type="email" class="form-control" id="clientEmail" placeholder="email@example.com">
                </div>
                <div class="form-group text-left">
                    <label for="consultationType">Type de consultation:</label>
                    <select class="form-control" id="consultationType">
                        <option value="travail">Droit du travail</option>
                        <option value="affaires">Droit des affaires</option>
                        <option value="civil">Droit civil</option>
                        <option value="penal">Droit pénal</option>
                        <option value="immobilier">Droit immobilier</option>
                        <option value="fiscal">Droit fiscal</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="consultationLawyer">Avocat assigné:</label>
                    <select class="form-control" id="consultationLawyer">
                        <option value="marie-dubois">Me Marie Dubois</option>
                        <option value="jean-martin">Me Jean Martin</option>
                        <option value="claire-bernard">Me Claire Bernard</option>
                        <option value="paul-leroy">Me Paul Leroy</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="consultationTime">Heure:</label>
                    <input type="time" class="form-control" id="consultationTime" value="${time}">
                </div>
                <div class="form-group text-left">
                    <label for="consultationDuration">Durée (minutes):</label>
                    <select class="form-control" id="consultationDuration">
                        <option value="30">30 minutes - 25 000 FCFA</option>
                        <option value="60" selected>60 minutes - 45 000 FCFA</option>
                        <option value="90">90 minutes - 65 000 FCFA</option>
                        <option value="120">120 minutes - 85 000 FCFA</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="consultationNotes">Notes:</label>
                    <textarea class="form-control" id="consultationNotes" rows="3" placeholder="Détails sur la consultation..."></textarea>
                </div>
            `,
            width: 600,
            showCancelButton: true,
            confirmButtonText: 'Programmer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Consultation programmée',
                    text: 'La consultation a été ajoutée au planning et le client sera notifié.',
                    timer: 3000,
                    showConfirmButton: false
                });

                // Refresh the calendar view
                refreshCalendarData();
            }
        });
    }

    function viewConsultation(id) {
        Swal.fire({
            title: `Consultation #${id}`,
            html: `
                <div class="text-left">
                    <h6 class="font-weight-bold text-primary mb-3">Détails de la consultation</h6>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Client:</strong></div>
                        <div class="col-6">Sophie Bernard</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Email:</strong></div>
                        <div class="col-6">sophie.bernard@email.com</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Téléphone:</strong></div>
                        <div class="col-6">+229 XX XX XX XX</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Avocat:</strong></div>
                        <div class="col-6">Me Marie Dubois</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Date/Heure:</strong></div>
                        <div class="col-6">01/10/2025 à 09:00</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Durée:</strong></div>
                        <div class="col-6">60 minutes</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Type:</strong></div>
                        <div class="col-6"><span class="badge badge-primary">Droit du travail</span></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Montant:</strong></div>
                        <div class="col-6 font-weight-bold text-success">35 000 FCFA</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6"><strong>Statut:</strong></div>
                        <div class="col-6"><span class="badge badge-success">Confirmée</span></div>
                    </div>
                    <div class="mt-3">
                        <strong>Sujet:</strong>
                        <p class="mt-2">Litige avec employeur concernant un licenciement abusif. Le client souhaite connaître ses droits et les recours possibles.</p>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary btn-sm mr-2" onclick="editConsultation(${id})">
                            <i class="fas fa-edit mr-1"></i>Modifier
                        </button>
                        <button class="btn btn-warning btn-sm mr-2" onclick="rescheduleConsultation(${id})">
                            <i class="fas fa-calendar-alt mr-1"></i>Reprogrammer
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="cancelConsultation(${id})">
                            <i class="fas fa-times mr-1"></i>Annuler
                        </button>
                    </div>
                </div>
            `,
            width: 700,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    function newConsultation() {
        scheduleConsultation('09:00');
    }

    // Quick Actions
    function blockTime() {
        Swal.fire({
            title: 'Bloquer des créneaux',
            html: `
                <div class="form-group text-left">
                    <label>Date de début:</label>
                    <input type="date" class="form-control" id="blockStartDate">
                </div>
                <div class="form-group text-left">
                    <label>Date de fin:</label>
                    <input type="date" class="form-control" id="blockEndDate">
                </div>
                <div class="form-group text-left">
                    <label>Heure de début:</label>
                    <input type="time" class="form-control" id="blockStartTime">
                </div>
                <div class="form-group text-left">
                    <label>Heure de fin:</label>
                    <input type="time" class="form-control" id="blockEndTime">
                </div>
                <div class="form-group text-left">
                    <label>Raison:</label>
                    <select class="form-control" id="blockReason">
                        <option value="vacation">Congés</option>
                        <option value="meeting">Réunion</option>
                        <option value="formation">Formation</option>
                        <option value="tribunal">Audience tribunal</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Bloquer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Créneaux bloqués !', 'Les créneaux ont été bloqués avec succès.', 'success');
            }
        });
    }

    function bulkReschedule() {
        Swal.fire({
            title: 'Reprogrammation en masse',
            text: 'Cette fonctionnalité permet de reprogrammer plusieurs consultations en une seule fois.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        });
    }

    function sendReminders() {
        Swal.fire({
            title: 'Envoyer des rappels',
            html: `
                <div class="form-group text-left">
                    <label>Type de rappel:</label>
                    <select class="form-control" id="reminderType">
                        <option value="today">Consultations d'aujourd'hui</option>
                        <option value="tomorrow">Consultations de demain</option>
                        <option value="week">Consultations de la semaine</option>
                        <option value="pending">Confirmations en attente</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label>Méthode:</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="emailReminder" checked>
                        <label class="custom-control-label" for="emailReminder">Email</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="smsReminder">
                        <label class="custom-control-label" for="smsReminder">SMS</label>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Envoyer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Rappels envoyés !', 'Les rappels ont été envoyés aux clients concernés.', 'success');
            }
        });
    }

    function viewConflicts() {
        Swal.fire({
            title: 'Conflits de planning',
            html: `
                <div class="text-left">
                    <h6 class="text-warning mb-3">Conflits détectés:</h6>
                    <div class="alert alert-warning">
                        <strong>01/10/2025 14:00:</strong><br>
                        Me Paul Leroy a deux consultations programmées<br>
                        <small>Sophie Bernard & Marc Dupont</small>
                    </div>
                    <div class="alert alert-info">
                        <strong>02/10/2025 11:00:</strong><br>
                        Consultation programmée pendant le blocage "Réunion équipe"
                    </div>
                    <div class="text-center">
                        <button class="btn btn-warning btn-sm" onclick="resolveConflicts()">
                            <i class="fas fa-tools mr-1"></i>Résoudre les conflits
                        </button>
                    </div>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Fermer'
        });
    }

    function exportPlanning() {
        Swal.fire({
            title: 'Exporter le planning',
            html: `
                <div class="form-group text-left">
                    <label>Période:</label>
                    <select class="form-control" id="exportPeriod">
                        <option value="day">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month" selected>Ce mois</option>
                        <option value="custom">Période personnalisée</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label>Format:</label>
                    <select class="form-control" id="exportFormat">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="ical">iCal</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label>Inclure:</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="includeDetails" checked>
                        <label class="custom-control-label" for="includeDetails">Détails des consultations</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="includeContacts">
                        <label class="custom-control-label" for="includeContacts">Coordonnées clients</label>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Exporter',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Export en cours !', 'Le fichier sera téléchargé dans quelques instants.', 'success');
            }
        });
    }

    // Helper functions
    function editConsultation(id) {
        console.log('Editing consultation', id);
        Swal.close();
        scheduleConsultation('09:00'); // Open edit form
    }

    function rescheduleConsultation(id) {
        console.log('Rescheduling consultation', id);
        Swal.close();
        // Implementation would go here
    }

    function cancelConsultation(id) {
        Swal.fire({
            title: 'Annuler la consultation ?',
            text: 'Cette action ne peut pas être annulée.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, annuler',
            cancelButtonText: 'Non'
        }).then((result) => {
            if (result.value) {
                Swal.fire('Annulée !', 'La consultation a été annulée.', 'success');
            }
        });
    }

    function resolveConflicts() {
        console.log('Resolving planning conflicts...');
    }
</script>
@endsection
