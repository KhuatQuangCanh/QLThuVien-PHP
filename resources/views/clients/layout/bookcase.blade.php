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
                    <a href="{{ route('clients.books.getBooksByGenreForBookCase', 'all') }}" style="text-decoration-line: none;">
                        <li class="active tab" data-tab-target="all-genre">All Genre</li>
                    </a>
                    @if(!empty($list_TL))
                    @foreach($list_TL as $key => $theloai)
                    <a href="{{ route('clients.books.getBooksByGenreForBookCase',$theloai->MaTL) }}" style="text-decoration-line: none;">
                        <li class="tab">{{ $theloai->TenTL }}</li>
                    </a>
                    @endforeach
                    @endif
                </ul>

                <div class="tab-content">
                    <div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @if(!empty($list_books))
                            @foreach($list_books as $key => $book)
                            <div class="col-3 col-lg-3 col-md-3 col-sm-3">
                                <!-- Hiển thị thông tin sách -->
                                <figure class="product-style">
                                    <img src="{{asset('assets/images/'.$book->Anh)}}" alt="Books" class="product-item" width="150px" height="100px">
                                    <button type="button" class="add-to-cart" data-product-id="{{ $book->MaSach }}" data-product-name="{{ $book->TenSach }}" data-product-price="{{ $book->GiaSach }}">
                                        Add to Cart
                                    </button>
                                  
                                    <figcaption>
                                        <h3>{{$book->TenSach}}</h3>
                                        <p>{{$book->TenTG}}</p>
                                        <div class="item-price">$ {{$book->GiaSach}}</div>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <script>
                            const baseUrl = '{{url('/')}}';
                            document.addEventListener('DOMContentLoaded', function() {
                                document.addEventListener('click', function(event) {
                                    if (event.target.classList.contains('add-to-cart')) {
                                        const productId = event.target.getAttribute('data-product-id');
                                        const productName = event.target.getAttribute('data-product-name');

                                        // Send Ajax request to add the product to the cart
                                        axios.post(baseUrl+'/book/add-to-cart', {
                                                product_id: productId,
                                                product_name: productName,
                                            })
                                            .then(function(response) {
                                                alert(response.data.message);
                                            })
                                            .catch(function(error) {
                                                console.error('Error adding to cart:', error.message);
                                            });
                                    }
                                });
                            });
                        </script>
                        <div class="pagination">
                            <ul>
                                @if ($list_books->onFirstPage())
                                <li class="disabled">&laquo; Previous</li>
                                @else
                                <li><a href="{{ $list_books->previousPageUrl() }}">&laquo; Previous</a></li>
                                @endif

                                @foreach (range(1, $list_books->lastPage()) as $page)
                                @if ($page == $list_books->currentPage())
                                <li class="active">{{ $page }}</li>
                                @else
                                <li><a href="{{ $list_books->url($page) }}">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                @if ($list_books->hasMorePages())
                                <li><a href="{{ $list_books->nextPageUrl() }}">Next &raquo;</a></li>
                                @else
                                <li class="disabled">Next &raquo;</li>
                                @endif
                            </ul>
                        </div>


                        <!-- ... your existing code ... -->

                    </div>
                </div>



            </div>
            <!--inner-tabs-->

        </div>
    </div>

</section>
@endsection