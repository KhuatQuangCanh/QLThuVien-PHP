@extends('clients.index')

@section('body')

<section>
    <div class="container" style="border: 1px solid red;">
        <div class="row">
            <div class="col-12 col-lg-12 col-sm-12 text-center mx-auto" style="border: 1px solid blue;">
                <h2>Giỏ sách</h2>
            </div>
            <div class="col-12 col-lg-12 col-sm-12" style="border: 1px solid green;">
                <div class="cart-table clearfix">
                    <table class="table table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Tất cả<input type="checkbox"></th>
                                <th>Tên sách</th>
                                <th>Tình trạng</th>
                                <th>Thời gian mượn</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 5%;">
                                    <span><input type="checkbox" id="check_1"></span>
                                </td>
                                <td class="cart_product_img" for="check_1">
                                    <a><img src="{{asset('assets/images/users/lamdi.jpg')}}" alt="Product" width="80px" height="90px"></a>
                                    <h5>@@TenSach</h5>
                                </td>
                                <td class="cart_product_desc">
                                    <span>@@Tình trạng</span>
                                </td>
                                <td class="price">
                                    <div class="qty-btn">
                                        <div class="quantity" style="display: inline-flex;">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                            <p>Ngày</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection