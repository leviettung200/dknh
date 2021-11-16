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
{{--                                <a type="button" href="javascript: void (0)" class="ml-1 btn disable-btn width-xs">--}}
{{--                                    <i class="mdi mdi-note-plus"></i>Tạo mới</a>--}}
                            </div>
                            <div class="page-title-right" style="margin-top: 12px">
                                <form method="post" class="form-inline" enctype="multipart/form-data" action="{{route('student.import')}}">
                                    @csrf
                                    <div class=input-group">
                                        <button class="btn btn-purple waves-effect waves-light " type="submit">
                                            <i class="fa fa-save"></i> Nhập từ tệp
                                        </button>
                                        <input type="file" name="select_file" required/>
                                    </div>

                                </form>
                            </div>
                            <h4 class="page-title">Sinh viên</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                @if (session('failures'))
                    <div class="col-md 12 alert alert-danger" role="alert">
                        <div class="d-flex flex-wrap">
                            @if(is_array(session('failures')))
                                @foreach (session('failures') as $failure)
                                    <span style=" width: 33%"> Hàng {{$failure->row()}}: {{$failure->errors()[0]}}</span>
                                @endforeach
                            @else
                                <span style=" width: 33%"> {{session('failures')}} </span>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            @if(is_null($notExist))
                                <h4 class="header-title">Danh sách sinh viên</h4>
                            @else
                                <h4 class="text-danger header-title ">
                                    Danh sách sinh viên có mã nhóm ngành không tồn tại.

                                    <small class="text-muted"><br>Thay đổi thông tin sinh viên hoặc bổ sung nhóm ngành.
                                        <br>Mã lỗi: 101
                                    </small>
                                </h4>
                            @endif
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>TT</th>
                                    <th>Số TT</th>
                                    <th>Tên</th>
                                    <th>Mã nhóm ngành</th>
                                    <th>Tên ngành</th>
                                    <th>Ngày sinh</th>
                                    <th>CCCD</th>
                                    <th>MSV</th>
                                    <th>Email</th>
                                    <th>Dân tộc</th>
                                    <th>SĐT</th>
                                    <th>Ngày nhập</th>
                                    <th>Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(is_null($notExist))
                                @foreach($students as $key => $std)
                                    <tr class="item-{{ $std->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $std->license_id }}</td>
                                        <td>{{ $std->name }}</td>
{{--                                        <td>{{ $std->major_code}}</td>--}}
{{--                                        <td>{{ @$std->major->name}}</td>--}}

                                        @if($std->major->parent_code == null)
                                            <td>{{$std->major->code}}</td>
                                            <td>Chưa đăng ký</td>
                                        @else
                                            <td>{{$std->major->parent_code}} Đã đăng ký</td>
                                            <td>{{$std->major->name}}</td>
                                        @endif
                                        <td>{{ $std->dob}}</td>
                                        <td>{{ $std->cccd}}</td>
                                        <td>{{ $std->code}}</td>
                                        <td>{{ $std->email}}</td>
                                        <td>{{ $std->folk}}</td>
                                        <td>{{ $std->phone}}</td>
                                        <td>{{ $std->created_at->format('Y-m-d H:i')}}</td>
                                        <td>
                                            <button onclick="deleteItem('student',{{$std->id}})" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    @foreach($notExist as $key => $std)
                                        <tr class="item-{{ $std->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $std->license_id }}</td>
                                            <td>{{ $std->name }}</td>
                                            <td>{{$std->major_code}}</td>
                                            <td>Không tồn tại</td>
                                            <td>{{ $std->dob}}</td>
                                            <td>{{ $std->cccd}}</td>
                                            <td>{{ $std->code}}</td>
                                            <td>{{ $std->email}}</td>
                                            <td>{{ $std->folk}}</td>
                                            <td>{{ $std->phone}}</td>
                                            <td>
                                                <button onclick="deleteItem('student',{{$std->id}})" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


    </div>

@endsection
@section('script')

@endsection
