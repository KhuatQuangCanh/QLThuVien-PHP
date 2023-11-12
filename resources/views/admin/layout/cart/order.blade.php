@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Danh sách đơn đặt</h1>
            <button type="button" class="btn btn-success btn-fw"><i class="bi bi-plus-square-fill"></i> Thêm
                mới</button>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian tạo</th>
                        <th>Trạng thái đơn đặt</th>
                       
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($list))
                @foreach($list as $key => $item)
                    <tr>
                        <td>{{$item->Fullname}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{$item->ThoiGianTao}}</td>
                        <td>
                        <form action="{{ route('admin.order.update-status', ['orderId' => $item->MaDonDat]) }}" method="POST" class="btn-md">
                            @csrf
                            <select name="trangthai" class="btn-md">
                                <option value="Chờ xác nhận" @if($item->TrangThaiDonDat == 'Chờ xác nhận') selected @endif>Chờ xác nhận</option>
                                <option value="Đã chuẩn bị sách" @if($item->TrangThaiDonDat == 'Đã chuẩn bị sách') selected @endif>Đã chuẩn bị sách</option>
                                <option value="Đang mượn" @if($item->TrangThaiDonDat == 'Đang mượn') selected @endif>Đang mượn</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                        </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.get-View-OrderDetail', ['orderId' => $item->MaDonDat]) }}" class="btn-sm btn-info btn-fw">xem</a>
                        </td>
                    </tr>
                @endforeach
                @endif
                    
                </tbody>
            </table>
            <div class="pagination">
                            <ul>
                                @if ($list->onFirstPage())
                                <li class="disabled">&laquo; Previous</li>
                                @else
                                <li><a href="{{ $list->previousPageUrl() }}">&laquo; Previous</a></li>
                                @endif

                                @foreach (range(1, $list->lastPage()) as $page)
                                @if ($page == $list->currentPage())
                                <li class="active">{{ $page }}</li>
                                @else
                                <li><a href="{{ $list->url($page) }}">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                @if ($list->hasMorePages())
                                <li><a href="{{ $list->nextPageUrl() }}">Next &raquo;</a></li>
                                @else
                                <li class="disabled">Next &raquo;</li>
                                @endif
                            </ul>
                        </div>
        </div>

    </div>

</div>
<script>
    function confirmDelete(formId) {
        if (confirm("Bạn có chắc chắn muốn xóa đơn đặt này không?")) {
            document.getElementById(formId).submit();
        }
    }
</script>

@endsection