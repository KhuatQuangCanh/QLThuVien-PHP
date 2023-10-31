@extends('clients.index')
@section('body')

<section>
    <div class="container" style="background-color: #EDEBE4; border: 1px solid #EDEBE4;">
        <div class=" row" style=" margin: 20px 5px 30px 10px;background-color: #F3F2EC;border: 1px solid #EDEBE4;">
            <div style="margin: 10px;">
                <div class="col-4 col-lg-4 col-sm-4">
                    <div class=" card mb-4">
                        <div class="card-body text-center" style="margin-top: 20px;">
                            <img src="{{asset('assets/images/users/Max-R_Headshot.jpg')}}" alt="avatar" class="img-thumbnail img-fluid" style="width: 200px;">
                            <h5 class="my-3">username</h5>
                            <p class="text-muted">FULL NAME</p>
                            <a class="btn btn-outline-primary">Đổi ảnh đại diện</a>
                            <a class="btn btn-outline-primary">Đổi mật khẩu</a>
                            <br>
                            <a class="btn btn-outline-primary">Edit Profile</a>
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
                                            <p class="text-muted">@@User name</p>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted">@@Password</p>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted">@@Email</p>
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
                                            <p class="text-muted">@@Full name</p>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted">@@Address</p>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Phone number</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted">@@Phone number</p>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Date of birthday</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted">@@Date of birthday</p>
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