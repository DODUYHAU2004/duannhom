<?php

namespace App\Http\Controllers\Admins;

use App\Models\SanPham;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Http\Requests\SanPhams\FormAddRequest;
use App\Http\Requests\SanPhams\FormUpdateRequest;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    // construct sử dụng khi dùng SQL thuần và Query Builder
    // protected $sanPham;
    /**
     * Display a listing of the resource.
     */
    // public function __construct() //Khởi tạo mội đối tượng khởi tạo model
    // {
    //     $this->sanPham = new SanPham();
    // }
    protected $active = "Danh Sách Sản Phẩm";
    public function index()
    {
        //Lấy dữ liệu
        // $listSanPham = $this->sanPham->getAll();
        //Sử dụng Eloquent
        $listSanPham = SanPham::select('san_phams.*', 'danh_mucs.ten_danh_muc')->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')->orderByDesc('san_phams.id')->paginate(8);
        // toArray để lấy ra mảng dữ liệu
        $template = 'admins.sanphams.list';
        return view('admins.layout', ['title' => 'Danh Sách Sản Phẩm', 'template' => $template, 'active' => $this->active, 'listSanPham' => $listSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = DanhMuc::get();
        $template = 'admins.sanphams.add';
        return view('admins.layout', ['title' => 'Thêm Sản Phẩm', 'template' => $template, 'active' => $this->active, 'listDanhMuc' => $listDanhMuc]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormAddRequest $request)
    {
       //Kiểm tra người dùng có sử dụng form để gửi dữ liệu lên không
       if($request->isMethod('POST')){
        // $params = $request->post();
        // // unset($params['_token']); // xóa _token cách 1
        // $params = $request->except('_token'); //xóa _token cách 2
        // $this->sanPham->createSanPham($params);
        //Quay lại trang danh sách và bắn thông báo
        // Thêm hình ảnh
        if($request->hasFile("image")){
            // Thêm hình ảnh
            $fileName = $request->file('image')->store('uploads/sanpham', "public");
        }else{
            $fileName = NULL;
        }
        // php artisan storage:link
        $data = [
            "ma_san_pham" => "SP-".Str::random(6),
            "ten_san_pham" => $request->input('name'),
            "anh_san_pham" => $fileName,
            "gia" => $request->input('price'),
            "so_luong" => $request->input('quantity'),
            "mo_ta" => $request->input('description'),
            "danh_muc_id" => $request->input('category'),
        ];
        SanPham::create($data);
        return redirect()->route('sanpham.index')->with('success', 'Thêm mới sản phẩm thành công');
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
        $listDanhMuc = DanhMuc::get();
        $sanPhamDetail = SanPham::find($id);
        $template = 'admins.sanphams.update';
        return view('admins.layout', ['title' => 'Sửa Sản Phẩm', 'template' => $template, 'active' => $this->active, 'sanPhamDetail' => $sanPhamDetail, 'listDanhMuc' => $listDanhMuc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormUpdateRequest $request, string $id)
    {
        if($request->isMethod('PUT')){
            $sanPhamUpdate = SanPham::find($id);
            if($sanPhamUpdate){
                // Nếu có ảnh thì xóa đi
             if ($request->hasFile('image')) {
                if($sanPhamUpdate->anh_san_pham){
                   Storage::disk('public')->delete($sanPhamUpdate->anh_san_pham);
                }
                   //Lưu ảnh mới
                   $fileName = $request->file('image')->store("uploads/sanpham", "public");
             }else{
               $fileName = $sanPhamUpdate->anh_san_pham;
             }
            $sanPhamUpdate->ten_san_pham = $request->input('name');
            $sanPhamUpdate->anh_san_pham = $fileName;
            $sanPhamUpdate->gia = $request->input('price');
            $sanPhamUpdate->so_luong = $request->input('quantity');
            $sanPhamUpdate->mo_ta = $request->input('description');
            $sanPhamUpdate->danh_muc_id = $request->input('category');
            $sanPhamUpdate->save();
            return redirect()->route("sanpham.index")->with("success", "Cập nhật sản phẩm thành công");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanpham=SanPham::find($id);
        $sanpham->delete();
        return redirect()->route('sanpham.index');
    }
}
