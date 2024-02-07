@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style type="text/css">
.bootstrap-tagsinput .tag{
    margin-right: 2px;
    color: #b70000;
    font-weight: 700px;
}

</style>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-2"> Blog page</h4>


                <form method="post" action="{{route('store.portfolio')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                        <div class="col-sm-10">
                            <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input name="blog_title" class="form-control" type="text" id="example-text-input">

                            @error('blog_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog tags</label>
                        <div class="col-sm-10">
                            <input name="blog_tags" value="home,tech" class="form-control" type="text" data-role="tagsinput">


                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                        <div class="col-sm-10">
                            <textarea name="blog_desc" class="form-control" rows="8">
                            </textarea>

                            @error('blog_desc')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-sm-10">
                            <input name="blog_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" alt="506x590" src="{{ isset($blogimage) ? asset($blogimage->blog_image) : asset('about/no_image.jpg') }}" data-holder-rendered="true">
                        </div>
                    </div>
                    <input type="Submit" class="btn btn-info" value="Insert Blog Data">
                </form>
                <!----------------end--------------------->
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
