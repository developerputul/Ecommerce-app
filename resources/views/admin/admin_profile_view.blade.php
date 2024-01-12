@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card"> <br> <br>

                    <center>
                        <img class="rounded-circle avatar-xl" alt="200x200" src="{{asset('backend/assets/images/small/img-5.jpg')}}" data-holder-rendered="true">
                    </center>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{$adminData->name}}</h4>
                            <hr>
                            <h4 class="card-title">Admin Email : {{$adminData->email}}</h4>
                            <hr>
                            <h4 class="card-title">Admin Name : {{$adminData->name }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile')}}" class="btn btn-warning">Edit Profile</a>
                        </div>
                    </div>
                </div>
         </div>
    </div>
</div>

@endsection
