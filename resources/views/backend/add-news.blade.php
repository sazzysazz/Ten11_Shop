
@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add News
    @endsection
    @section('page-main-title')
        Add News
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('add-news-submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="image" />
                                    @if ($errors->first('image'))
                                        <span class="text-danger"  >{{($errors->first('image'))}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control">
                                    @if ($errors->first('title'))
                                        <span class="text-danger"  >{{($errors->first('title'))}}</span>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    @if ($errors->first('description'))
                                        <span class="text-danger"  >{{($errors->first('description'))}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Add News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
