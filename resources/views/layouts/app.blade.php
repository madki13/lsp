<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>E-ticket</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/plane.png') }}" />

    <!-- End layout styles -->

</head>

<body>
    <div id="app">
        <div class="horizontal-menu">
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('penerbangan.index') }}">
                                    <i class="mdi mdi-compass-outline menu-icon"></i>
                                    <span class="menu-title">Penerbangan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksi.index') }}">
                                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                                    <span class="menu-title">Transaksi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('laporan.index') }}">
                                    <i class="mdi mdi-book-open-variant"></i>
                                    <span class="menu-title">Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                    <span class="menu-title">Data User</span>
                                </a>
                            </li>
                        @elseif (Auth::check() && Auth::user()->role == 'user')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksi.index') }}">
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                    <span class="menu-title">Transaksi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('laporan.index') }}">
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                    <span class="menu-title">Laporan</span>
                                </a>
                            </li>
                        @elseif (Auth::check() && Auth::user()->role == 'maskapai')

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('laporan.index') }}">
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                    <span class="menu-title">Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                    <span class="menu-title">Data User</span>
                                </a>
                            </li>
                        @else
                            <ul class="navbar-nav me-auto">
                            </ul>
                        @endif

                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- <div class="nav-profile-img">
                                    <img src="../assets/images/faces/face1.jpg" alt="image" />
                                </div> --}}
                                <div class="nav-profile-text">
                                    {{ Auth::check() ? Auth::user()->name : 'Guest' }}


                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            @endguest
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
