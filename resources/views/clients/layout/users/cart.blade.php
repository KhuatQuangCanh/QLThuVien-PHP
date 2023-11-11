@extends('clients.index')

@section('body')

<section>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-sm-12" style="border: 1px solid rgb(228, 190, 201);">
                <div class="cart-table clearfix">
                    <!-- <form action="{{route('clients.books.xac-nhan-dat')}}" method="post"> -->
                        @if(Session::get('msg-suc-cart'))
                        <div class="alert alert-primary">
                            {{Session::get('msg-suc-cart')}}
                        </div>
                        @endif
                        <table class="table table-responsive" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Anh</th>
                                    <th>Tên sách</th>
                                    <th>Tập</th>
                                    <th>Nội dung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($list_book) || $list_book == [])
                                <tr>
                                    <td>Bạn chưa chọn sách nào !</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @else
                                @foreach($list_book as $key => $book)
                                @foreach($book as $key1 => $item)
                                <tr>

                                    <td class="cart_product_img" for="check_1" style="text-align: center;">
                                        @if(isset($item->AnhTap))
                                        <a><img src="{{asset('storage/books/'.$item->AnhTap)}}" alt="Product" width="80px" height="90px"></a>
                                        @else
                                        <a><img src="{{asset('storage/books/'.$item->AnhSach)}}" alt="Product" width="80px" height="90px"></a>
                                        @endif
                                    </td>
                                    <td>
                                        <h5>{{$item->TenSach}}</h5>
                                    </td>
                                    <td class="cart_product_desc">
                                        <span>
                                            @if(isset($item->TenTap))
                                            {{$item->TenTap}}
                                            @else
                                            Không có
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        {{ Str::limit($item->NoiDung, $limit = 68, $end = '...') }}
                                    </td>

                                    <td>
                                        <form action="{{route('clients.books.delete-from-cart')}}" method="post">
                                            @csrf

                                            <input type="text" hidden value="{{$item->MaSach}}" name="idSach">
                                            <input type="text" hidden value="{{$item->TenSach}}" name="tenSach">
                                            @if(isset($item->MaTap) && isset($item->TenTap))
                                            <input type="text" hidden value="{{$item->MaTap}}" name="idTap">
                                            <input type="text" hidden value="{{$item->TenTap}}" name="tenTap">
                                            @endif
                                            <button onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" type="submit" class="btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div>
                            <button type="submit" class="btn-sm btn-secondary" @if(empty($list_book) || $list_book==[]) hidden @endif>Xác nhận đặt</button>
                        </div>

                    <!-- </form> -->
                </div>
            </div>
        </div>

    </div>
</section>

@endsection