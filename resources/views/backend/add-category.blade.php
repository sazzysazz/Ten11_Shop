@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Category
    @endsection
    @section('page-main-title')
        Add Category
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('add-category-Submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Category</label>
                                    <input class="form-control" type="text" name="name" />
                                    @if ($errors->first('name'))
                                    <span class="text-danger"  >{{($errors->first('name'))}}</span>
                                @endif
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                {{-- <a href="{{route('add-category')}}" class="btn btn-danger" >Cancel</a> --}}
                                <input type="submit" class="btn btn-success" value="Add category">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
