<?php

namespace App\Http\Controllers\admins;

use App\Models\DanhMuc;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $active = 'Danh Sách Danh Mục';
    public function index()
    {
        $listDanhMuc = DanhMuc::orderByDesc('id')->paginate(5);
        $template = 'admins.danhmucs.list';
        return view('admins.layout',['title' => 'Danh Sách Danh Mục', 'template' => $template, 'active' => $this->active, 'listDanhMuc' => $listDanhMuc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'admins.danhmucs.add';
        return view('admins.layout',['title' => 'Thêm Danh Mục', 'template' => $template, 'active' => $this->active]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        if($request->isMethod('POST')){
        $data = [
            "ma_danh_muc" => "DM-".Str::random(6),
            "ten_danh_muc" => $request->input('name'),
        ];
        DanhMuc::create($data);
        return redirect()->route('danhmuc.index')->with('success','Thêm mới danh mục thành công');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $danhMucDetail = DanhMuc::find($id);
        $template = 'admins.danhmucs.update';
        return view('admins.layout',['title' => 'Sửa Danh Mục', 'template' => $template, 'active' => $this->active,'danhMucDetail' => $danhMucDetail]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DanhMucRequest $request, string $id)
    {
        if($request->isMethod('PUT')){
            $danhMucUpdate = DanhMuc::find($id);
            if($danhMucUpdate){
            $danhMucUpdate->ten_danh_muc = $request->input('name');
            $danhMucUpdate->save();
            return redirect()->route("danhmuc.index")->with("success", "Cập nhật danh mục thành công");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMucTrash = DanhMuc::find($id);
        if($danhMucTrash){
            $danhMucTrash->trang_thai = 0;
            $danhMucTrash->save();
            return redirect()->route("danhmuc.index")->with("success", "Chuyển vào thùng rác thành công");
        }
    }
}