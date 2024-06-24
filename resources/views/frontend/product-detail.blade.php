@extends('frontend.layout')
@section('title')
    Product Detail
@endsection

@section('content')
<main class="product-detail">
    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div  class="thumbnail">
                        <img  width="400" src="{{ url('image/', $product->thumbnail) }}" alt="{{ $product->proName }}">
                    </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                            @if($product->regular_price)
                                <div class="regular-price"><strike>US {{ $product->regular_price }}</strike></div>
                            @endif
                            @if($product->sale_price)
                                <div class="sale-price">US {{ $product->sale_price }}</div>
                            @endif
                        </div>
                        <h5 class="title">{{ $product->proName }}</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">
                                {!! nl2br(e($product->color)) !!}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">
                                {!! nl2br(e($product->size)) !!}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                        <form action="{{ route('buy-product', $product->id) }}" >
                            @csrf
                            <input type="hidden" name="product_id" value="#">
                            <button type="submit" style="width: 50%" class="btn btn-outline-primary">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATED PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-3">
                        <figure>
                            <div class="thumbnail">
                                <div class="status">
                                    Promotion
                                </div>
                                <a href="{{route('product-deltail',$relatedProduct->id)}}">
                                    <img src="{{ url('image/', $relatedProduct->thumbnail) }}" alt="{{ $relatedProduct->proName }}">
                                </a>
                            </div>
                            <div class="detail">
                                <div class="price-list">
                                    @if($relatedProduct->regular_price)
                                        <div class="regular-price"><strike>US {{ $relatedProduct->regular_price }}</strike></div>
                                    @endif
                                    @if($relatedProduct->sale_price)
                                        <div class="sale-price">US {{ $relatedProduct->sale_price }}</div>
                                    @endif
                                </div>
                                <h5 class="title">{{ $relatedProduct->proName }}</h5>
                            </div>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
