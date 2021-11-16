<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng ký ngành học | Học viện Nông nghiệp Việt Nam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Học viện Nông nghiệp Việt Nam" name="description">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">

    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Table datatable css -->
    <link href="assets\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Notification css (Toastr) -->
    <link href="assets\libs\toastr\toastr.min.css" rel="stylesheet" type="text/css">

    <link href="assets\libs\datatables\buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\select.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
    <link href="assets\css\customCss.css" rel="stylesheet" type="text/css">

</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    @include('backend.layouts.header')
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    @yield('content')

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    @include('backend.layouts.footer')
</div>
<!-- END wrapper -->


<!-- Vendor js -->
<script src="assets\js\vendor.min.js"></script>

<!-- Datatable plugin js -->
<script src="assets\libs\datatables\jquery.dataTables.min.js"></script>
<script src="assets\libs\datatables\dataTables.bootstrap4.min.js"></script>

<script src="assets\libs\datatables\dataTables.responsive.min.js"></script>
<script src="assets\libs\datatables\responsive.bootstrap4.min.js"></script>

<script src="assets\libs\datatables\dataTables.buttons.min.js"></script>
<script src="assets\libs\datatables\buttons.bootstrap4.min.js"></script>

<script src="assets\libs\jszip\jszip.min.js"></script>
<script src="assets\libs\pdfmake\pdfmake.min.js"></script>
<script src="assets\libs\pdfmake\vfs_fonts.js"></script>

<script src="assets\libs\datatables\buttons.html5.min.js"></script>
<script src="assets\libs\datatables\buttons.print.min.js"></script>

<script src="assets\libs\datatables\dataTables.keyTable.min.js"></script>
<script src="assets\libs\datatables\dataTables.select.min.js"></script>

<!-- Datatables init -->
<script src="assets\js\pages\datatables.init.js"></script>

<!-- App js -->
<script src="assets\js\app.min.js"></script>

<script src="assets\js\customJS.js"></script>

<script src="assets\libs\toastr\toastr.min.js"></script>

<script src="assets\js\pages\toastr.init.js"></script>

@yield('script')
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

</script>

</body>
</html>
