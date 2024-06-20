@extends('frontend.layout')
@section('title')
    Home
@endsection
@section('content')
    <main class="home">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">NEW PRODUCTS</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($newProducts as $value)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    @if($value->regular_price != 0)
                                        <div class="status">Promotion</div>
                                    @endif
                                    <a href="{{route('product-deltail',$value->id)}}">
                                        <img src="{{ url('image/', $value->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        @if($value->regular_price!=0)
                                            <div class="regular-price"><strike>US {{ $value->regular_price }}</strike></div>
                                            <div class="sale-price">US {{ $value->sale_price }}</div>
                                        @else
                                            <div class="price">US {{ $value->sale_price }}</div>
                                        @endif
                                    </div>
                                    <h5 class="title">{{ $value->proName }}</h5>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">PROMOTION PRODUCTS</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($promotionProducts as $value)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <div class="status">Promotion</div>
                                    <a href="{{route('product-deltail',$value->id)}}">
                                        <img src="{{ url('image/', $value->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        <div class="regular-price"><strike>US {{ $value->regular_price }}</strike></div>
                                        <div class="sale-price">US {{ $value->sale_price }}</div>
                                    </div>
                                    <h5 class="title">{{ $value->proName }}</h5>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">POPULAR PRODUCTS</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($popularProducts as $value)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <a href="{{route('product-deltail',$value->id)}}">
                                        <img src="{{ url('image/', $value->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        @if($value->regular_price)
                                            <div class="regular-price"><strike>US {{ $value->regular_price }}</strike></div>
                                            <div class="sale-price">US {{ $value->sale_price }}</div>
                                        @else
                                            <div class="price">US {{ $value->sale_price }}</div>
                                        @endif
                                    </div>
                                    <h5 class="title">{{ $value->proName }}</h5>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
