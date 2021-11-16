<?php

//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class HomeController extends Controller
//{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        return view('home');
//    }
//}


namespace App\Http\Controllers;

use App\Major;
use App\Setting;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        try {
            $student = Student::findorFail(Auth::guard('student')->id());
            if ($student->major->parent_code == null){
                //major_code lưu parent
                $parent = $student->major;
                $children = Major::where(['parent_code' => $student->major->code])->get();
            }else{
                //major_code lưu child
                $parent = Major::where(['code' => $student->major->parent_code])->first();
                $children = Major::where(['parent_code' => $student->major->parent_code])->get();
            }
        }catch (\Exception $e){
            return redirect()->route('home.login')->with('error', 'Đã xảy ra lỗi!. Mã lỗi: 101');
        }
        $deadline = Setting::first()->deadline;
//        dd($deadline);
        return view('frontend.index',[
            'student' => $student,
            'parent' => $parent,
            'children' => $children,
            'deadline' =>$deadline,
        ]);
    }
    public function submitMajor(Request $request)
    {
//        $now = Carbon::now('Asia/Ho_Chi_Minh');
//        $deadline = Carbon::parse('2021-08-11 23:59','Asia/Ho_Chi_Minh');
//
//        if (!$now->lte($deadline)) {
//            return redirect()->back()->with('error', 'Đã vượt quá thời gian chỉnh sửa ngành học!');
//        }
        $data = $request->input('major');
        $student = Student::findorFail(Auth::guard('student')->id());

//        Error 101 can execute !!!
        if ($student->major->parent_code == null){
            $parent_code = $student->major_code;
        }else{
            //major_code lưu child
            $parent_code = $student->major->parent_code;
        }
        $temp = Major::where(['code' => $data])->first();
//        dd(!is_null($temp));
        if( is_null($temp) || $parent_code != $temp->parent_code){
            return redirect()->back()->with('error', 'Đã xảy ra lỗi!');
        }

        try {
            $student->major_code = $data;
            $student->save();
        }catch (Exception $e){
            return redirect()->back()->with('error', 'Đã xảy ra lỗi!');
        }
        return redirect()->back()->with('success', 'Thay đổi ngành học thành công!');
    }
    public function login()
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không

        if (Auth::guard('student')->attempt($arr, $request->has('remember'))) {

//            $student = Student::findorFail(Auth::guard('student')->id());

            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');

        } else {
            return redirect()->route('home.login')->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }
    public function logout()
    {
        Auth::guard('student')->logout();

        return redirect()->route('home.login');
    }
}
