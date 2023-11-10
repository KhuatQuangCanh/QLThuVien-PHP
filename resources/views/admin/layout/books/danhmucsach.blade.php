@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        
        <div class="card-body">
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Tên sách</th>
                        <th>Tên tập</th>
                        <th>Nội dung</th>
                        <th>Số lượng bản sao</th>
                        <th>Giá sách</th>
                        <th>Số trang</th>
                        <th>Thể loại</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($list))
                    @foreach($list as $key => $item)
                    <tr>
                        <td>{{$item->TenSach}}</td>
                        <td>{{$item->TenTap}}</td>
                        <td style="text-align: left;">{{$item->NoiDung}}</td>
                        <td >{{$item->SoLuong}}</td>
                        <td>{{$item->GiaSach}} $</td>
                        <td>{{$item->SoTrang}}</td>
                        <td>{{$item->MaTL}}</td>
                        <td>
                            <button type="button" class="btn-sm btn-primary btn-fw">Thêm tập</button>
                            <button type="button" class="btn-sm btn-info btn-fw">Sửa</button>
                            <button type="button" class="btn-sm btn-danger btn-fw">Xóa</button>

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