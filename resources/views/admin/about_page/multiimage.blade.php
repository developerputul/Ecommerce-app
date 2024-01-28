@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-2">Add Multi Image</h4> <br> <br>
<!-------------------form-------------------------------->

                @if($multiimage)
                <form method="post" action="{{route('store.multi.image')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                        <div class="col-sm-10">
                            <input name="multi_image[]" class="form-control" type="file" id="image" multiple="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" alt="506x590" src="{{ asset($multiimage->multi_image) ?? asset('about/no_image.jpg')}}" data-holder-rendered="true">
                        </div>
                    </div>
                    <input type="Submit" class="btn btn-info" value="Add Multi Image">
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


