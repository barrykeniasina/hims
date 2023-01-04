@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Manage Users</h4>
    
</div>
<a href="{{route('user.create')}}" class="btn btn-success">Create +</a>
<br/><br/>
<livewire:users/>
</div>
</div>
<!-- end page title -->

</div>

</div>

@endsection

