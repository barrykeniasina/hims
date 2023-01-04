@extends('admin.admin_master')
@section('admin')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Edit User</h4>
   
</div>
<x-forms.post action="/user/edit/{{$users->id}}">
    <div class="card card-default">
        <div class="card-body">
  
            <!-- Name -->
            <div>
                <x-forms.textfield name="name" label="Name" value="{{$users->name}}"  maxlength="50" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">

                <x-forms.textfield name="email" label="email" value="{{$users->email}}"  maxlength="50" />
            </div>



            <!-- Password -->
            <div class="mt-4">

                <x-forms.textfield  label="Password" maxlength="50"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">

                 <x-forms.textfield  label="password confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="mt-4">
            <h6>Roles</h6>
            <div class="form-check">
                @foreach($roles as $role)
                    
                        <input type="checkbox" name="rolearray[]" value="{{$role->id}}"
                        @if($users->user_role_id == $role->id) checked @endif>
                        <label>{{ $role->role_desc }}</label>
                    
                @endforeach
                </div>
            </div>

            </div>         
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" role="button" href="{{route('user.index')}}">{{ __('Cancel') }}</a>
        </div>
    </div>
</x-forms.post> 
</div>
</div>
<!-- end page title -->

</div>
</div>



@endsection