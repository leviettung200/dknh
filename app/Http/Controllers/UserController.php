<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.user.list',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'email'=>'required|unique:users,email',
        ],[
            'name.required' =>'Họ và tên là bắt buộc',
            'password.required' =>'Mật khẩu là bắt buộc',
            'password.min' =>'Mật khẩu cần ít nhất 6 ký tự',
            'email.required' =>'Email là bắt buộc',
            'email.unique' =>'Email đã tồn tại',
        ]);
        //luu vào csdl
        try {
            $user = new User();
            $user->name = $request->input('name'); // họ tên
            $user->email = $request->input('email'); // email
            $user->password = bcrypt($request->input('password')); // mật khẩu

//        $is_active = 0;
//        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
//            $is_active = $request->input('is_active');
//        }

            $user->is_active = 1;
            $user->save();

        }catch (\Exception $exception){
            return redirect()->route('user.create')->with('error','Tạo tài khoản thất bại');
        }

        // chuyen dieu huong trang
        return redirect()->route('user.create')->with('success','Tạo tài khoản thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('backend.user.edit',['user'=>$user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email'=>'unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[

        ],[
            'name' =>'Họ tên',
            'image' =>'Ảnh',
        ]);

        $user->name = $request->input('name'); // họ tên
        $user->email = $request->input('email'); // email
        $user->role_id = $request->input('role_id'); // phần quyền
        // kiểm tra xem có nhập mật khẩu mới không ,, nếu có thì mới cập nhật
        if ($request->input('new_password')) {
            $user->password = bcrypt($request->input('new_password')); // mật khẩu mới
        }

        if ($request->hasFile('new_avatar')) {
            // xóa file cũ
            @unlink(public_path($user->avatar)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $file->move($path_upload,$filename);
            $user->avatar = $path_upload.$filename;
        }

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $user->is_active = $is_active;
        $user->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.user.index')->with('success','Cập nhật User thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        // DELETE FROM ten_bang WHERE id = 33 -> execute command
        $isDelete = User::destroy($id);

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
}
