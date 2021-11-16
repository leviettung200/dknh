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
                            <div class="page-title-right">
                                <a type="button" href="{{route('user.list')}}" class="btn btn-outline-info waves-effect waves-light width-sm">
                                    <i class="mdi mdi-note-multiple"></i>Danh sách</a>
                            </div>
                            <h4 class="page-title">Danh sách tài khoản</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-6">
                        @include('partials.validate')
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ tên</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group" >
                                <div class="custom-control custom-checkbox" >
                                    <input style="cursor: pointer" value="1" type="checkbox" class="custom-control-input" id="is_active" name="is_active">
                                    <label class="custom-control-label" style="cursor: pointer" for="is_active">Trạng thái</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                        </form>
                    </div><!-- end col -->


                </div>
            </div> <!-- end container-fluid -->

        </div> <!-- end content -->





    </div>

@endsection
@section('script')

@endsection
