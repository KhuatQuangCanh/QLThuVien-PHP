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
                        <th>Ngày nhận</th>
                        <th>Ngày hẹn trả</th>
                        <th>Thời gian trả</th>
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
                            @if(isset($item->MaBanSao))
                            {{$item->MaBanSao}}
                            @elseif(isset($item->PhieuMuon->MaBSKhiTra))
                            {{$item->PhieuMuon->MaBSKhiTra}}
                            @else
                            Chưa có
                            @endif
                        </td>

                        <td>{{ $item->ThoiGianMuon }}</td>
                        @if(isset($item->PhieuMuon) && $item->PhieuMuon->NgayTra && $item->PhieuMuon->NgayHenTra)
                        <td>{{$item->PhieuMuon->NgayMuon}}</td>
                        <td>{{$item->PhieuMuon->NgayHenTra}}</td>
                        @else
                        <td>Chưa có</td>
                        <td>Chưa có</td>
                        @endif
                        <td>
                        @if(isset($item->PhieuMuon) && $item->PhieuMuon->NgayTra)
                        {{$item->PhieuMuon->NgayTra}}
                        @else
                        Chưa có
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>

</div>

@endsection