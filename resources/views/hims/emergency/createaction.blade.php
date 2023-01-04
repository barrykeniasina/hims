@extends('hims.admin_master')
@section('emergency')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Create Triage for patient:</h4>
</div>

<div class="card card-default">
        <div class="card-body">
            <p>Name: {{$patient->fname}}</p> 
            <p>Age: {{\Carbon\Carbon::parse($patient->dob)->diff(\Carbon\Carbon::now())->format('%y years')}}</p>
            <p>D.O.B: {{ date('d-m-Y', strtotime($patient->dob)) }}</p>  
            <p>Address: {{ $patient->address }}</p> 
        </div>
    </div>
    
<x-forms.post action="{{route('emergency.triage.store')}}">

    <div class="card card-default">
        <div class="card-body"> 
        <div class="row">
            <p>Triage Category</p>        
                    <table class="table" id="products_table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="triages[]" class="form-control" required>
                                        <option value="">-- choose triage category --</option>
                                        @foreach ($triages as $triage)
                                            <option value="{{ $triage->id }}">
                                                {{ $triage->triage_desc }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            <tr id="product1"></tr>
                        </tbody>
                    </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-success pull-left">+ Add Row</button>
                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                    </div>
                </div>
                </div>
                <input type="hidden" name="patient_id" value="{{$patient->id}}" />
        </div>
    </div>
                
   
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <a class="btn btn-secondary" role="button" href="">{{ __('Cancel') }}</a>
        </div>
    </div>
</x-forms.post> 
</div>
</div>
<!-- end page title -->


<script>
        let address =  window.location.href;
        let value = address.search("project");

        if(value>0)
        {
            var element1 = document.getElementById("projectlink1");
            element1.style.color = "#3399ff";  

            var element2 = document.getElementById("projectlink2");
            element2.style.color = "#3399ff"; 
        }




        $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });






    </script> 


@endsection