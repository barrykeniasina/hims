@extends('hims.admin_master')
@section('emergency')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Visit List</h4>  
</div>

<div class="card">
    <div class="card-body">
    <livewire:visit_internal_medicine/>
    </div>
</div>

</div>
</div>
<!-- end page title -->

</div>

</div>

@endsection

