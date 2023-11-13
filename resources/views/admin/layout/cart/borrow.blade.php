@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Danh sách phiếu mượn</h1>
            @if(Session::has('msg-order'))
            <div class="alert alert-warning">
                {{Session::get('msg-order')}}
            </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã phiếu</th>
                        <th>Mã đơn đặt</th>
                        <th>Mã tài khoản</th>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian tạo</th>
                        <th>Trạng thái phiếu mượn</th>

                    </tr>
                </thead>
                <tbody>
                    @if(!empty($list))
                    @foreach($list as $key => $item)
                    <tr>
                        <td>{{$item->MaPhieu}}</td>
                        <td>{{$item->MaDonDat}}</td>
                        <td>{{$item->MaTK}}</td>
                        <td>{{$item->Fullname}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{$item->ThoiGianTao}}</td>
                        <td>
                            <form class="btn-md">
                                @csrf
                                <select name="trangthai" class="btn-md" @if($item->TrangThai == 'Đang mượn') disabled @endif>
                                    <option value="Chờ xác nhận" @if($item->TrangThai == 'Đang mượn') selected @endif>Đang mượn</option>
                                    <option value="Đã chuẩn bị sách" @if($item->TrangThai == 'Đã trả') selected @endif>Đã trả</option>
                                </select>
                                
                                <button type="submit" class="btn btn-primary btn-sm" @if($item->TrangThai == 'Đã trả') disabled @endif>Cập nhật</button>
                            </form>
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

@endsection