<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('storage/avatars/avatar-trang.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Session::get('fullname')}}</span>
                    <span class="text-secondary text-small">{{Session::get('loaiTK')}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.home')}}">
                <span class="menu-title">Trang chủ</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Quản lý Sách</span>
                <i class="menu-arrow"></i>
                <i class="bi bi-journal-album" style="color: #BEABC2;"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.danhmucsach.index')}}">Danh mục Sách</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.danhmucsach.nhap-sach')}}">Nhập sách</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Quản lý Tài khoản</span>
                <i class="menu-arrow"></i>
                <i class="bi bi-person-lines-fill" style="color: #BEABC2;"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.nguoidung.index')}}">Quản lý người
                            dùng</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.nhanvien.index')}}">Quản lý nhân
                            viên</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-2" aria-expanded="false"
                aria-controls="ui-basic-2">
                <span class="menu-title">Quản lý mượn/trả</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic-2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.order.get-view-order')}}">Đơn đặt</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.get-view-borrow')}}">Đang mượn</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.get-view-history')}}">Lịch sử</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Thống kê</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.template-table')}}">
                <span class="menu-title">Template table</span>
                <i class="menu-icon bi bi-table" style="color: #BEABC2;"></i>
            </a>
        </li>

    </ul>
</nav>