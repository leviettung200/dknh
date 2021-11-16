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

    <!-- Notification css (Toastr) -->
    <link href="assets\libs\toastr\toastr.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body class="authentication-bg">

<div class="account-pages pt-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="account-card-box">
                    <div class="card mb-0">
                        <div class="card-body p-4">

                            <div class="text-center">
                                <div class="my-3">
                                    <a href="/">
                                        <span><img src="assets\images\logo.png" alt="" height="88"></span>
                                    </a>
                                </div>

                                <h5 class="text-muted text-uppercase py-3 font-16">Học viện Nông nghiệp Việt Nam</h5>
                            </div>

                            <form action="{{route('admin.postLogin')}}" class="mt-2" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input class="form-control" name="email" type="text" required="" placeholder="Tài khoản">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="password" type="password" required="" id="password" placeholder="Mật khẩu">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" checked>
                                        <label class="custom-control-label" for="remember">Ghi nhớ</label>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Đăng nhập </button>
                                </div>


                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>

                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="assets\js\vendor.min.js"></script>

<!-- App js -->
<script src="assets\js\app.min.js"></script>

<script src="assets\libs\toastr\toastr.min.js"></script>

<script src="assets\js\pages\toastr.init.js"></script>

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
