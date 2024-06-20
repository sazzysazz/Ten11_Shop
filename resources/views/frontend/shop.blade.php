@extends('frontend.layout')
@section('title')
    Shop
@endsection
@section('content')
<main class="shop">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        @forelse ($product as $product)
                            <div class="col-4">
                                <figure>
                                    <div class="thumbnail">
                                        @if ($product->promotion)
                                            <div class="status">
                                                Promotion
                                            </div>
                                        @endif
                                        <a href="{{route('product-deltail',$product->id)}}">
                                            <img src="{{ url('image/', $product->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <div class="price-list">
                                            @if ($product->regular_price)
                                                <div class="regular-price"><strike>US {{ $product->regular_price }}</strike></div>
                                            @endif
                                            <div class="sale-price">US {{ $product->sale_price }}</div>
                                        </div>
                                        <h5 class="title">{{ $product->name }}</h5>
                                    </div>
                                </figure>
                            </div>
                        @empty
                            <p>No products available</p>
                        @endforelse                  
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        <li>
                            <a href="{{route('get-by-man')}}">Men</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-women')}}">Women</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-girl')}}">Girl</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-boy')}}">Boy</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-shirt')}}">Shirt</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-jeans')}}">Jeans</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-Cargo')}}">Cargo</a>
                        </li> 
                        <li>
                            <a href="{{route('get-by-shoes')}}">shoes</a>
                        </li> 
                    </ul>
                    
                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="{{route('get-by-hight-price')}}">High</a>
                        <a href="{{route('get-by-low-price')}}">Low</a>
                    </div>

                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="{{route('promotion-product')}}">Promotion Product</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection