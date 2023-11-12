@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Chi tiết đơn đặt</h1>
            <!-- <button type="button" class="btn btn-success btn-fw"><i class="bi bi-plus-square-fill"></i> Thêm
                mới</button> -->
            @if(isset($user))
            <ul style="list-style-type: none;">
                <li>Tên khách hàng: {{$user[0]->Fullname}}</li>
                <li>Số điện thoại: {{$user[0]->SDT}}</li>
                <li>Email: {{$user[0]->Email}}</li>
                <li>Trạng thái đơn đặt: {{$user[0]->TrangThaiDonDat}}</li>
                <li>Mã đơn đặt: {{$list[0]->MaDonDat}}</li>
            </ul>
            @endif
        </div>
        <div class="card-body">
            @if (!empty($list))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Sách</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Tập</th>
                        <th>Mã Tập</th>
                        <th>Mã bản sao sách</th>
                        <th>Thời gian mượn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $item)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $item->MaSach }}</td>
                        <td>{{ $item->TenSach }}</td>
                        <td>{{ $item->TacGia }}</td>
                        <td>
                            @if (!empty($item->TenTap))
                            {{ $item->TenTap }}
                            @else
                            Không có
                            @endif
                        </td>
                        <td>
                        @if (!empty($item->MaTap))
                            {{ $item->MaTap }}
                            @else
                            Không có
                            @endif
                        </td>
                        <td>
                            {{$item->MaBanSao}}
                        </td>
                        <td>{{ $item->ThoiGianMuon }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>

</div>

@endsection