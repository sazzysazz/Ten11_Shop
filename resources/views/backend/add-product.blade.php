@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Products
    @endsection
    @section('page-main-title')
        Add Products
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('add-product-submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class=" text-primary text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="proName" />
                                    @if ($errors->first('proName'))
                                    <span class="text-danger">{{$errors->first('proName')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" type="text" name="qty" />
                                    @if ($errors->first('qty'))
                                    <span class="text-danger">{{$errors->first('qty')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Regular Price</label>
                                    <input class="form-control" type="number" name="regular_price" />
                                    @if ($errors->first('regular_price'))
                                    <span class="text-danger">{{$errors->first('regular_price')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Sale Price</label>
                                    <input class="form-control" type="number" name="sale_price" />
                                    @if ($errors->first('sale_price'))
                                    <span class="text-danger">{{$errors->first('sale_price')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XL">XXL</option>
                                        <option value="XL">XXXL</option>
                                    </select>
                                    {{-- @if ($errors->first('size[]'))
                                    <span class="text-danger">{{$errors->first('size[]')}}</span>
                                    @endif --}}
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        <option value="Red">Red</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Grey">Grey</option>
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                        <option value="Green">Green</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Purple">Purple</option>
                                        <option value="Pink">Pink</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Turquoise">Turquoise</option>
                                    </select>
                                    {{-- @if ($errors->first('color[]'))
                                    <span class="text-danger">{{$errors->first('color[]')}}</span>
                                    @endif --}}
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Category</label>

                                    <select name="category" class="form-control">
                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->first('category'))
                                    <span class="text-danger">{{$errors->first('category')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                    
                                    @if ($errors->first('thumbnail'))
                                    <span class="text-danger">{{$errors->first('thumbnail')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                    @if ($errors->first('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
