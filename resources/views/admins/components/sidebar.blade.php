<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="template/img/profile_small.jpg">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David
                                    Williams</strong>
                            </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="<?=$active === 'Trang Chủ' ? 'active' : ''?>">
                <a href="{{route('admin')}}"><i class="fa fa-home"></i> <span class="nav-label">Trang Chủ</span></a>
            </li>
            <li class="<?=$active === 'Danh Sách Danh Mục' ? 'active' : ''?>">
                <a href="{{route('danhmuc.index')}}"><i class="fa fa-align-left"></i> <span class="nav-label">Danh Sách Danh Mục</span></a>
            </li>
            <li class="<?=$active === 'Danh Sách Sản Phẩm' ? 'active' : ''?>">
                <a href="{{route('sanpham.index')}}"><i class="fa fa-flask"></i> <span class="nav-label">Danh Sách Sản Phẩm</span></a>
            </li>
            <li class="<?=$active === 'Danh Sách Khách Hàng' ? 'active' : ''?>">
                <a href="{{route('khachhang.index')}}"><i class="fa fa-address-book"></i> <span class="nav-label">Danh
                        Sách Khách
                        Hàng</span></a>
            </li>
        </ul>

    </div>
</nav>