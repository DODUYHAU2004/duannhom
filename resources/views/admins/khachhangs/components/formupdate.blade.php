<form method="post" action="{{route('khachhang.update', $khachHangDetail->id)}}" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('put')
    <div class="form-group"><label class="col-sm-2 control-label">Mã khách hàng</label>

        <div class="col-sm-10"><input type="text" name="id" value="{{$khachHangDetail->ma_khach_hang}}" disabled class="form-control"></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Họ và tên <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" value="{{$khachHangDetail->name}}" name="name" class="form-control">
            @if ($errors->has('name'))
            <p class="error-message">* {{$errors->first('name')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại <span
                class="text-danger">(*)</span></label>
        <div class="col-sm-10"><input type="text" value="{{$khachHangDetail->so_dien_thoai}}" name="phone" class="form-control">
            @if ($errors->has('phone'))
              <p class="error-message">* {{$errors->first('phone')}}</p>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Email <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" value="{{$khachHangDetail->email}}" class="form-control"
                placeholder="example@gmail.com" name="email">
                @if ($errors->has('email'))
              <p class="error-message">* {{$errors->first('email')}}</p>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" value="{{$khachHangDetail->dia_chi}}" name="address" placeholder="Nhập địa chỉ cụ thể"
                class="form-control">
                @if ($errors->has('address'))
                <p class="error-message">* {{$errors->first('address')}}</p>
              @endif
            </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10"><input type="file" name="image" class="form-control" onchange="showImage(event)">
            <img src="" style="margin-top: 5px; width:40px; object-fit: cover; aspect-ratio: 1/1; display: none" id="image_san_pham" alt="image">
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="password" value="{{$khachHangDetail->mat_khau}}" name="password" class="form-control">
            @if ($errors->has('password'))
            <p class="error-message">* {{$errors->first('password')}}</p>
          @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Vai trò</label>

        <div class="col-sm-10"><select name="role" class="form-control" id="">
                <option {{$khachHangDetail->vai_tro === 1 ? "selected" : ""}} value="1">user</option>
                <option {{$khachHangDetail->vai_tro === 2 ? "selected" : ""}} value="2">admin</option>
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