{{-- <!-- resources/views/checkout/index.blade.php -->
@extends('frontend.layout')
@section('title')
    Checkout
@endsection

@section('content')
<main class="checkout">
    <section class="checkout-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Checkout</h2>
                    <div class="product-detail">
                        <div class="thumbnail">
                            <img src="{{ url('image/', $product->thumbnail) }}" alt="{{ $product->proName }}">
                        </div>
                        <div class="detail">
                            <h3>{{ $product->proName }}</h3>
                            @if($product->sale_price)
                                <div class="price">US {{ $product->sale_price }}</div>
                            @else
                                <div class="price">US {{ $product->regular_price }}</div>
                            @endif
                            <div class="description">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="payment">Payment Method</label>
                            <select id="payment" name="payment" class="form-control" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Complete Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection --}}
