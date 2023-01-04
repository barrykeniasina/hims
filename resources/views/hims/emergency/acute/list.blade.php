@extends('hims.admin_master')
@section('emergency')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Acute ward admitted patients:</h4>
    
</div>
<div class="card card-default">
        <div class="card-body">   
<div class="row">
<div class="col-12">

<br/><br/>
<livewire:emergency-acute-ward/>
</div>
</div>
</div>
</div>
<!-- end page title -->

</div>

</div>

@endsection