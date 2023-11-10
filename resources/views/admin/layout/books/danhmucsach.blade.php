@extends('admin.index')

@section('body')
<!-- On tables -->

<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        @if(Session::get('msg-suc'))
        <div class="alert alert-secondary">
            {{Session::get('msg-suc')}}
        </div>
        @endif
        @if(Session::get('msg-err'))
        <div class="alert alert-warning">
            {{Session::get('msg-err')}}
        </div>
        @endif
        
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Nội dung</th>
                        <th>SL bản sao</th>
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
                        <td >{{$item->TenSach}}</td>
                        <td >{{$item->TacGia}}</td>
                        <td >
                            {{ Str::limit($item->NoiDung, $limit = 68, $end = '...') }}
                        </td>
                        <td>
                            @if($item->SoLuong)
                            {{$item->SoLuong}}

                            @else
                            NULL
                            @endif
                        </td>
                        <td>{{$item->GiaSach}} $</td>
                        <td>{{$item->SoTrang}}</td>
                        <td>{{$item->MaTL}}</td>
                        <td>
                            @if($item->SoLuong == NULL)
                            <a type="button" class="btn-sm btn-primary btn-fw">Thêm tập</a>

                            @endif
                            <a href="{{route('admin.danhmucsach.get-edit-sach',['id'=>$item->MaSach])}}" type="button" class="btn-sm btn-info btn-fw">Sửa</a>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa sách này?')" href="{{route('admin.danhmucsach.post-xoa-sach',['id'=>$item->MaSach])}}" type="button" class="btn-sm btn-danger btn-fw">Xóa</a>
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