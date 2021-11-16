<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MajorController extends Controller
{
    public function index()
    {
        $majors =Major::all();

        return view('backend.major.list',[
            'majors' => $majors,
        ]);
    }
    public function create()
    {
        $majors = Major::where(['parent_code'=> null])->get();
//        dd($majors);
        return view('backend.major.create',[
            'majors' => $majors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'code' => 'required|unique:majors,code',
//        ],[
//            'name.required' => 'Tên ngành là bắt buộc.',
//            'code.required' => 'Mã ngành là bắt buộc.',
//        ]);
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:majors,code',
        ],[
            'name.required' => 'Tên ngành là bắt buộc.',
            'code.required' => 'Mã ngành là bắt buộc.',
            'code.unique' => 'Mã ngành đã tồn tại'
        ]);
        try {

            $major = new Major();

            $major->name = $request->input('name');

            $major->code = $request->input('code');

            $major->parent_code = $request->input('parent_code');

            $major->save();
        }
        catch (\Exception $e){
            return redirect()->route('major.create')->with('error','Tạo thất bại !');
        }
        return redirect()->route('major.create')->with('success','Tạo thành công !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Major::all();
        $major = Major::findorFail($id);
        return view('major.edit',[
            'data' => $major,
            'category' => $data
        ]);
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
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên danh mục.',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $major = Category::findorFail($id);
        $major->parent_id = $request->input('parent_id');
        $major->name = $request->input('name');
        $major->slug = Str::slug($request->input('name'));

        if($request->hasFile('new_image')){
            @unlink(public_path($major->image));
            $file = $request->file('new_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/category/';
            $file->move($path_upload,$filename);
            $major->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $major->is_active = $is_active;

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $major->position  = $position;

        $major->type = $request->input('type');
        $major->save();

        return  redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Major::destroy($id);

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
