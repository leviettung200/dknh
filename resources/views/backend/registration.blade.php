@extends('backend.layouts.main')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Ngày đăng ký</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <form action="{{route('admin.updateRegistration')}}" method="post">
                            @csrf
                                <h4 class="header-title">Thiết lập khoảng thời gian đăng ký ngành học cho đợt hiện tại.</h4>
                                <p class="sub-header">
                                    Sinh viên được phép đăng ký ngành học nếu được nhập vào hệ thống sau "Thời gian bắt đầu" và trước "Thời gian kết thúc"
                                </p>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div>
                                            <h4 class="header-title">Thời gian bắt đầu</h4>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control myPick" value="{{$available->format('Y-m-d H:i')}}" name="availableDate" placeholder="mm/dd/yyyy hh:mm" >
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    <div>
                                        <h4 class="header-title">Thời gian kết thúc</h4>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="deadlineDate" value="{{$deadline->format('Y/m/d H:i')}}" class="form-control myPick" placeholder="mm/dd/yyyy hh:mm" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        Cập nhật
                                    </button>
                                </div>
                            <!-- end row -->
                            </form>
                        </div>
                    </div><!-- end col-->

                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


    </div>

@endsection
@section('script')

    <link href="assets\libs\bootstrap-daterangepicker\daterangepicker.css" rel="stylesheet">

    <!-- plugins -->
    <script src="assets\libs\moment\moment.min.js"></script>

    <script src="assets\libs\bootstrap-daterangepicker\daterangepicker.js"></script>

    <!-- Init js-->
    <script src="assets\js\pages\form-pickers.init.js"></script>

    <script>
        $(function() {
            $("input.myPick").daterangepicker({

                timePicker: true,
                singleDatePicker: true,
                locale: {
                    format: 'YYYY-MM-DD hh:mm A'
                },
                autoApply: true,
            });
        });
    </script>
@endsection
