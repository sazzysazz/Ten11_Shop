@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Edit News
    @endsection
    @section('page-main-title')
        Edit News
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('edit-news-submit',$news->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="image" />
                                    <img class="mt-2"  width="80px" src="{{url('images/',$news->image)}}" alt="">
                                    <input name="old_image" type="hidden" value="{{$news->image}}">

                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control" value="{{$news->title}}">

                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$news->description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('list-news')}}" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Edit News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection