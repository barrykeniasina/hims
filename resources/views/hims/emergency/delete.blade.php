

@extends('hims.admin_master')
@section('admin')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Delete Users</h4>  
</div>
<p class="text-danger">Are you sure you want to delete User?</p>
<x-forms.post action="/user/delete/{{$users->id}}">
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
            <!-- Name -->
            <div>
                <x-forms.textfield name="name" label="Name" value="{{$users->name}}"  maxlength="50" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">

                <x-forms.textfield name="email" label="email" value="{{$users->email}}"  maxlength="50" />
            </div>


                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a class="btn btn-secondary" role="button" href="{{route('sector.index')}}">{{ __('Cancel') }}</a>
        </div>
    </div>
</x-forms.post> 
</div>
</div>
<!-- end page title -->

</div>

</div>



@endsection
