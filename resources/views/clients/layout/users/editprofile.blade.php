@extends('clients.index')
@section('body')
@if(!Empty($profile))
<section>
    <form action="{{route('clients.user.post-edit-profile',$profile[0]->MaTK )}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container" style="background-color: #EDEBE4;">
            <div class="row d-flex" style="margin: 40px;">
                <div class="col-lg-4" style="margin-top: 40px;  background-color: #F3F2EC;">
                    <center>
                        <div class="form-group" style=" margin-top: 20px; margin-bottom: 20px; ">
                            <label>Ảnh đại diện</label>
                            @if($profile[0]->AnhDaiDien)
                            <img id="previewImage" src="{{ asset('storage/avatars/' . $profile[0]->AnhDaiDien) }}" alt="Ảnh xem trước" style=" width: 250px;height: 281px;">
                            @else
                            <img src="{{ asset('storage/avatars/avatar-trang.jpg') }}" alt="avatar" class="img-thumbnail img-fluid" style=" width: 250px;height: 281px;">
                            @endif
                            <!-- <img id="previewImage" src="{{ asset('storage/avatars/' . $profile[0]->AnhDaiDien) }}"
                                alt="Ảnh xem trước" style=" width: 250px;height: 281px;"> -->
                            <input type="file" name="AnhDaiDien" id="previewImageInput">
                        </div>
                    </center>
                </div>
                <div class="col-lg-4" style=" margin-top: 40px;">
                    <div class="card" style="margin-top: 20px; margin-bottom: 20px; ">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" value="{{ $profile[0]->Fullname }}" name="Fullname" placeholder="Họ và tên ..." style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Giới tính</label>
                                <select class="form-control" name="GioiTinh" style="width: 100%">
                                    <option value="" @if($profile[0]->GioiTinh == NULL) selected @endif>--:--</option>
                                    <option value="Nam" @if($profile[0]->GioiTinh == 'Nam') selected @endif>Nam</option>
                                    <option value="Nữ" @if($profile[0]->GioiTinh == 'Nữ') selected @endif>Nữ</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $profile[0]->SDT }}" name="SDT" placeholder="Số điện thoại ..." style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" value="{{ $profile[0]->Dob }}" name="Dob" placeholder="Ngày sinh ..," style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style=" margin-top: 40px;">
                    <div class="card" style="margin-top: 20px; margin-bottom: 20px; ">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input type="text" class="form-control" value="{{ $profile[0]->TenTK }}" name="TenTK" placeholder="Tài khoản ..." style="width: 100%;" disabled>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" value="{{ $profile[0]->MatKhau }}" placeholder="Mật khẩu ..." style="width: 100%;" disabled>
                            </div <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $profile[0]->Email }}" name="Email" placeholder="Email ..." style="width: 100%;">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{ $profile[0]->DiaChi }}" name="DiaChi" placeholder="Địa chỉ ..," style="width: 100%;">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 40px; margin-bottom: 40px;">
                <div class="col-12">
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn sửa thông tin không?')" class="btn-sm btn-submit" style="width: 150px;border-radius: 5px; font-size: 1rem; height: 41.5px;">Submit</button>
                    <a href="{{route('clients.user.profile',$profile[0]->MaTK )}}" class="btn btn-danger" style="width: 150px; margin-left: 20px;border-radius: 5px; margin-bottom: 15px;">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    <script>
        const previewImageInput = document.getElementById('previewImageInput');
        const previewImage = document.getElementById('previewImage');

        previewImageInput.addEventListener('change', function() {
            if (previewImageInput.files && previewImageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(previewImageInput.files[0]);
            } else {
                previewImage.src = '#';
                previewImage.style.display = 'none';
            }
        });
    </script>

</section>

@endif
@endsection