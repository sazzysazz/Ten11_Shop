@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Edit Product
    @endsection
    @section('page-main-title')
        Edit Product
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('edit-product-submit', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="proName" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="proName" value="{{ $product->proName }}"/>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input class="form-control" type="text" name="qty" value="{{ $product->qty }}"/>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="regular_price" class="form-label">Regular Price</label>
                                    <input class="form-control" type="number" name="regular_price" value="{{ $product->regular_price }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input class="form-control" type="number" name="sale_price" value="{{ $product->sale_price }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="size" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($size as $item)
                                            <option value="S" {{ ($item == 'S') ? 'selected' : '' }}>S</option>
                                            <option value="M" {{ ($item == 'M') ? 'selected' : '' }}>M</option>
                                            <option value="L" {{ ($item == 'L') ? 'selected' : '' }}>L</option>
                                            <option value="XL" {{ ($item == 'XL') ? 'selected' : '' }}>XL</option>
                                            <option value="XXL" {{ ($item == 'XXL') ? 'selected' : '' }}>XXL</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="color" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($color as $item)
                                        <option value="Red" {{ ($item == 'Red') ? 'selected' : '' }}>Red</option>
                                        <option value="Blue" {{ ($item == 'Blue') ? 'selected' : '' }}>Blue</option>
                                        <option value="Grey" {{ ($item == 'Grey') ? 'selected' : '' }}>Grey</option>
                                        <option value="Black" {{ ($item == 'Black') ? 'selected' : '' }}>Black</option>
                                        <option value="White" {{ ($item == 'White') ? 'selected' : '' }}>White</option>
                                        <option value="Green" {{ ($item == 'Green') ? 'selected' : '' }}>Green</option>
                                        <option value="Yellow" {{ ($item == 'Yellow') ? 'selected' : '' }}>Yellow</option>
                                        <option value="Purple" {{ ($item == 'Purple') ? 'selected' : '' }}>Purple</option>
                                        <option value="Pink" {{ ($item == 'Pink') ? 'selected' : '' }}>Pink</option>
                                        <option value="Orange" {{ ($item == 'Orange') ? 'selected' : '' }}>Orange</option>
                                        <option value="Brown" {{ ($item == 'Brown') ? 'selected' : '' }}>Brown</option>
                                        <option value="Turquoise" {{ ($item == 'Turquoise') ? 'selected' : '' }}>Turquoise</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" class="form-control">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ ($item->name == $getCate->category) ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="thumbnail" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                    <img width="80" src="{{ url('image/', $product->thumbnail) }}" alt="">
                                    <input type="hidden" name="old_img" value="{{ $product->thumbnail }}">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="description" class="form-label text-danger">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a class="btn btn-danger" href="{{ route('list-product') }}">Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
