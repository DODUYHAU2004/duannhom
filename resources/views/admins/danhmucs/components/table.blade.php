<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Ngày nhập</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Hàng động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDanhMuc as $key => $value)
        @if($value->trang_thai === 1)
            <tr>
                <td>{{$value->ma_danh_muc}}</td>
                <td>{{$value->ten_danh_muc}}</td>
                <td>{{date('d/m/Y', strtotime($value->ngay_nhap))}}</td>
                <td>
                    <div class="bg-primary"
                        style="border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin: 0 auto">
                        <i class="fa fa-check"></i>
                    </div>
                </td>
                <td class="text-center"><a style="margin-right: 2px" href="{{route('danhmuc.edit', $value->id)}}"><button
                    class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                    <form action="{{route('danhmuc.destroy', $value->id)}}" method="post" style="display: inline-block" onsubmit="confirm('Bạn có chắc chắn muốn chuyển vào thùng rác không ?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form></td>
            </tr>
        @endif    
        @endforeach
    </tbody>
</table>
{{$listDanhMuc->links('pagination::bootstrap-4')}}