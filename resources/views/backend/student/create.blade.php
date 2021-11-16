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
                                <a type="button" href="{{route('major.list')}}" class="btn btn-outline-info waves-effect waves-light width-sm">
                                    <i class="mdi mdi-note-multiple"></i>Danh sách</a>
                            </div>
                            <h4 class="page-title">ngành học</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-xl-6">
                        @include('partials.validate')
                        <form action="{{route('major.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên ngành</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên ngành">
                                <small class="text-muted">Tên nhóm ngành / Tên ngành
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="code">Mã ngành</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Mã ngành">
                                <small class="text-muted">Mã nhóm ngành / Mã ngành
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="parent_code">Thuộc nhóm ngành</label>
                                <select class="custom-select mb-3" name="parent_code">
                                    <option value="" selected>--Chọn--</option>
                                    @foreach($majors as $major)
                                        <option value="{{$major->id}}">{{$major->name}}</option>
                                    @endforeach

                                </select>
                                <small class="text-muted">Bỏ qua nếu là nhóm ngành
                                </small>
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
