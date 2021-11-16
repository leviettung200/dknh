<?php

namespace App\Http\Controllers;

use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {

        //validate
//        $request->validate(
//            [
//            'email' => 'required|email|max:255',
//            'password' => 'required|string|min:6'
//            ],
//            [
//                //change error msg
//                'email.required'=> 'Vui lòng nhập email',
//                'email.email'=> 'Sai định dạng email',
//                'password.required'=> 'Vui lòng nhập password',
//                'password.min'=> 'Password quá ngắn',
//
//            ]
//        );
        // validate thành công

        $dataLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        //Hàm xác thực login của laravel
        $checkLogin = Auth::guard('web')->attempt($dataLogin, $request->has('remember'));

        // kiểm tra xem có đăng nhập thành công với email và password đã nhập hay không
        if ($checkLogin) {
            return redirect()->route('student.list')->with('success','Đăng nhập thành công!');
        }

        return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không đúng!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
    public function manageRegistration(){

        $setting = Setting::first();
        $deadline = Carbon::parse($setting->deadline,'Asia/Ho_Chi_Minh');
        $available = Carbon::parse($setting->available,'Asia/Ho_Chi_Minh');

//        dd($deadline->format('Y/m/d H:i'), $available);
        return view('backend.registration',[
            'available' => $available,
            'deadline' => $deadline,
        ]);
    }
    public function updateRegistration(Request $request){

        try {

            $available = $request->input('availableDate');
            $deadline = $request->input('deadlineDate');

            $setting = Setting::first();

            $setting->available = Carbon::parse($available, 'Asia/Ho_Chi_Minh');
            $setting->deadline = Carbon::parse($deadline, 'Asia/Ho_Chi_Minh');
            $setting->user_id = Auth::user()->id;
            $setting->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('error','Cập nhật thời gian thất bại');

        }
        return redirect()->back()->with('success','Cập nhật thời gian thành công');
    }
}
