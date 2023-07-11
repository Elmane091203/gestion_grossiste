<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::user() != null)
        @if (Auth::user()->role == 'client')
            <script src="https://code.jquery.com/jquery-3.7.0.min.js"
                integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
            <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

                var pusher = new Pusher('6659a861db022170086e', {
                    cluster: 'ap1'
                });

                var channel = pusher.subscribe('gestion-grossiste');
                channel.bind('produit-supprimer', function(data) {
                    toastr.warning('Un produit n\'est plus disponible')
                });
            </script>
        @endif
    @endif
    <title>{{ config('app.name', 'Laravel') }}</title>
    @if (Auth::user() != null)
        @if (Auth::user()->role == 'client')
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

            <!-- Google font -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

            <!-- Bootstrap -->
            <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

            <!-- Slick -->
            <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
            <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

            <!-- nouislider -->
            <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

            <!-- Font Awesome Icon -->
            <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

            <!-- Custom stlylesheet -->
            <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
            <!-- Scripts -->
        @else
            <!-- Favicon -->
            <link href="img/favicon.ico" rel="icon">

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link
                href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
                rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

            <!-- Libraries Stylesheet -->
            <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
            <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

            <!-- Customized Bootstrap Stylesheet -->
            <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="{{ asset('css/css/style.css') }}" rel="stylesheet">
        @endif
    @else
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
        <!-- Scripts -->
    @endif
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @if (Auth::user() == null)
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @else
        @if (Auth::user()->role == 'client')
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @else
            <div class="container-fluid position-relative d-flex p-0">
                <!-- Spinner Start -->
                <div id="spinner"
                    class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Spinner End -->


                <!-- Sidebar Start -->
                <div class="sidebar pe-2 pb-3">
                    <nav class="navbar bg-secondary navbar-dark">
                        <a href="{{ route('admin.index') }}" class="navbar-brand mx-4 mb-3">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Acceuil</h3>
                        </a>
                        <div class="d-flex align-items-center ms-4 mb-4">
                            <div class="position-relative">
                                <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt=""
                                    style="width: 40px; height: 40px;">
                                <div
                                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                                </div>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0">
                                    @if (Auth::user() != null)
                                        {{ Auth::user()->role == 'admin' ? strtoupper(Auth::user()->role) : strtoupper(Auth::user()->role) }}
                                    @endif
                                </h6>
                                <span>
                                    @if (Auth::user() != null)
                                        {{ Auth::user()->prenom . ' ' . Auth::user()->nom }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="navbar-nav w-auto">
                                <a href="{{ route('admin.client') }}" class="nav-item nav-link"><i
                                        class="fa fa-table me-2"></i>Clients</a>
                                <a href="{{ route('admin.gestionnaire') }}" class="nav-item nav-link"><i
                                        class="fa fa-table me-2"></i>Gestionnaires</a>
                                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Carnet
                                    Financier</a>
                                <a href="/creer" class="nav-item nav-link"><i
                                        class="far fa-file-alt me-2"></i>Creer</a>
                            </div>
                        @elseif(Auth::user()->role == 'gestionnaire')
                            <div class="navbar-nav w-auto">
                                <a href="{{ route('produit') }}" class="nav-item nav-link"><i
                                        class="fa fa-table me-2"></i>Produits</a>
                                <a href="{{ route('gestionnaire.client') }}" class="nav-item nav-link"><i
                                        class="fa fa-table me-2"></i>Commandes
                                    Client</a>
                                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Voir
                                    le bilan</a>
                                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Carnet
                                    Financier</a>
                                <a href="/creer" class="nav-item nav-link"><i
                                        class="far fa-file-alt me-2"></i>Creer</a>
                            </div>
                        @else
                            <div class="navbar-nav w-auto">
                                <a href="{{ route('produit') }}" class="nav-item nav-link"><i
                                        class="fa fa-table me-2"></i>Produits</a>
                                <a href="" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Commandes
                                    Client</a>
                                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Voir
                                    le bilan</a>
                                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Carnet
                                    Financier</a>
                                <a href="/creer" class="nav-item nav-link"><i
                                        class="far fa-file-alt me-2"></i>Creer</a>
                            </div>
                        @endif
                    </nav>
                </div>
                <!-- Sidebar End -->

                <!-- Content Start -->
                <div class="content">
                    <!-- Navbar Start -->
                    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                        </a>
                        <a href="#" class="sidebar-toggler flex-shrink-0">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="navbar-nav align-items-center ms-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <img class="rounded-circle me-lg-2" src="{{ asset('img/user.jpg') }}"
                                        alt="" style="width: 40px; height: 40px;">
                                    <span class="d-none d-lg-inline-flex">
                                        {{ Auth::user() != null ? Auth::user()->prenom . ' ' . Auth::user()->nom : ' ' }}</span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item">Se deconnecter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- Navbar End -->

                    <!-- Recent Sales Start -->
                    <div class="container-fluid pt-4 px-4">
                        <!-- Page Content -->
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                    <!-- Recent Sales End -->



                    <!-- Footer Start -->
                    <!-- Footer End -->
                </div>
            </div>
        @endif
    @endif
    @if (Auth::user() != null)
        @if (Auth::user()->role == 'client')
            <!-- FOOTER -->
            <footer id="footer">
                <!-- top footer -->
                <div class="section">
                    <!-- container -->
                    <div class="container w-full">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">About Us</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut.</p>
                                    <ul class="footer-links">
                                        <li><a href="tel:+221781208599"><i class="fa fa-phone"></i> +221 78 120
                                                8599</a>
                                        </li>
                                        <li><a href="mailto:elmane@groupeisi.com"><i
                                                    class="fa fa-envelope-o"></i>elmane@groupeisi.com</a>
                                        </li>
                                        <li><a href="https://goo.gl/maps/psjPrrLfL9uTL1De6" target="_blank"><i
                                                    class="fa fa-map-marker"></i>
                                                MGRW+VXF, Dakar</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">Categories</h3>
                                    <ul class="footer-links">
                                        <li><a href="{{ route('categorie', 'ordinateurs') }}">Ordinateurs</a></li>
                                        <li><a href="{{ route('categorie', 'smartphones') }}">Smartphones</a></li>
                                        <li><a href="{{ route('categorie', 'cameras') }}">Cameras</a></li>
                                        <li><a href="{{ route('categorie', 'accessoires') }}">Accessoires</a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /top footer -->

                <!-- bottom footer -->
                <div id="bottom-footer" class="section">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span class="copyright">
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> made with &nbsp;<i class="fa fa-heart-o"
                                        aria-hidden="true"></i>&nbsp;by <a> Groupe 4 </a>
                                </span>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /bottom footer -->
            </footer>
            <!-- /FOOTER -->

            <!-- jQuery Plugins -->
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/slick.min.js') }}"></script>
            <script src="{{ asset('js/nouislider.min.js') }}"></script>
            <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
        @else
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
            <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
            <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
            </script>
            <script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
            <script>
                $(document).ready(function() {

                    $('#list').DataTable({

                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json"
                        }

                    });

                });
            </script>
            <script>
                const eye = document.querySelector('.feather-eye');
                const eyeOff = document.querySelector('.feather-eye-off');
                const password = document.querySelector('input[type = password]');

                eye.addEventListener('click', () => {
                    eye.style.display = "none";
                    eyeOff.style.display = "block";
                    password.type = "text";
                });
                eyeOff.addEventListener('click', () => {
                    eyeOff.style.display = "none";
                    eye.style.display = "block";
                    password.type = "password";
                });
                feather.replace();
            </script>
            <!-- Template Javascript -->
            <script src="{{ asset('js/main1.js') }}"></script>
        @endif
    @else
        <!-- FOOTER -->
        <footer id="footer">
            <!-- top footer -->
            <div class="section">
                <!-- container -->
                <div class="container w-full">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">About Us</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut.</p>
                                <ul class="footer-links">
                                    <li><a href="tel:+221781208599"><i class="fa fa-phone"></i> +221 78 120
                                            8599</a>
                                    </li>
                                    <li><a href="mailto:elmane@groupeisi.com"><i
                                                class="fa fa-envelope-o"></i>elmane@groupeisi.com</a>
                                    </li>
                                    <li><a href="https://goo.gl/maps/psjPrrLfL9uTL1De6" target="_blank"><i
                                                class="fa fa-map-marker"></i>
                                            MGRW+VXF, Dakar</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Categories</h3>
                                <ul class="footer-links">
                                    <li><a href="{{ route('categorie', 'ordinateurs') }}">Ordinateurs</a></li>
                                    <li><a href="{{ route('categorie', 'smartphones') }}">Smartphones</a></li>
                                    <li><a href="{{ route('categorie', 'cameras') }}">Cameras</a></li>
                                    <li><a href="{{ route('categorie', 'accessoires') }}">Accessoires</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /top footer -->

            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span class="copyright">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> made with &nbsp;<i class="fa fa-heart-o"
                                    aria-hidden="true"></i>&nbsp;by <a> Groupe 4 </a>
                            </span>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bottom footer -->
        </footer>
        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/nouislider.min.js') }}"></script>
        <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    @endif
</body>

</html>
