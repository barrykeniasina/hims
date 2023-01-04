@extends('hims.admin_master')
@section('emergency')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Patient List</h4>
    
</div>
<a href="{{route('user.create')}}" class="btn btn-light">Create +</a>
<br/><br/>
<livewire:patients/>
</div>
</div>
<!-- end page title -->

</div>

</div>

@endsection

