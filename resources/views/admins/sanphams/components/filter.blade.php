<div class="filter-wrapper">
    <div class="uk-flex uk-flex-middle uk-flex-space-between">
        <div class="perpage">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <select name="perpage" id="" class="form-control input-sm perpage filter mr10">
                    @for($i = 20; $i <=200; $i+=20) <option value="{{$i}}">{{$i}} sản phẩm</option>
                        @endfor
                </select>
            </div>
        </div>
        <div class="action">
            <div class="uk-flex uk-flex-middle">
                <select name="user_catalogue_id" id="" class="form-control mr10">
                    <option value="0">Select With Category</option>
                    <option value="1">Putter</option>
                </select>
                <div class="uk-search uk-flex uk-flex-middle mr10">
                    <div class="input-group">
                        <input type="text" name="keyword" value="" placeholder="Enter keyword" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" name="search" value="Tìm kiếm"
                                class="btn btn-info mb0 btn-sm">Search</button>
                        </span>
                    </div>
                </div>
                <a href="{{route('sanpham.create')}}"><button class="btn btn-primary"><i
                            class="fa fa-plus mr5"></i>Thêm mới sản phẩm</button></a>
            </div>
        </div>
    </div>
</div>