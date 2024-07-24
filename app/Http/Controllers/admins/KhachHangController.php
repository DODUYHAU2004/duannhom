<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\KhachHangs\FormAddRequest;
use App\Http\Requests\KhachHangs\FormUpdateRequest;

class KhachHangController extends Controller
{
    protected $active = "Danh Sách Khách Hàng";
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $listKhachHang = User::orderByDesc('id')->paginate(8);
        $template = 'admins.khachhangs.list';
        return view('admins.layout',['title' => 'Danh Sách Khách Hàng', 'template' => $template, 'active' => $this->active, 'listKhachHang' => $listKhachHang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'admins.khachhangs.add';
        return view('admins.layout',['title' => 'Thêm Khách Hàng', 'template' => $template, 'active' => $this->active]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormAddRequest $request)
    {
        if($request->isMethod('POST')){
            if($request->hasFile("image")){
                // Thêm hình ảnh
                $fileName = $request->file('image')->store('uploads/khachhang', "public");
            }else{
                $fileName = NULL;
            }
            
            $data = [
                "ma_khach_hang" => "KH-".Str::random(6),
                "name" => $request->input('name'),
                "so_dien_thoai" => $request->input('phone'),
                "email" => $request->input('email'),
                "dia_chi" => $request->input('address'),
                "anh_dai_dien" => $fileName,
                "vai_tro" => $request->input('role'),
                "mat_khau" => $request->input('password'),
                "password" => Hash::make($request->input('password')),
            ];
            User::create($data);
            return redirect()->route('khachhang.index')->with('success','Thêm mới khách hàng thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $khachHangDetail = User::find($id);
        $template = 'admins.khachhangs.update';
        return view('admins.layout',['title' => 'Sửa Khách Hàng', 'template' => $template, 'active' => $this->active, 'khachHangDetail' => $khachHangDetail]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormUpdateRequest $request, string $id)
    {
        if($request->isMethod('PUT')){
            $khachHangUpdate = User::find($id);
            if($khachHangUpdate){
              if ($request->hasFile('image')) {  
                if($khachHangUpdate->anh_dai_dien){
                    Storage::disk('public')->delete($khachHangUpdate->anh_dai_dien);
                } 
                   //Lưu ảnh mới
                   $fileName = $request->file('image')->store("uploads/khachhang", "public");
                }else{
                   $fileName = $khachHangUpdate->anh_dai_dien;
                }
            $khachHangUpdate->name = $request->input('name');
            $khachHangUpdate->so_dien_thoai = $request->input('phone');
            $khachHangUpdate->email = $request->input('email');
            $khachHangUpdate->dia_chi = $request->input('address');
            $khachHangUpdate->anh_dai_dien = $fileName;
            $khachHangUpdate->vai_tro = $request->input('role');
            $khachHangUpdate->mat_khau = $request->input('password');
            $khachHangUpdate->password = Hash::make($request->input('password'));
            $khachHangUpdate->save();
            return redirect()->route("khachhang.index")->with("success", "Cập nhật khách hàng thành công");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khachHangTrash = User::find($id);
        if($khachHangTrash){
            $khachHangTrash->trang_thai = 0;
            $khachHangTrash->save();
            return redirect()->route("khachhang.index")->with("success", "Chuyển vào thùng rác thành công");
        }
    }
}