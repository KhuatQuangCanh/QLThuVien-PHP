@extends('admin.index')

@section('body')
<!-- On tables -->
<h3>Danh sách người dùng</h3>
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã tài khoản</th>
                       <th>Tên tài khoản</th>
                        <th>Địa chỉ</th>
                        <th>SDT</th> 
                        <th>Họ và tên</th>
                       <th>Email</th>
                        <th>Ngày sinh</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($list))
                    @foreach($list as $key => $item)
                    <tr>
                        <td>{{$item->MaTK}}</td>
                       <td>{{$item->TenTK}}</td>                      
                        <td>{{$item->DiaChi}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{$item->Fullname}}</td>
                        <td>{{$item->Email}}</td>
                        <td>{{$item->Dob}}</td>
                        <td>
                               <button type="button" class="btn-sm btn-danger btn-fw">Khóa tài khoản</button>
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