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
                        @foreach ($listProduct as $item)
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                    @if ($item->regular_price != 0)
                                    <div class="status">
                                        Promotion
                                    </div>
                                    @endif
                                    <a href="{{ route('product-deltail', $item->id) }}">
                                        <img src="{{ url('image', $item->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        @if ($item->regular_price != 0)
                                        <div class="regular-price">
                                            <strike>US ${{ $item->regular_price }}</strike>
                                        </div>
                                        @endif
                                        <div class="sale-price">US ${{ $item->sale_price }}</div>
                                    </div>
                                    <h5 class="title">T-Shirt 001</h5> <!-- Replace with actual item title -->
                                </div>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12">
                        {{ $listProduct->links() }}
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        @foreach ($categories as $item)
                        <li>
                            <a href="/shop?cate={{ $item->id }}">{{ $item->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?price=max">High</a>
                        <a href="/shop?price=min">Low</a>
                    </div>
                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?promotion=true">Promotion Product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection