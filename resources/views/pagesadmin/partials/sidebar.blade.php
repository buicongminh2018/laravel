<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('backend/admin/dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Trang quản lý</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" {{ asset('backend/admin/dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if(auth()->check())
                    {{auth()->user()->name}}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Danh mục sản phẩm
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>

                {{--product--}}
                <a href="{{route('products.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Sản phẩm
                    </p>
                </a>
                <a href="{{route('oders.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý đơn hàng
                    </p>
                </a>
                <a href="{{route('coupon.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý mã giảm giá
                    </p>
                </a>

                <a href="{{route('delivery.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý phí vận chuyển
                    </p>
                </a>

                {{--menu--}}



                <a href="{{route('slider.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Slider
                    </p>
                </a>


                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Danh sách nhân viên
                    </p>
                </a>
                <a href="{{route('roles.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Danh sách vai trò
                    </p>
                </a>
                <a href="{{route('permissions.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Tạo dữ liệu permissions
                    </p>
                </a>
                <a href="{{route('detailsProduct.comment')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý bình luận
                    </p>
                </a>

                </li>
            </ul>
        </nav>



        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
