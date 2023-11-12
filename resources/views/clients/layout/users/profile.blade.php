@extends('clients.index')
@section('body')

@if(!empty($info))

<section>

    <div class="container" style="background-color: #EDEBE4; border: 1px solid #EDEBE4;">
        @if (Session::has('success-upload'))
        <div class="alert alert-success">
            {{Session::get('success-uploads')}}
        </div>
        @endif
        @if (Session::has('msg-order-succ'))
        <div class="alert alert-success">
            {{Session::get('msg-order-succ')}}
        </div>
        @endif
        <div class=" row" style=" margin: 20px 5px 30px 10px;background-color: #F3F2EC;border: 1px solid #EDEBE4;">
            <div style="margin: 10px;">
                <div class="col-4 col-lg-4 col-sm-4">
                    <div class=" card mb-4">
                        <div class="card-body text-center" style="margin-top: 20px;">
                            @if($info[0]->AnhDaiDien)
                            <img src="{{ asset('storage/avatars/' . $info[0]->AnhDaiDien) }}" alt="avatar" class="img-thumbnail img-fluid" style="width: 150px; height: 180px;">
                            @else
                            <img src="{{ asset('storage/avatars/avatar-trang.jpg') }}" alt="avatar" class="img-thumbnail img-fluid" style="width: 150px; height: 180px;">
                            @endif
                            <h3 class="my-3">{{ $info[0]->TenTK }}</h3>
                            <h2 class="text-muted">{{ $info[0]->Fullname }}</h2>

                            <a id="button-changepass" class="btn btn-outline-primary" style="width: 200px;border-radius: 5px; height: 41.5px;  margin-bottom: 15px;" >Change Password</a>
                            @include('clients.layout.users.changepassword')
                            <script>
                                const button_change = document.getElementById('button-changepass');
                                const form_change = document.getElementById('form-changepass-click');
                                const form_change_one = document.getElementById('form-change-one-click');

                                button_change.addEventListener('click', function() {
                                    if (form_change.style.display === 'flex') {
                                        form_change.style.display = 'none';
                                    } else {
                                        form_change.style.display = 'flex';
                                    }
                                });
                                form_change_one.addEventListener('click', function(event) {
                                    if (event.target === form_change_one) {
                                        form_change.style.display = 'none';
                                    }
                                });
                            </script>
                            <a href="{{route('clients.user.edit-profile',$info[0]->MaTK)}}" class="btn btn-outline-primary" style="width: 150px; margin-left: 20px;border-radius: 5px; margin-bottom: 15px;">Edit
                                Profile</a>
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

                                        </div>


                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->Email}}" style="width: 100%;" disabled>
                                        </div>
                                    </div>
                                    <div class="row custom-div">
                                        <div class="col-sm-3">
                                            <label>Sex</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$info[0]->GioiTinh}}" style="width: 100%;" disabled>
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
            <div class="row" style="background-color: #F3F2EC;margin: 20px 5px 30px 10px;">
                <div class="col-lg-12">
                    <h2>Danh sách mượn</h2>
                </div>
                <div class="col-lg-12">
                    <table class="table rounded" style="width: 100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã đơn</th>
                                <th scope="col">Thời gian đăng kí</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Tên tập</th>
                                <th scope="col">Tình trạng đơn</th>
                                <th scope="col">Thời gian mượn</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($dondat as $key => $item)
                            <tr>
                                <td>{{$item->MaDonDat}}</td>
                                <td>{{$item->ThoiGianTao}}</td>
                                <td>{{$item->TenSach}}</td>
                                @if(isset($item->TenTap))
                                <td>{{$item->TenTap}}</td>
                                @else
                                <td>Không có</td>
                                @endif
                                <td>{{$item->TrangThaiDonDat}}</td>
                                <td>@if($item->ThoiGianMuon){{$item->ThoiGianMuon}} Ngày @else Chưa có @endif</td>
                            </tr>
                            @endforeach
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endif


@endsection