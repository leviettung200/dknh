<?php

namespace App\Http\Controllers;

use App\Imports\ImportStudent;
use App\Student;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Validators\ValidationException;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $notExist = Student::doesnthave('major')->get();
//        dd(blank($notExist));
        return view('backend.student.list',[
            'students' => $students ,
            'notExist' => blank($notExist) ? null : $notExist,
        ]);
    }
    public function import(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'select_file'=>'required|mimes:xls,xlsx,csv'
            ],
            [
                'select_file.mimes'=>'File truyền vào không hợp lệ. Định dạng file excel .xls, .xlsx, .csv',
                'select_file.required'=>'File dữ liệu không được bỏ trống'
            ]
        );

        if($validator->fails()){
            return back()->with('error', 'File truyền vào không hợp lệ. Định dạng file excel .xls, .xlsx, .csv');
        }
        try {
            $value = new ImportStudent;
            Excel::import($value,$request->file('select_file'));
        } catch (ValidationException $e) {
            $failures = $e->failures();

            return back()->with('failures', $failures);
        } catch (Exception $ex){
            $failures = $ex->getMessage();
            return back()->with('failures', $failures);
        }

        return back()->with('success', 'Nhập dữ liệu thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Student::destroy($id);

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'isSuccess' => $isSuccess
        ], $statusCode);
    }

}
