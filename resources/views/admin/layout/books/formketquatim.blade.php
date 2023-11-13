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
            <div class="card-title">
                <h2>Kết quả tìm kiếm cho:<h3>{{$tenSach}}</h3>
                </h2>
            </div>
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
                        <td>{{$item->TenSach}}</td>
                        <td>{{$item->TacGia}}</td>
                        <td>
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
                        <td>{{$item->TenTL}}</td>
                        <td>
                            @if($item->existsEpisode == 1)
                            <a href="{{route('admin.danhmucsach.get-form-nhap-tap',['idSach'=>$item->MaSach])}}" type="button" class="btn-sm btn-primary btn-fw">Thêm tập</a>

                            @endif
                            <a href="{{route('admin.danhmucsach.get-edit-sach',['id'=>$item->MaSach])}}" type="button" class="btn-sm btn-info btn-fw">Sửa</a>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa sách này?')" href="{{route('admin.danhmucsach.post-xoa-sach',['id'=>$item->MaSach])}}" type="button" class="btn-sm btn-danger btn-fw">Xóa</a>
                        </td>
                    </tr>
                    @if($item->existsEpisode == 1 && isset($item->Sotap))
                    @for($i = 1; $i <= $item->Sotap; $i++)
                        @php
                        $a = 'Tap' . $i;
                        @endphp
                        <tr>
                            <td></td>
                            <td>{{$item->$a['TenTap']}}</td>
                            <td>{{ Str::limit($item->$a['NoiDungTap'], $limit = 68, $end = '...') }}</td>
                            <td>{{$item->$a['SoLuongBS']}}</td>
                            <td></td>
                            <td>{{$item->$a['SoTrangTap']}}</td>
                            <td></td>
                            <td>
                                <a href="{{route('admin.danhmucsach.get-form-sua-tap',['idTap'=>$item->$a['MaTap']])}}" type="button" class="btn-sm btn-info btn-fw">Sửa</a>
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa sách này?')" href="{{route('admin.danhmucsach.post-xoa-tap',['id'=>$item->$a['MaTap']])}}" type="button" class="btn-sm btn-danger btn-fw">Xóa</a>
                            </td>
                        </tr>
                        @endfor
                        @endif
                        @endforeach
                        @endif
                </tbody>
            </table>
            <div class="pagination">
                <ul>
                    @if ($currentPage > 1)
                    <li><a href="?tensach={{ $tenSach }}&_token={{ $token }}&page={{ $currentPage - 1 }}">Previous</a></li>
                    @endif

                    @for ($i = 1; $i <= $lastPage; $i++) <li class="{{ $i == $currentPage ? 'active' : '' }}">
                        <a href="?tensach={{ $tenSach }}&_token={{ $token }}&page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor

                        @if ($currentPage < $lastPage) <li><a href="?tensach={{ $tenSach }}&_token={{ $token }}&page={{ $currentPage + 1 }}">Next</a></li>
                            @endif
                </ul>
            </div>

        </div>

    </div>

</div>

@endsection