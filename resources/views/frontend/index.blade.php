@extends('frontend.layouts.main')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box text-center">
                            <!-- <div class="page-title-right">
                                <button type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-account-edit-outline"></i> Sửa</button>

                                <button type="button" class="btn btn-light waves-effect">
                                    <i class="mdi mdi-close"></i> Huỷ</button>
                            </div> -->
                            <h4 class="page-title">Hệ thống đăng ký ngành học K66</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row p-4">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-6 p-5">
                                    <div>
                                        <h4 class="header-title">Thông tin cá nhân</h4>
                                        <!-- <p class="sub-header">
                                            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                        </p> -->

                                        <div action="#" class="parsley-examples" data-parsley-validate="" novalidate="">
                                            <div class="form-group">
                                                <label for="fullName">Họ và tên: </label>
                                                <p>
                                                    {{$student->name}}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="studentCode">Mã sinh viên: </label>
                                                <p>
                                                    {{$student->code}}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Ngày sinh: </label>
                                                <p>
                                                    {{$student->dob}}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Giới tính: </label>
                                                <p>
                                                    {{$student->gender}}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="folk">Dân tộc: </label>
                                                <p>
                                                    {{$student->folk}}
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Số CCCD: </label>
                                                <p>
                                                    {{$student->cccd}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6 p-5">
                                    <div class="mt-4 mt-lg-0">
                                        <h4 class="header-title">Thông tin ngành học</h4>
                                        <p class="sub-header text-danger">
                                            Vui lòng đăng ký ngành học trước ngày: {{$deadline}}
                                        </p>


                                        <form role="form" action="{{route('home.submit')}}" class="parsley-examples" data-parsley-validate="" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="parent_major">Nhóm ngành học: </label>
                                                <p>
                                                    {{$parent->code}} - {{$parent->name}}
                                                </p>
                                            </div>

                                            <div class="form-group">
                                                <label for="major">Ngành học: </label>
                                                <select class="custom-select mb-3" id="major" name="major">
                                                    @if($student->major_code == $parent->code)
                                                        <option value="{{$student->major_code}}" selected>Chọn ngành học </option>
                                                    @endif
                                                    @foreach($children as $child)
                                                        <option {{ $student->major_code == $child->code ? 'selected' : ''}} value="{{$child->code}}">{{$child->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="">
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                                        <i class="mdi mdi-account-edit-outline"></i> Lưu</button>

{{--                                                    <button type="button" class="btn btn-light waves-effect">--}}
{{--                                                        <i class="mdi mdi-close"></i> Huỷ</button>--}}

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- end col-->

                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



    </div>

@endsection
@section('script')

@endsection
