@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-2">About Page</h4>
                <!-------------------form-------------------------------->
                @if($aboutpage)
                <form method="post" action="{{route('update.about')}}" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutpage->id }}">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$aboutpage->title}}" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{$aboutpage->short_title}}" id="example-text-input">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short_Description</label>
                        <div class="col-sm-10">
                            <textarea required ="" name="short_description" class="form-control" rows="5">
                                {{$aboutpage->short_description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Long_Description</label>
                        <div class="col-sm-10">
                            <textarea name="long_description" class="form-control" rows="8">
                                {{$aboutpage->long_description}}
                            </textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input name="about_image" class="form-control" type="file" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" alt="506x590" src="{{ asset($aboutpage->profile_image) ?? asset('about/no_image.jpg')}}" data-holder-rendered="true">
                        </div>
                    </div>
                    <input type="Submit" class="btn btn-info" value="Update About Page">
                </form>
                @else
                    <p>No data found in the database !</p>
                @endif
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

