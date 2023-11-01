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
                                <th>STT</th>
                                <th>Tên sách</th>
                                <th>Tình trạng</th>
                                <th>Thời gian mượn</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 5%;">
                                    <span>@@STT</span>
                                </td>
                                <td class="cart_product_img">
                                    <a href="#"><img src="{{asset('assets/images/users/lamdi.jpg')}}" alt="Product"
                                            width="80px" height="90px"></a>
                                    <h5>@@TenSach</h5>
                                </td>
                                <td class="cart_product_desc">
                                    <span>@@Tình trạng</span>
                                </td>
                                <td class="price">
                                    <div class="qty-btn">
                                        <div class="quantity" style="display: inline-flex;">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                                name="quantity" value="1">
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
            </div>'
            <div class="col-12 col-lg-12 col-sm-12">
                <div class="cart-summary">
                    <h5>Thông tin mượn sách</h5>
                    <ul class="summary-table">
                        <li><span>Người mượn</span> <span>Trần Xuân Tiến</span></li>
                        <li><span>Số lượng</span> <span>@Model.Count()</span></li>
                        <li><span>Ngày mượn</span>
                            <div id="current-time"></div>
                        </li>
                        <li>
                            <ul class="col-11" style="text-align: left;">

                                <li>@(i + 1)<span style="left: 0;">@item.TenSach</span>
                                    <div>@borrowDate.ToShortDateString()</div>
                                </li>

                            </ul>
                        </li>
                    </ul>
                    <div class="cart-btn mt-50 btn-center">
                        <a href="cart.html" class="btn amado-btn w-100 align-center">Checkout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection