@extends('admin.index')

@section('body')
<!-- On tables -->
<div class="col-lg-6 grid-margin stretch-card" style="width: 100%;">
    <div class="card">
        <div class="card-body">
            <h1>Title ở đây</h1>
            <button type="button" class="btn btn-success btn-fw"><i class="bi bi-plus-square-fill"></i> Thêm
                mới</button>

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
        </div>
    </div>
</div>
@endsection