@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Chi tiết đơn đặt</h1>
            <!-- <button type="button" class="btn btn-success btn-fw"><i class="bi bi-plus-square-fill"></i> Thêm
                mới</button> -->
                @if(isset($item))
                    <ul>
                        <li>Tên khách hàng: {{$item->Fullname}}</li>
                        <li>Số điện thoại: {{$item->SDT}}</li>
                        <li>Email: {{$item->Email}}</li>
                        <li>Trạng thái đơn đặt: {{$item->TrangThaiDonDat}}</li>
                    </ul>
                @endif
                </div>
                <div class="card-body">
                @if (!empty($list))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sách</th>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Tập</th>
                            <th>Mã bản sao sách</th>
                            <th>Giá Sách</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->MaSach }}</td>
                                <td>{{ $item->TenSach }}</td>
                                <td>{{ $item->TacGia }}</td>
                                <td>
                                    @if (!empty($item->TenTap))
                                        {{ $item->TenTap }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td>
                                    <select name="ma_ban_sao_sach[]" class="btn-md">
                                        <option value="">Chọn Mã Bản Sao Sách</option>
                                        @foreach ($listBanSaoSach as $MaBanSaoSach)
                                            <option value="{{ $MaBanSaoSach->MaBanSaoSach }}">{{ $MaBanSaoSach->MaBanSaoSach }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{ $item->GiaSach }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            </div>

    </div>

</div>

@endsection