<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Ngày nhập</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Hàng động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listSanPham as $key => $value)
        @if($value->trang_thai === 1)
            <tr>
             <td>{{$value->ma_san_pham}}</td>
             <td>{{$value->ten_san_pham}}</td>
             <td style="width: 90px;">
                <img src="{{Storage::url($value->anh_san_pham)}}" style="width: 100%;object-fit: cover; aspect-ratio: 1/1;" alt="Ảnh sản phẩm"></td>
             <td>{{number_format($value->gia, 0, '', '.')}} vnđ</td>
             <td>{{$value->so_luong}}</td>
             <td>{{$value->ten_danh_muc}}</td>
             <td>{{date('d/m/Y', strtotime($value->ngay_nhap))}}</td>
             <td><div class="bg-primary"
                    style="border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin: 0 auto">
                    <i class="fa fa-check"></i>
                </div></td>
             <td class="text-center"><a style="margin-right: 2px" href="{{route('sanpham.edit', $value->id)}}"><button
                class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                <form action="{{route('sanpham.destroy', $value->id)}}" method="post" style="display: inline-block" onsubmit="confirm('Bạn có chắc chắn muốn chuyển vào thùng rác không ?')">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></td></td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
{{$listSanPham->links('pagination::bootstrap-4')}}
