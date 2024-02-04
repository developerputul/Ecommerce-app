@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('all.multi.image')}}"><button class="btn btn-success">Back</button></a>
                    <h4 class="card-title mt-2">Update Multi Image</h4> <br> <br>
<!-------------------form-------------------------------->

                @if($multiImage)
                <form method="post" action="{{route('update.multi.image')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$multiImage->id}}">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                        <div class="col-sm-10">
                            <input name="multi_image" class="form-control" type="file" id="image" multiple="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" alt="506x590" src="{{ asset($multiImage->multi_image) ?? asset('about/no_image.jpg')}}" data-holder-rendered="true">
                        </div>
                    </div>
                    <input type="Submit" class="btn btn-info" value="Update Multi Image">
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


