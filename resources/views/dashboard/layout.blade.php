<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Dashboard Administration - Axe Legal" />
        <meta name="author" content="Axe Legal" />

        <title>@yield('title', 'Axe Legal - Dashboard Administration')</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="{{ asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet" />

        <!-- Global Responsive Styles -->
        <style>
            /* Reset complet */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html, body {
                height: 100%;
                overflow: hidden;
                margin: 0 !important;
                padding: 0 !important;
            }

            body#page-top {
                margin: 0 !important;
                padding: 0 !important;
            }
            
            #wrapper {
                display: flex;
                height: 100vh;
                overflow: hidden;
                margin: 0;
                padding: 0;
            }

            .sidebar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 256px !important;
                min-width: 256px !important;
                max-width: 256px !important;
                height: 100vh !important;
                background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%) !important;
                z-index: 1000 !important;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                transition: all 0.3s ease;
                scrollbar-width: thin;
                scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
                margin: 0 !important;
                padding: 0 !important;
            }

            .sidebar * {
                max-width: 100%;
            }

            .sidebar::-webkit-scrollbar {
                width: 6px;
            }

            .sidebar::-webkit-scrollbar-track {
                background: transparent;
            }

            .sidebar::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 3px;
            }

            .sidebar::-webkit-scrollbar-thumb:hover {
                background-color: rgba(255, 255, 255, 0.5);
            }

            #content-wrapper {
                flex: 1 !important;
                margin-left: 256px !important;
                height: 100vh !important;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                display: flex !important;
                flex-direction: column !important;
                transition: all 0.3s ease;
                width: calc(100% - 256px) !important;
                padding: 0 !important;
                background-color: #f8f9fc !important;
            }

            #content {
                flex: 1 0 auto;
                margin: 0;
                padding: 0;
            }

            .sticky-footer {
                flex-shrink: 0;
                width: 100%;
            }

            .sidebar.toggled {
                left: -256px;
            }

            #content-wrapper.toggled {
                margin-left: 0;
                width: 100%;
            }

            #accordionSidebar {
                height: 100% !important;
                width: 256px !important;
                min-width: 256px !important;
                max-width: 256px !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .sidebar .navbar-nav {
                width: 256px !important;
                min-width: 256px !important;
                max-width: 256px !important;
            }

            .sidebar ul {
                width: 256px !important;
            }

            .bg-gradient-primary {
                width: 256px !important;
            }

            /* Topbar Styles */
            .topbar {
                position: sticky;
                top: 0;
                z-index: 999;
                margin-bottom: 0 !important;
            }

            /* Container Fluid Padding */
            .container-fluid {
                padding: 1.5rem;
            }

            @media (max-width: 768px) {
                .sidebar {
                    left: -256px;
                }

                .sidebar.toggled {
                    left: 0;
                }

                #content-wrapper {
                    margin-left: 0;
                    width: 100%;
                }

                #content-wrapper.toggled {
                    margin-left: 0;
                }
            }

            /* Sidebar Styling */
            .sidebar .nav-item {
                position: relative;
                width: 100%;
            }

            .sidebar .nav-link {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0.5rem;
                border-radius: 8px;
                transition: all 0.3s ease;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .sidebar .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.15);
                color: white;
            }

            .sidebar .nav-link.active {
                background-color: rgba(255, 255, 255, 0.2);
                color: white;
                font-weight: 600;
            }

            .sidebar-brand {
                padding: 1rem;
                margin-bottom: 1rem;
                width: 100%;
            }

            .sidebar-heading {
                width: 100%;
            }

            .sidebar .collapse-inner {
                width: calc(224px - 2rem);
            }

            /* Global Responsive Improvements */
            @media (max-width: 768px) {
                .container-fluid {
                    padding-left: 1rem !important;
                    padding-right: 1rem !important;
                }

                .card {
                    margin-bottom: 1rem !important;
                }

                .btn {
                    margin-bottom: 0.5rem;
                }

                .form-group {
                    margin-bottom: 1rem;
                }

                .breadcrumb {
                    font-size: 0.8rem;
                    padding: 0.5rem 0.75rem;
                }

                .h3 {
                    font-size: 1.3rem !important;
                }

                .table-responsive {
                    border: none;
                }
            }

            @media (max-width: 576px) {
                .container-fluid {
                    padding-left: 0.75rem !important;
                    padding-right: 0.75rem !important;
                }

                .card-header {
                    padding: 0.75rem 1rem;
                }

                .card-body {
                    padding: 1rem;
                }

                .btn-group-vertical .btn {
                    margin-bottom: 0.25rem;
                }

                .d-sm-flex {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                }

                .mb-4 {
                    margin-bottom: 1.5rem !important;
                }
            }

            /* Form Responsive Improvements */
            @media (max-width: 768px) {
                .row .col-md-6,
                .row .col-md-4,
                .row .col-md-3 {
                    margin-bottom: 1rem;
                }

                .input-group {
                    flex-wrap: wrap;
                }

                .input-group-append {
                    width: 100%;
                    margin-top: 0.5rem;
                }

                .input-group-append .btn {
                    width: 100%;
                    border-top-left-radius: 0.25rem;
                    border-bottom-left-radius: 0.25rem;
                }
            }

            /* Card Responsive */
            @media (max-width: 576px) {
                .card-columns {
                    column-count: 1;
                }

                .card-deck .card {
                    margin-bottom: 0.75rem;
                }
            }

            /* Button Responsive */
            @media (max-width: 768px) {
                .btn-toolbar {
                    flex-direction: column;
                }

                .btn-toolbar .btn-group {
                    width: 100%;
                    margin-bottom: 0.5rem;
                }

                .btn-group .btn {
                    flex: 1;
                }
            }

            /* Table Responsive Improvements */
            @media (max-width: 768px) {
                .table-responsive table,
                .table-responsive thead,
                .table-responsive tbody,
                .table-responsive th,
                .table-responsive td,
                .table-responsive tr {
                    display: block;
                }

                .table-responsive thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                .table-responsive tr {
                    border: 1px solid #ccc;
                    margin-bottom: 0.5rem;
                    border-radius: 0.25rem;
                    padding: 0.5rem;
                }

                .table-responsive td {
                    border: none;
                    position: relative;
                    padding-left: 50% !important;
                    padding-top: 0.5rem;
                    padding-bottom: 0.5rem;
                    text-align: right;
                }

                .table-responsive td:before {
                    content: attr(data-label) ": ";
                    position: absolute;
                    left: 6px;
                    width: 45%;
                    padding-right: 10px;
                    white-space: nowrap;
                    text-align: left;
                    font-weight: bold;
                    color: #495057;
                }
            }

            /* Status badges responsive */
            @media (max-width: 576px) {
                .badge {
                    font-size: 0.7rem;
                    padding: 0.25rem 0.4rem;
                }
            }

            /* Utility classes for responsive */
            .text-responsive {
                font-size: 0.9rem;
            }

            @media (max-width: 768px) {
                .text-responsive {
                    font-size: 0.8rem;
                }
            }

            @media (max-width: 576px) {
                .text-responsive {
                    font-size: 0.75rem;
                }
            }
        </style>

        @yield('styles')
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Include Sidebar -->
            @include('dashboard.partials.sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Include Topbar -->
                    @include('dashboard.partials.topbar')

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <strong>Axe Legal</strong> 2025 - Réalisé par <em>Ray Ague</em></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

        @yield('scripts')
    </body>
</html>
