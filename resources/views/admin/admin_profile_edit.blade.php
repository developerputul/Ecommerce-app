@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                    <!-------------------form-------------------------------->
                    <form action="">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Admin Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="text" value="{{$editData->email}}" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Admin Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="file" id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded avatar-lg" alt="200x200" src="{{asset('backend/assets/images/small/img-5.jpg')}}" data-holder-rendered="true">
                            </div>
                        </div>
                        <input type="Submit" class="btn btn-info" value="Update Profile">
                    </form>
                    <!----------------end--------------------->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
