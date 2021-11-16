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
                                <a type="button" href="{{route('user.create')}}" class="btn btn-warning waves-effect waves-light width-sm">
                                    <i class="mdi mdi-note-plus"></i>Tạo mới</a>
                            </div>
                            <h4 class="page-title">Tài khoản</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title">Danh sách tài khoản</h4>

                            <table id="selection-datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>TT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $key => $user)
                                    <tr class="item-{{ $user->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email}}</td>
                                        @if($user->is_active == 1)
                                            <td class="text-success"> <i class="fa fa-eye" ></i> Hoạt động</td>
                                        @else
                                            <td> <i class="fa fa-eye-slash"></i> Ẩn</td>
                                        @endif
                                        <td class="text-center">
                                            <button onclick="deleteItem('user',{{$user->id}})" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


    </div>

@endsection
@section('script')

@endsection
