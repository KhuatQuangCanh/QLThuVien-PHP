@extends('clients.index')

@section('body')

<section>
    <div class="container" style="border: 1px solid red;">
        <div class="row">
            <div class="col-12 col-lg-12 col-sm-12" style="border: 1px solid green;">
                <div class="cart-table clearfix">
                    <table class="table table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Tất cả<input type="checkbox"></th>
                                <th>Anh</th>
                                <th>Tên sách</th>
                                <th>Tập</th>
                                <th>Thời gian mượn</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($list_book))
                            <tr>
                                <td>Khoong co</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @else
                            @foreach($list_book as $key => $book)
                            @foreach($book as $key1 => $item)
                            <tr>
                                <td style="width: 5%;">
                                    <span><input type="checkbox" id="check_1"></span>
                                </td>
                                <td class="cart_product_img" for="check_1">
                                    <a><img src="{{asset('assets/images/users/lamdi.jpg')}}" alt="Product" width="80px"
                                            height="90px"></a>
                                    
                                </td>
                                <td><h5>{{$item->TenSach}}</h5></td>
                                <td class="cart_product_desc">
                                    <span>
                                        @if(isset($item->TenTap) == true)
                                            {{$item->TenTap}}
                                        @else
                                        Không có
                                        @endif
                                    </span>
                                </td>
                                <td class="price">
                                    <div class="qty-btn">
                                        <div class="quantity" style="display: inline-flex;">
                                            <input type="date" class="qty-text" id="qty" step="1" min="1" max="300"
                                                name="quantity" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection