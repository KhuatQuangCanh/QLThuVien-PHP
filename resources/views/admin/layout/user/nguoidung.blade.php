@extends('admin.index')

@section('body')
<!-- On tables -->
<h3>Danh sách người dùng</h3>
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        @if(Session::has('msg'))
        <div class="alert alert-primary">
            {{Session::get('msg')}}
        </div>
        @endif
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
                        <th>IsLocked</th>
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
                        <td style="text-align: center;">{{$item->isLockAccount}}</td>
                        <td>
                            @if($item->isLockAccount == 1)
                            <a onclick="return confirm('Bạn chắc chắn muốn mở khóa cho tài khoản này?')" href="{{route('admin.nguoidung.un-lock-account',['idAccount'=>$item->MaTK])}}" type="button" class="btn-sm btn-success btn-fw" style="text-decoration: none;">Mở khóa tài khoản</a>
                            @endif
                            <a @if($item->isLockAccount == 1) style="display: none;" @endif style="text-decoration: none;" onclick="return confirm('Bạn chắc chắn muốn khóa tài khoản này?')" href="{{route('admin.nguoidung.lock-account',['idAccount'=>$item->MaTK])}}" type="button" class="btn-sm btn-danger btn-fw">Khóa tài khoản</a>
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