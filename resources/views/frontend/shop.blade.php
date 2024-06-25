


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
                        @foreach ($products as $value)
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                    @if ($value->regular_price!=0)
                                    <div class="status">
                                        Promotion
                                    </div>
                                    @endif
                                    <a href="{{route('product-deltail',$value->id)}}">
                                        <img src="{{url('image/',$value->thumbnail)}}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        <div class="price d-none">US 10</div>
                                        @if ($value->regular_price!=0)
                                            <div class="regular-price "><strike>US {{$value->regular_price}}</strike></div>
                                        @endif
                                        <div class="sale-price ">US {{$value->sale_price}}</div>
                                    </div>
                                    <h5 class="title">{{$value->proName}}</h5>
                                </div>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        @foreach ($category as $item)
                        <li>
                            <a href="/shop?cate={{$item->id}}">{{$item->name}}</a>
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
        <div class="mx-5 mt-5">
            {{$products->links()}}
        </div>
    </section>

</main>
@endsection
