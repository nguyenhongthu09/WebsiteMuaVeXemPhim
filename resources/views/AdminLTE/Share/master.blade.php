<!DOCTYPE html>
<html lang="en">

<head>
    @include('AdminLTE.Share.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('AdminLTE.Share.header')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="/assets_admin_lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <div class="sidebar">
                @include('AdminLTE.Share.menu')
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">@yield('tieu_de')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('noi_dung')
                </div>
            </section>
        </div>
        @include('AdminLTE.Share.footer')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    @include('AdminLTE.Share.js')
    @yield('js')
</body>

</html>
