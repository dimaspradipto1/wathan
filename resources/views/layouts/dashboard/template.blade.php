<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard -nahdlatul  wathan</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.svgc')}}" type="image/x-icon">
    {{--  datatables CSS  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

</head>

<body>
  @include('sweetalert::alert')

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="{{asset('/dashboard/assets/images/logo/logo.png')}}" alt="Logo" srcset="" style="width: 50px; height: 50px;"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                @include('layouts.dashboard.sidebar')

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

           @yield('content')

            @include('layouts.dashboard.footer')
        </div>
    </div>
    <script src="{{asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('dashboard/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('dashboard/assets/js/main.js')}}"></script>
    <script>
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>

    {{--  datatable  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://kit.fontawesome.com/63b8672806.js" crossorigin="anonymous"></script>
    @stack('script')
    @stack('style')
</body>

</html>