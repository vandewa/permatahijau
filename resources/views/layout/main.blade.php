<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" href="{{ asset('front/assets/image/logo.ico')}}">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/assets/css/image-uploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">


    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('stack-admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('stack-admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('stack-admin/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/app-assets/css/plugins/forms/wizard.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('stack-admin/app-assets/css/core/colors/palette-tooltip.css')}}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('stack-admin/app-assets/css/plugins/pickers/daterange/daterange.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('stack-admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.js"
        integrity="sha512-ZYvPGKyKaVHwZFJldzOuYineKWIBiHZliZCcfa2dq4IYJe/w7k4WOUYa22jNAUAC+fxlXB1blBq1cgGQrV7DGg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js"
        integrity="sha512-CrNI25BFwyQ47q3MiZbfATg0ZoG6zuNh2ANn/WjyqvN4ShWfwPeoCOi9pjmX4DoNioMQ5gPcphKKF+oVz3UjRw=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"
        integrity="sha512-jQxNe7fqaqehR3t/JfoxC8y2dwkEIL/7a6JWbs6sQdSCI/6Kd0t2okI9nhuKeSUgM5JDTDgdUzLzSPovB2lOBQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.js"
        integrity="sha512-pCY6IoVbjV1hvVawzGdzKCAVB0UXiOacncL59KETWUSkEPiDkvXTrXjGjpAQF6YCqxTcoa3YIV9SGGnFkb8evg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css"
        integrity="sha512-/D4S05MnQx/q7V0+15CCVZIeJcV+Z+ejL1ZgkAcXE1KZxTE4cYDvu+Fz+cQO9GopKrDzMNNgGK+dbuqza54jgw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.css"
        integrity="sha512-IThEP8v8WRHuDqEKg3D6V0jROeRcQXGu/02HzCudtHKlLSzl6F6EycdHw34M3gsBA5zsUyR4ynW6j5vS1qE4wQ=="
        crossorigin="anonymous" />

    @stack('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="stack admin logo"
                                src="{{ asset('front/assets/image/permata.png')}}" style="width:15%;">
                            <h2 class="brand-text">SIUPH</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online"><img
                                        src="{{ asset('stack-admin/app-assets/images/portrait/small/avatar-s-1.png')}}"
                                        alt="avatar"><i></i></div><span class="user-name">{{
                                    strtoupper(auth()->user()->name ?? '-') }} </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('cek.profile') }}"><i
                                        class="feather icon-user"></i>Profile</a>
                                <a class="dropdown-item" href="{{ route('user.password') }}"><i
                                        class="fa fa-expeditedssl"></i> Ganti Password</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="{{ route('beranda') }}"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span></span><i class=" feather icon-minus" data-toggle="tooltip"
                        data-placement="right" data-original-title="General"></i>
                </li>
                <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}"><a href="{{ route('dashboard') }}"><i
                            class="feather icon-home"></i><span class="menu-title"
                            data-i18n="Dashboard">Dashboard</span></a>
                </li>

                <li class=" navigation-header"><span>Pemberi</span><i class=" feather icon-minus" data-toggle="tooltip"
                        data-placement="right" data-original-title="Zakat"></i>
                </li>
                {{-- <li class=" nav-item {{ request()->routeIs('admin:ormas*') ? 'active' : '' }}"><a
                        href="{{ route('admin:ormas.index') }}"><i class="feather icon-book"></i><span
                            class="menu-title" data-i18n="Data Ormas">Data Ormas</span></a>
                </li> --}}
                <li class="nav-item {{ request()->routeIs('admin:pemberi-zakat*') ? 'active' : '' }}"><a
                        href="{{ route('admin:pemberi-zakat.index') }}"><i class="feather icon-award"></i><span
                            class="menu-title" data-i18n="Data Pemberi">Data Pemberi</span></a>
                </li>

                <!-- <li class="nav-item {{ request()->routeIs('admin:beras*') ? 'active' : '' }}"><a
                        href="{{ route('admin:beras') }}"><i class="feather icon-list"></i><span class="menu-title"
                            data-i18n="Beras">Beras</span></a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin:uang*') ? 'active' : '' }}"><a
                        href="{{ route('admin:uang') }}"><i class="feather icon-list"></i><span class="menu-title"
                            data-i18n="Uang">Uang</span></a>
                </li> -->

                <li class=" navigation-header"><span>Penerima</span><i class=" feather icon-minus" data-toggle="tooltip"
                        data-placement="right" data-original-title="Zakat"></i>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin:penerima-zakat*') ? 'active' : '' }}"><a
                        href="{{ route('admin:penerima-zakat.index') }}"><i class="feather icon-users"></i><span
                            class="menu-title" data-i18n="Data Penerima">Data Penerima</span></a>
                </li>

                <li class=" navigation-header"><span>Warga</span><i class=" feather icon-minus" data-toggle="tooltip"
                        data-placement="right" data-original-title="Warga"></i>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin:warga*') ? 'active' : '' }}"><a
                        href="{{ route('admin:warga.index') }}"><i class="feather icon-user"></i><span
                            class="menu-title" data-i18n="Data Warga">Data Warga</span></a>
                </li>

                <li class=" navigation-header"><span>Manajemen</span><i class=" feather icon-minus"
                        data-toggle="tooltip" data-placement="right" data-original-title="Warga"></i>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin:belanja-beras*') ? 'active' : '' }}"><a
                        href="{{ route('admin:belanja-beras.index') }}"><i class="feather icon-shopping-cart"></i><span
                            class="menu-title" data-i18n="Konversi Uang ke Beras">Belanja / Donasi</span></a>
                </li>

                <li class=" nav-item {{ request()->routeIs('admin:cetak.laporan*') ? 'active' : '' }}"><a
                        href="{{ route('admin:cetak.laporan') }}"><i class="feather icon-book"></i><span
                            class="menu-title" data-i18n="Laporan">Laporan</span></a>
                </li>
                <!-- <li class=" navigation-header"><span>Manajemen User</span><i class=" feather icon-minus"
                        data-toggle="tooltip" data-placement="right" data-original-title="Manajemen User"></i>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin:management-user*') ? 'active' : '' }}"><a
                        href="{{ route('admin:management-user.index') }}"><i class="feather icon-users"></i><span
                            class="menu-title" data-i18n="Data User">Data User</span></a>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block"> &copy; {{ Carbon\Carbon::now()->isoFormat('Y') }} <b
                    style="color:#00e7eb;">Diskominfo Wonosobo</b> by <b style="color:#00e7eb;">Devan Dewananta</b>
            </span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    {{--
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
    <script
        src="{{ asset('stack-admin/app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script> --}}


    <script src="{{ asset('stack-admin/app-assets/vendors/js/charts/raphael-min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/charts/morris.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}"></script>

    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/jszip.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/vfs_fonts.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/tables/buttons.colVis.min.js')}}"></script>

    <script src="{{ asset('stack-admin/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

    <script src="{{ asset('stack-admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>



    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('stack-admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('stack-admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/index.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/xy.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/Animated.js')}}"></script>

    <script src="{{ asset('stack-admin/app-assets/js/scripts/tables/datatables/datatable-advanced.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{ asset('stack-admin/app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
    <script src="{{ asset('stack-admin/assets/js/pickers/picker_date.js')}}"></script>
    <script src="{{ asset('stack-admin/assets/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.5/api/sum().js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>


    <script>
        $(function () {
            $(".alert").delay(4000).slideUp(400);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {


            $('#lambang').change(function () {
                console.log('berubah');
                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {


            $('#bendera').change(function () {
                console.log('berubah');
                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload2').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>

    <script>
        $(document).on('click', '.delete-data-table', function (a) {
            a.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you realy want to delete this records? This process cannot be undone.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    a.preventDefault();
                    var url = $(this).attr('href');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        method: 'delete',
                        success: function () {
                            Swal.fire(
                                'Deleted!',
                                'data has been deleted.',
                                'success'
                            )
                            table.ajax.reload();
                            location.reload();
                            if (typeof table2) {
                                table2.ajax.reload();
                                location.reload();
                            }
                        }
                    })
                }
            })
        });
    </script>

<script>
    $(document).on('click', '.delete-data-table', function (a) {
        a.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you realy want to delete this records? This process cannot be undone.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                a.preventDefault();
                var url = $(this).attr('href');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'delete',
                    success: function () {
                        Swal.fire(
                            'Deleted!',
                            'data has been deleted.',
                            'success'
                        )
                        table.ajax.reload();
                        // location.reload();
                        if (typeof table2) {
                            table2.ajax.reload();
                            // location.reload();
                        }
                    }
                })
            }
        })
    });
</script>

    <!-- END: Page JS-->

    @stack('js')

</body>
<!-- END: Body-->

</html>