@extends('clients.index')

@section('body')
@if($sach)
@if(isset($sach[0]->MaTap))
<section class="bg-sand padding-large">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="product-image"><img src="{{asset('storage/books/'.$sach[0]->AnhTap)}}"></a>
            </div>
            <div class="col-md-6 pl-5">
                <div class="product-detail">
                    <h1>{{$sach[0]->TenSach}} {{$sach[0]->TenTap}}</h1>
                    <p>{{$sach[0]->TacGia}}</p>
                    <span class="price colored">$ {{$sach[0]->GiaSach}}</span>
                    <p>
                        {{$sach[0]->NoiDung}}
                    </p>
                    <p>
                        {{$sach[0]->NoiDungTap}}
                    </p>
                    <button type="button" class="add-to-cart button" data-product-id="{{ $sach[0]->MaSach }}" data-product-name="{{ $sach[0]->TenSach }}" data-product-idtap="{{ $sach[0]->MaTap }}" data-product-tap="{{ $sach[0]->TenTap }}">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</section>
@else
<section class="bg-sand padding-large">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="product-image"><img src="{{asset('storage/books/'.$sach[0]->AnhSach)}}"></a>
            </div>
            <div class="col-md-6 pl-5">
                <div class="product-detail">
                    <h1>{{$sach[0]->TenSach}}</h1>
                    <p>{{$sach[0]->TacGia}}</p>
                    <span class="price colored">$ {{$sach[0]->GiaSach}}</span>
                    <p>
                        {{$sach[0]->NoiDung}}
                    </p>
                    <button type="button" class="add-to-cart button" data-product-id="{{ $sach[0]->MaSach }}" data-product-name="{{ $sach[0]->TenSach }}">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</section>
@endif
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
@endif
@endsection