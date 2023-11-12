@extends('clients.index')

@section('body')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="colored ">
                    <h7 class="page-title"><p>Kết quả tìm kiếm sách: {{$tenSach}}</p></h7>
                </div>
            </div>
        </div>
    </div>
</div>
<!--site-banner-->

<section id="popular-books" class="bookshelf">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Thêm thẻ script cho jQuery -->
                <div class="tab-content">
                    <div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @if(!empty($list_books))
                            @foreach($list_books as $key => $book)
                            <div class="col-3 col-lg-3 col-md-3 col-sm-3">
                                <!-- Hiển thị thông tin sách -->
                                <figure class="product-style">
                                    @if(isset($book->AnhTap))
                                    <img src="{{asset('storage/books/'.$book->AnhTap)}}" alt="Books" class="product-item" width="150px" height="100px">
                                    @else
                                    <img src="{{asset('storage/books/'.$book->AnhSach)}}" alt="Books" class="product-item" width="150px" height="100px">
                                    @endif
                                    <button type="button" class="add-to-cart" data-product-id="{{ $book->MaSach }}" data-product-name="{{ $book->TenSach }}" @if($book->existsEpisode == 1)
                                        @if(isset($book->MaTap)==true)
                                        data-product-idtap="{{ $book->MaTap }}"
                                        @endif
                                        @if(isset($book->TenTap)==true)
                                        data-product-tap="{{ $book->TenTap }}"
                                        @endif
                                        @endif
                                        >Add to cart</button>
                                    <figcaption>
                                        <h3>{{$book->TenSach}} @if($book->existsEpisode == 1 && isset($book->TenTap)==true) {{$book->TenTap}} @endif</h3>
                                        <p>{{$book->TacGia}}</p>
                                        <div class="item-price">$ {{$book->GiaSach}}</div>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                            @endif
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                        </div>
                        <script>
                            axios.defaults.headers.common['X-XSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            const baseUrl = '{{url(' / ')}}';
                            document.addEventListener('DOMContentLoaded', function() {
                                document.addEventListener('click', function(event) {
                                    if (event.target.classList.contains('add-to-cart')) {
                                        const productId = event.target.getAttribute('data-product-id');
                                        const productName = event.target.getAttribute('data-product-name');
                                        const productIdtap = event.target.getAttribute('data-product-idtap');
                                        const productTap = event.target.getAttribute('data-product-tap');

                                        // Send Ajax request to add the product to the cart
                                        axios.post(baseUrl + '/book/add-to-cart', {
                                                product_id: productId,
                                                product_name: productName,
                                                product_idtap: productIdtap,
                                                product_tap: productTap,
                                            })
                                            .then(function(response) {
                                                alert(response.data.message);
                                            })
                                            .catch(function(error) {
                                                alert(error.message);
                                                console.error('Error adding to cart:', error.message);
                                            });
                                    }
                                });
                            });
                        </script>

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
            <!--inner-tabs-->

        </div>
    </div>

</section>
@endsection