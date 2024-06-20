@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | EDIT LOGO
    @endsection
    @section('page-main-title')
        EDIT LOGO
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('edit-logo-submit',$logo->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                        <label for="thumbnail">Logo</label>
                                        <input type="file" name="thumbnail" id="" class="form-control">
                                        <img class="mt-2"  width="80px" src="{{url('image/',$logo->thumbnail)}}" alt="">
                                        <input type="hidden" value="{{$logo->thumbnail}}">
                                        <input name="old_image" type="hidden" value="{{$logo->thumbnail}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('list-logo')}}" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Edit Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
