@extends('hims.admin_master')
@section('emergency')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h6 class="mb-sm-0">In-coming admissions requests :</h6>
   
</div>

<div class="card card-default">
        <div class="card-body">
        <livewire:emergency-incoming-request/>
        </div>
</div>



</div>
<!-- end page title -->

</div>




@endsection