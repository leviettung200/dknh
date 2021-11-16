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
{{--                                <a type="button" class="btn btn-info waves-effect waves-light width-sm">--}}
{{--                                    <i class="  mdi mdi-file-excel-outline"></i>Nhập từ tệp</a>--}}
                                <a type="button" href="{{route('major.create')}}" class="btn btn-warning waves-effect waves-light width-sm">
                                    <i class="mdi mdi-note-plus"></i>Tạo mới</a>
                            </div>
                            <h4 class="page-title">Ngành học</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title">Danh sách ngành học</h4>

                            <table id="selection-datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>TT</th>
                                    <th>Tên ngành</th>
                                    <th>Nhóm ngành</th>
                                    <th>Mã nhóm ngành</th>
                                    <th>Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($majors as $key => $major)
                                    <tr class="item-{{ $major->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $major->name }}</td>
                                        <td>{{ $major->parent->name or ''}}</td>
                                        <td>{{ $major->code }}</td>
                                        <td>
                                            <button onclick="deleteItem('major',{{$major->id}})" class="btn btn-danger">
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
