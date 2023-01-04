@extends('hims.admin_master')
@section('emergency')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h6 class="mb-sm-0">Admissions:</h6>
   
</div>

<div class="card card-default">
        <div class="card-body">
        <livewire:internal-medicine-request-table/>
        </div>
</div>



</div>
<!-- end page title -->

</div>




@endsection