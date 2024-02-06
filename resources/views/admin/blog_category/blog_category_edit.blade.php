

@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-2">Blog Category Edit page</h4> <br> <br>


                <form method="post" action="{{route('update.blog.category',$blogcategory->id)}}">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                        <div class="col-sm-10">
                            <input name="blog_category" class="form-control" type="text" value="{{$blogcategory->blog_category}}" id="example-text-input">

                            @error('blog_category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <input type="Submit" class="btn btn-info" value="Update  Blog Category">
                </form>
                <!----------------end--------------------->
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection


