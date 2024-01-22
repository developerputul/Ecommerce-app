@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Home Slide Page</h4>
                <!-------------------form-------------------------------->
                <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">

                    @csrf

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$homeslide->title}}" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" value="{{$homeslide->short_title}}" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{$homeslide->video_url}}" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image</label>
                        <div class="col-sm-10">
                            <input name="home_slide" class="form-control" type="file" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" alt="200x200" src="{{ (!empty($homeslide->home_slide)) ?url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.jpg')}}" data-holder-rendered="true">
                        </div>
                    </div>
                    <input type="Submit" class="btn btn-info" value="Update Slide">
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
