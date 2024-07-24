<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<form method="post" action="{{route('sanpham.update', $sanPhamDetail->id)}}" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('put')
    <div class="form-group"><label class="col-sm-2 control-label">Mã sản phẩm</label>

        <div class="col-sm-10"><input type="text" name="id" disabled value="{{$sanPhamDetail->ma_san_pham}}" class="form-control"></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Tên sản phẩm <span
                class="text-danger">(*)</span></label>
        <div class="col-sm-10"><input type="text" value="{{$sanPhamDetail->ten_san_pham}}" name="name" class="form-control">
            @if ($errors->has('name'))
            <p class="error-message">* {{$errors->first('name')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Ảnh <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="file" class="form-control" name="image" onchange="showImage(event)">
            <img src="" style="margin-top: 5px; width:40px; object-fit: cover; aspect-ratio: 1/1; display: none" id="image_san_pham" alt="image">
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Giá <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" value="{{$sanPhamDetail->gia}}" name="price" class="form-control">
            @if ($errors->has('price'))
            <p class="error-message">* {{$errors->first('price')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Số lượng <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" value="{{$sanPhamDetail->so_luong}}" placeholder="0" name="quantity" class="form-control">
            @if ($errors->has('quantity'))
            <p class="error-message">* {{$errors->first('quantity')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>

        <div class="col-sm-10"><textarea name="description" class="form-control" id="content" >{!!$sanPhamDetail->mo_ta!!}</textarea>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Danh Mục</label>

        <div class="col-sm-10"><select name="category" class="form-control" id="">
                @foreach($listDanhMuc as $key => $value)
                <option {{$value->id === $sanPhamDetail->danh_muc_id ? "selected" : ""}} value="{{$value->id}}">{{$value->ten_danh_muc}}</option>
                @endforeach
            </select></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-white" type="reset" style="margin-right: 2px;">Hủy</button>
            <button class="btn btn-primary" type="submit">Cập nhật</button>
        </div>
    </div>
</form>
<script>
    function showImage(event){
     const image_san_pham = document.getElementById('image_san_pham');
     const file = event.target.files[0];
     const render = new FileReader();
     render.onload = function () {
        image_san_pham.src = render.result;
        image_san_pham.style.display = "block";
     }
     if(file){
        render.readAsDataURL(file);
     }
    }
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
    </script>