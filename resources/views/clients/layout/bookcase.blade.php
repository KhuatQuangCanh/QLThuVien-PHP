@extends('clients.index')

@section('body')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="colored " style="text-align: center;">
                    <h1 class="page-title">Book Case</h1>
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

                <ul class="tabs">
                    @if(!empty($list_TL))
                    <a href="{{ route('clients.books.getBooksByGenreForBookCase', 'all') }}" style="text-decoration-line: none;">
                        <li class="tab" data-tab-target="all-genre">All Genre</li>
                    </a>
                    @foreach($list_TL as $key => $theloai)
                    <a href="{{ route('clients.books.getBooksByGenreForBookCase',$theloai->TenTL) }}" style="text-decoration-line: none;">
                        <li class="tab">{{ $theloai->TenTL }}</li>
                    </a>
                    @endforeach
                    @endif
                </ul>
                <!-- Thêm thẻ script cho jQuery -->

                <div class="tab-content">
                    <div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @if(!empty($list_books))
                            @foreach($list_books as $key => $book)
                            <div class="col-3 col-lg-3 col-md-3 col-sm-3">
                                <!-- Hiển thị thông tin sách -->
                                <figure class="product-style" >
                                    @if(isset($book->existsEpisode) &&  $book->existsEpisode== 0)
                                    <img src="{{asset('storage/books/'.$book->AnhSach)}}" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-id="{{ $book->MaSach }}" data-product-name="{{ $book->TenSach }}"
                                        >Add to cart</button>
                                    <figcaption>
                                        <h3><a href="{{route('clients.books.chi-tiet-1',['ten'=>$book->TenSach])}}">{{$book->TenSach}}</a></h3>
                                        <p>{{$book->TacGia}}</p>
                                        <div class="item-price">$ {{$book->GiaSach}}</div>
                                    </figcaption>
                                    @else 
                                    <img src="{{asset('storage/books/'.$book->AnhTap)}}" alt="Books" class="product-item" >
                                    <button type="button" class="add-to-cart" data-product-id="{{ $book->MaSach }}" data-product-name="{{ $book->TenSach }}"
                                        @if($book->existsEpisode == 1)
                                        @if(isset($book->MaTap)==true)
                                        data-product-idtap="{{ $book->MaTap }}"
                                        @endif
                                        @if(isset($book->TenTap)==true)
                                        data-product-tap="{{ $book->TenTap}}"
                                        @endif
                                        @endif
                                        >Add to cart</button>
                                    <figcaption>
                                        <h3>
                                            @if($book->existsEpisode == 1 && isset($book->TenTap)==true)
                                            <a href="{{route('clients.books.chi-tiet-2',['ten'=>$book->TenSach,'tap'=>$book->TenTap])}}">
                                            {{$book->TenSach}} {{$book->TenTap}} 
                                            </a>
                                            @endif
                                        </h3>
                                        <p>{{$book->TacGia}}</p>
                                        <div class="item-price">$ {{$book->GiaSach}}</div>
                                    </figcaption>
                                    @endif
                                    <!-- Blade Template -->
                                    
                                </figure>
                            </div>
                            @endforeach
                            @endif
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                        </div>
                        <script>
                            axios.defaults.headers.common['X-XSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            const baseUrl = '{{url('/')}}';
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
                                <li><a href="?page={{ $currentPage - 1 }}">Previous</a></li>
                                @endif

                                @for ($i = 1; $i <= $lastPage; $i++) <li class="{{ $i == $currentPage ? 'active' : '' }}">
                                    <a href="?page={{ $i }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    @if ($currentPage < $lastPage) <li><a href="?page={{ $currentPage + 1 }}">Next</a></li>
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