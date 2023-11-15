@extends('admin.index')

@section('body')
<div class="row">
    <div class="col-12 col-lg-12 col-sm-12 ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chỉnh sửa thông tin nhân viên</h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('admin.nhanvien.cap-nhat-thong-tin-nhan-vien', ['id' => $info->MaTK]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Fullname">Name</label>
                        <input type="text" name="ten" class="form-control" id="Fullname" placeholder="FullName" value="{{ $info->Fullname }}">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="email" id="Email" placeholder="Email" value="{{ $info->Email }}">
                    </div>

                    <div class="form-group">
                        <label for="TenTK">Tên tài khoản:</label>
                        <input type="text" class="form-control" name="TenTK" id="TenTK" required placeholder="Tên tài khoản" value="{{ $info->TenTK }}">
                    </div>

                    <div class="form-group">
                        <label for="MatKhau">Password</label>
                        <input type="password" class="form-control" name="MatKhau" id="MatKhau" placeholder="Password" value="{{ $info->MatKhau }}">
                    </div>

                    <div class="form-group">
                        <label for="SDT">Số điện thoại:</label>
                        <input type="text" class="form-control" name="SDT" id="SDT" placeholder="Số điện thoại" value="{{ $info->SDT }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" name="GioiTinh" id="GioiTinh">
                            <option value="Male" {{ $info->GioiTinh == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $info->GioiTinh == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="LoaiTK">Loại tài khoản:</label>
                        <select name="LoaiTK" id="LoaiTK">
                            <option value="Admin" {{ $info->LoaiTK == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Nhân viên" {{ $info->LoaiTK == 'Nhân viên' ? 'selected' : '' }}>Nhân viên</option>
                            <option value="Khách hàng" {{ $info->LoaiTK == 'Khách hàng' ? 'selected' : '' }}>Khách hàng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Dob">Date of Birth</label>
                        <input type="date" class="form-control" name="Dob" id="Dob" value="{{ $info->Dob }}">
                    </div>

                    <div class="form-group">
                        <label for="DiaChi">Địa chỉ:</label>
                        <input type="text" class="form-control" name="DiaChi" id="DiaChi" placeholder="Địa chỉ" value="{{ $info->DiaChi }}">
                    </div>

                    <div class="form-group">
                        <label>Profile picture</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</div>

@endsection