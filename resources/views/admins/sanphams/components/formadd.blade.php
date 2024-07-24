<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<form method="post" action="{{route('sanpham.store')}}" class="form-horizontal" enctype="multipart/form-data">
    @csrf
     {{-- CSRF Field: là một trường ẩn mà laravel bắt buộc nhúng vào form cho mục đích bảo vệ website  --}}
    <div class="form-group"><label class="col-sm-2 control-label">Mã sản phẩm</label>

        <div class="col-sm-10">
            <input type="text" name="id" placeholder="Auto String" disabled class="form-control">
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Tên sản phẩm <span
                class="text-danger">(*)</span></label>
        <div class="col-sm-10"><input type="text" name="name" class="form-control">
            @if ($errors->has('name'))
                <p class="error-message">* {{$errors->first('name')}}</p>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Ảnh <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="file" class="form-control" name="image" onchange="showImage(event)">
            <img src="" style="margin-top: 5px; width:40px; object-fit: cover; aspect-ratio: 1/1; display: none" id="image_san_pham" alt="image">
            @if ($errors->has('image'))
            <p class="error-message">* {{$errors->first('image')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Giá <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="number" placeholder="0" name="price" class="form-control">
            @if ($errors->has('price'))
            <p class="error-message">* {{$errors->first('price')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Số lượng <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="number" placeholder="0" name="quantity" class="form-control">
            @if ($errors->has('quantity'))
            <p class="error-message">* {{$errors->first('quantity')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>
        <div class="col-sm-10"><textarea name="description" class="form-control" id="content" ></textarea>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Danh Mục</label>

        <div class="col-sm-10"><select name="category" class="form-control" id="">
            @foreach($listDanhMuc as $key => $value)
                <option value="{{$value->id}}">{{$value->ten_danh_muc}}</option>
            @endforeach    
            </select></div>
    </div>
    <div class="hr-line-dashed"></div>
    {{-- <div class="form-group"><label class="col-sm-2 control-label">Trạng thái <br>
            <small class="text-navy">Tình trạng</small></label>

        <div class="col-sm-10">
            <div><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Hoạt
                    động</label></div>
            <div><label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Không hoạt
                    động</label></div>
        </div>
    </div>
    <div class="hr-line-dashed"></div> --}}
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-white" type="reset" style="margin-right: 2px;">Hủy</button>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
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