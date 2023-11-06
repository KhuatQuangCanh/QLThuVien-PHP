@extends('clients.index')
@section('body')

@if(!empty($info))

<section>
    @if (Session::has('success-upload'))
    <div class="alert alert-success">
        {{Session('success-uploads')}}
    </div>
    @endif
    <div class="container" style="background-color: #EDEBE4; border: 1px solid #EDEBE4;">
        <div class=" row" style=" margin: 20px 5px 30px 10px;background-color: #F3F2EC;border: 1px solid #EDEBE4;">
            <div style="margin: 10px;">
                <div class="col-4 col-lg-4 col-sm-4">
                    <div class=" card mb-4">
                        <div class="card-body text-center" style="margin-top: 20px;">
                            <img src="{{ asset('storage/avatars/' . $info[0]->AnhDaiDien) }}" alt="avatar" class="img-thumbnail img-fluid" style="width: 150px; height: 180px;">

                            <h3 class="my-3">{{ $info[0]->TenTK }}</h3>
                            <h2 class="text-muted">{{ $info[0]->Fullname }}</h2>
                            <!-- <form action="{{ route('clients.user.upload-avatar') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="avatar">
                                <button type="submit" class="btn-sm btn-outline-primary">Đổi ảnh đại diện</button>
                            </form> -->
                            <a href="#" class="btn btn-outline-primary">Đổi mật khẩu</a>
                            <a href="{{route('clients.user.edit-profile',$info[0]->MaTK)}}" class="btn btn-outline-primary">Edit Profile</a>
                        </div>

                    </div>
                </div>
                <div class="col-8 col-lg-8 col-sm-8" style="background-color: #EDEBE4; margin-bottom: 20px; ">
                    <div style="margin-left: 20px;">
                        <div class="col-6 col-lg-6 col-sm-6">
                            <div class="card" style="margin: 10px 20px 10px 0px;">
                                <div class="card-body">
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>User Name</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->TenTK}}" style="width: 100%;" disabled>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" value="{{$info[0]->MatKhau}}" style="width: 100%;" disabled>
                                            <!-- <i class="bi bi-eye-slash" style="margin-left: -40px;" id="showPassword"
                                                onclick="togglePasswordVisibility()"></i> -->
                                        </div>
                                        <!-- <script>
                                        function togglePasswordVisibility() {
                                            var passwordField = document.getElementById("passwordField");
                                            var showPasswordIcon = document.getElementById("showPassword");

                                            if (passwordField.type === "password") {
                                                passwordField.type = "text";
                                                showPasswordIcon.classList.remove("bi-eye-slash");
                                                showPasswordIcon.classList.add("bi-eye");

                                            } else {
                                                passwordField.type = "password";
                                                showPasswordIcon.classList.remove("bi-eye");
                                                showPasswordIcon.classList.add("bi-eye-slash");
                                            }
                                        }
                                        </script> -->

                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->Email}}" style="width: 100%;" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-sm-6">
                            <div class="card" style="margin: 10px 20px 10px 0px;">
                                <div class="card-body">
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->Fullname}}" style="width: 100%;" disabled>

                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->DiaChi}}" style="width: 100%;" disabled>

                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Phone number</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->SDT}}" style="width: 100%;" disabled>

                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Date of birthday</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->Dob}}" style="width: 100%;" disabled>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row" style="background-color: #F3F2EC;margin: 20px 5px 30px 10px;">
            <div class="col-lg-12">
                <table class="table rounded" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ngày mượn</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Ngày trả</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        <tr>
                            <td>1/1/2023</td>
                            <td>Sách 1</td>
                            <td>Đang mượn</td>
                            <td>1/15/2023</td>
                        </tr>
                        <tr>
                            <td>1/5/2023</td>
                            <td>Sách 2</td>
                            <td>Đang mượn</td>
                            <td>1/20/2023</td>
                        </tr>
                        <tr>
                            <td>1/10/2023</td>
                            <td>Sách 3</td>
                            <td>Đã trả</td>
                            <td>1/20/2023</td>
                        </tr>
                        <tr>
                            <td>10/10/2023</td>
                            <td>Sách 4</td>
                            <td>Đã trả</td>
                            <td>10/20/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- <script>
// function togglePasswordVisibility() {
//     var passwordInput = document.querySelector('.form-control');
//     var passwordToggle = document.getElementById('password-toggle');
//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         passwordToggle.classList.remove('fa-eye-slash');
//         passwordToggle.classList.add('fa-eye');
//     } else {
//         passwordInput.type = 'password';
//         passwordToggle.classList.remove('fa-eye');
//         passwordToggle.classList.add('fa-eye-slash');
//     }
// }
// </script> -->
<!-- <script>
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var form = e.target;
        var formData = new FormData(form);

        fetch('/api/UploadImageApi/uploadUser', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Xử lý dữ liệu trả về từ server
                var imageUrl = data.imageUrl;
                // ...
                // Sau khi tải ảnh xong, load lại form
                location.reload();

            })
            .catch(error => console.error(error));
    });
</script> -->


@endsection