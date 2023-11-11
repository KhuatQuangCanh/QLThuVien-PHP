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
                    @if(!empty($list))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sách</th>
                                    <th>Tên sách</th>
                                    <th>Tác giả</th>
                                    <th>Tập</th>
                                    <th>Giá Sách</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{$item->MaSach}}</td>
                                        <td>{{$item->TenSach}}</td>
                                        <td>{{$item->TacGia}}</td>
                                        <td>{{$item->TenTap}}</td>
                                        <td>{{$item->GiaSach}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

            
            <!-- <nav aria-label="Page navigation example" style="margin-top: 50px;">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav> -->
        </div>

    </div>

</div>

@endsection