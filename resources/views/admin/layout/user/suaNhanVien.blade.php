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
    <form class="forms-sample" action="{{route('admin.nhanvien.post-edit-nv',['id'=>$edit_taikhoan[0]->MaTK])}}" method="post" enctype="multipart/form-data">
        <div class="col-12 col-lg-12 col-sm-12" style="margin-top:-50px ;">
            <div class="row">
                <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName1">Mã tài khoản</label>
                                <input name="MaTK" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập mã tài khoản ..." value="{{$edit_taikhoan[0]->MaTK}}">
                                @error('MaTK')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tên tài khoản</label>
                                <input name="TenTK" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên tài khoản ..." value="{{$edit_taikhoan[0]->TenTK}}">
                                @error('TenTK')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">FullName</label>
                                <input name="Fullname" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập fullname ..." value="{{$edit_taikhoan[0]->Fullname}}">
                                @error('Fullname')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmai33">Mật khẩu</label>
                                <input name="MatKhau" class="form-control" id="exampleInputEmai33"  placeholder="Nhập mật khẩu ..." value="{{$edit_taikhoan[0]->MatKhau}}">
                                @error('MatKhau')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Địa chỉ</label>
                                <input name="DiaChi" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập địa chỉ ..." value="{{$edit_taikhoan[0]->DiaChi}}">
                                @error('DiaChi')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">PhoneNumber</label>
                                <input name="SDT" type="number" class="form-control" id="exampleInputPassword4" placeholder="Nhập số điện thoại ..." value="{{$edit_taikhoan[0]->SDT}}">
                                @error('SDT')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Email</label>
                                <input name="Email" type="email" class="form-control" id="exampleInputPassword4" placeholder="Nhập email ..." value="{{$edit_taikhoan[0]->Email}}">
                                @error('Email')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputCity1">Ngày sinh</label>
                                <input name="Dob" type="date" class="form-control" id="exampleInputCity1" placeholder="Location" value="{{$edit_taikhoan[0]->Dob}}">
                                @error('Dob')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Giới Tính</label>
                                <input name="GioiTinh" type="text" class="form-control" id="exampleInputCity1" placeholder="Location" value="{{$edit_taikhoan[0]->GioiTinh}}">
                                @error('GioiTinh')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="hasTap" name="nhanvienOption" onclick="toggleInput()" @if($edit_taikhoan[0]->existsEpisode == 0) checked @endif>
                                    <label class="form-check-label" for="hasTap">Nhân viên</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="noTap" name="adminOption" onclick="toggleInput()" @if($edit_taikhoan[0]->existsEpisode == 1) checked @endif>
                                    <label class="form-check-label" for="noTap">Admin</label>
                                </div>
                            </div>


                            <script>
                                function toggleInput() {
                                    var inputElement = document.getElementById('exampleInputCypher1');
                                    var hasTapRadio = document.getElementById('hasTap');
                                    var noTapRadio = document.getElementById('noTap');

                                    if (hasTapRadio.checked) {
                                        inputElement.disabled = false;
                                    } else if (noTapRadio.checked) {
                                        inputElement.disabled = true;
                                        inputElement.value = '';
                                    }
                                }
                            </script>


                            <button onclick="return confirm('Bạn chắc chắn sửa thông tin nhân viên, admin không?')" type="submit" class="btn btn-gradient-primary me-2">Cập nhật</button>
                            <a href="{{route('admin.nhanvien.index')}}" class="btn btn-light">Cancel</a>

                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="AnhSach" class="file-upload-default" id="upload-input">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Ảnh đại diện ...">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Tải ảnh</button>
                                    </span>
                                </div>
                                @error('AnhDaiDien')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Image preview container -->
                            <div id="image-preview-container">
                                <img id="image-preview" src="{{ asset('storage/user/' . $edit_taikhoan[0]->AnhDaiDien) }}" alt="Image Preview" style="max-width: 100%; max-height: 400px;">
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // Handle file input change event
                                    $('#upload-input').change(function() {
                                        // Get the selected file
                                        var file = this.files[0];

                                        if (file) {
                                            // Create a FileReader
                                            var reader = new FileReader();

                                            // Set a callback function to update the image preview when the file is loaded
                                            reader.onload = function(e) {
                                                $('#image-preview').attr('src', e.target.result).show();
                                            };

                                            // Read the file as a data URL
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                });
                            </script>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        @csrf
    </form>

</div>

@endsection