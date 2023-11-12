@extends('admin.index')

@section('body')
<div class="row">
  <div class="col-12 col-lg-12 col-sm-12 ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm nhân viên mới</h4>
        
        <hr>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">                    
                  <form class="forms-sample" action="{{ route('admin.luu-thong-tin-tai-khoan') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Fullname">Name</label>
                        <input type="text" name="Fullname" class="form-control" id="Fullname" placeholder="FullName">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="TenTK">Tên tài khoản:</label>
                        <input type="text" class="form-control" name="TenTK" id="TenTK" required placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="MatKhau">Password</label>
                        <input type="password" class="form-control" name="MatKhau" id="MatKhau" placeholder="Password">  
                    </div>

                    <div class="form-group">
                        <label for="SDT">Số điện thoại:</label>
                        <input type="text" class="form-control" name="SDT" id="SDT" placeholder="SDT">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" name="GioiTinh" id="GioiTinh">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="LoaiTK">Loại tài khoản:</label>
                        <select name="LoaiTK" id="LoaiTK">
                        <option value="Admin">Admin</option>
                        <option value="Nhân viên">Nhân viên</option>
                        <option value="Người dùng">Người dùng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Dob">Ngày sinh:</label>
                        <input type="date" name="Dob" id="Dob">
                    </div>                    

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="DiaChi">Địa chỉ:</</label>
                        <input type="text" class="form-control" name="DiaChi" id="DiaChi" placeholder="Location">
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