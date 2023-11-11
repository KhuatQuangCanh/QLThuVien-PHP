@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Danh sách đang mượn</h1>
            <!-- <button type="button" class="btn btn-success btn-fw"><i class="bi bi-plus-square-fill"></i> Thêm
                mới</button> -->

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Thay</th>
                        <th>Thế</th>
                        <th>Các</th>
                        <th>Trường</th>
                        <th>Vào</th>
                        <th>Chỗ</th>
                        <th>Này</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Đổáaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td>Dữ</td>
                        <td>Liệu</td>
                        <td>Nhớ</td>
                        <td>Làmqqqqqqqqqqqqqqqqqqqqqq</td>
                        <td>Đẹp</td>
                        <td>Ok!</td>
                        <td>
                            <button type="button" class="btn-sm btn-info btn-fw">Sửa</button>
                            <button type="button" class="btn-sm btn-danger btn-fw">Xóa</button>

                        </td>
                    </tr>
                    <tr>
                        <td>Đổ</td>
                        <td>Dữ</td>
                        <td>Liệu</td>
                        <td>Nhớ</td>
                        <td>Làm</td>
                        <td>Đẹp</td>
                        <td>Ok!</td>
                        <td>
                            <button type="button" class="btn-sm btn-info btn-fw">Sửa</button>
                            <button type="button" class="btn-sm btn-danger btn-fw">Xóa</button>

                        </td>
                    </tr>
                    <tr>
                        <td>Đổ</td>
                        <td>Dữ</td>
                        <td>Liệu</td>
                        <td>Nhớ</td>
                        <td>Làm</td>
                        <td>Đẹp</td>
                        <td>Ok!</td>
                        <td>
                            <button type="button" class="btn-sm btn-info btn-fw">Sửa</button>
                            <button type="button" class="btn-sm btn-danger btn-fw">Xóa</button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" style="margin-top: 50px;">
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
            </nav>
        </div>

    </div>

</div>

@endsection