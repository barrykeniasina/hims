@extends('outpatient.admin_master')
@section('emergency')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<div class="row">
    <h4 class="mb-sm-0">Create new visit for:</h4>
</div>
</div>

<div class="card card-default">
        <div class="card-body">
        <table>
        <tr>
            <td>
                Name: {{$patient->fname}}
            </td> 
            <td>
                Age: {{\Carbon\Carbon::parse($patient->dob)->diff(\Carbon\Carbon::now())->format('%y years')}}
            </td>
             <td>
                 D.O.B:  {{ date('d-m-Y', strtotime($patient->dob)) }}
             </td>       
        </tr>
        </table>
        </div>
    </div>
    
<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'step1')" id="defaultOpen">Visit Details</button>
  <button class="tablinks" onclick="openCity(event, 'step2')">Treatment</button>
  <button class="tablinks" onclick="openCity(event, 'step3')">Vitals</button>
  <button class="tablinks" onclick="openCity(event, 'step4')">Triage</button>
  <button class="tablinks" onclick="openCity(event, 'step5')">Ward</button>
  <button class="tablinks" onclick="openCity(event, 'step6')">Diagnosis</button>
  <button class="tablinks" onclick="openCity(event, 'step7')">Prescription</button>
</div>

<!-- Tab content -->

    
<x-forms.post action="{{route('emergency.visit.store')}}">
<div id="step1" class="tabcontent">


    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">                    
                    <x-forms.textfield type=date name="visitdate" label="Visit Date"   required/>
                </div>

                <div class="col-md-4">
                    <x-forms.select-from-pluck name="category"  label="category" :options="['New Patient' => 'New Patient', 'Sheduled Return' => 'Shedule Return (Review)','Unsheduled Return' => 'Unsheduled Return', 'Referral' => 'Referral']" required/>
                </div>
       

                <div class="col-md-4">                    
                        <x-forms.textarea name="complaint" label="Complaint/Incident"   />
                </div>      
                    
                

            </div>
            
     

   
            <x-forms.textfield type=hidden name="patient_id" value="{{$patient->id}}" />


        </div>
        </div>
        </div>

        <div id="step2" class="tabcontent">
        <div class="card card-default">
        <div class="card-body">
        <div class="row">
        <div class="col-md-4">
        <p>Treatment History</p> 
            <table class="table" id="treatments_table">
                <tbody>
                    <tr id="treatment0">

                        <td>
                        <x-forms.textarea name="treatments[]"  placeholder="Enter treatment history" />
                        </td>
                    </tr>
                    <tr id="treatment1"></tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button id="add_row_treatment" class="btn btn-success btn-sm pull-left">+ Add Row</button>
                    <button id='delete_row_treatment' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>

        <div id="step3" class="tabcontent">
        <div class="card card-default">
            <div class="card-body">
            <p>Vitals</p>  
                        <table class="table" id="vitals_table">
                            <thead>
                            </thead>
                            <tbody>
                                <tr id="vital0">

                                    <td>
                                    <x-forms.textarea name="vitals[]" placeholder="Enter vitals"   />
                                    </td>
                                </tr>
                                <tr id="vital1"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row_vital" class="btn btn-success btn-sm pull-left">+ Add Row</button>
                                <button id='delete_row_vital' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                            </div>
                        </div>
            </div>
            </div>
        </div>



        <div id="step4" class="tabcontent">
        <div class="card card-default">
        <div class="card-body">       
        <div class="row">
        <div class="col-md-4">
            <p>Triage Category</p>        
                    <table class="table" id="products_table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="triages[]" class="form-control">
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
                        <button id="add_row" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='delete_row' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
</div>
   

<div id="step5" class="tabcontent">
<div class="card card-default">
        <div class="card-body">       
        <div class="row">
        <div class="col-md-6">
            <p>Ward Details</p>        
                    <table class="table" id="wards_table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr id="ward0">
                                <td>
                                    <select name="wards[]" class="form-control" >
                                        <option value="">-- choose ward --</option>
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}">
                                                {{ $ward->ward_detail }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <x-forms.textarea name="details[]" placeholder="details"  />
                                </td>
                            </tr>
                            <tr id="ward1"></tr>
                        </tbody>
                    </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row_ward" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='delete_row_ward' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                    </div>
                </div>
                </div>
                </div>
            </div>
</div>
</div>

<div id="step6" class="tabcontent">
<div class="card card-default">
        <div class="card-body">       
        <div class="row">
        <div class="col-md-12">
            <p>Diagnosis</p>        
                    <table class="table" id="diagnosis_table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr id="diagnosis0">
                                <td width="50%">
                                    <select name="icds[]" class="form-control" >
                                        <option value="">-- choose Diagnosis --</option>
                                        @foreach ($icds as $icd)
                                            <option value="{{ $icd->id }}">
                                            {{ $icd->codes }} - {{ $icd->description }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td width="25%">
                                    <x-forms.select-from-pluck name="types[]"  :options="['Principal' => 'Principal', 'Provisional' => 'Provisional']" required/>
                                </td>
                                <td width="25%">
                                    <x-forms.select-from-pluck name="categories[]"   :options="['Primary' => 'Primary', 'Additional' => 'Additional']" required/>
                                </td>
                            </tr>
                            <tr id="diagnosis1"></tr>
                        </tbody>
                    </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row_diagnosis" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='delete_row_diagnosis' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                    </div>
                </div>
                </div>
                </div>
            </div>
</div>
</div>

<div id="step7" class="tabcontent">
<div class="card card-default">
        <div class="card-body">       
        <div class="row">
        <div class="col-md-12">
            <p>Prescription</p>        
                    <table class="table" id="prescription_table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr id="prescription0">
                                <td width="25%">
                                    <select name="medications[]" class="form-control" >
                                        <option value="">-- choose medication --</option>
                                        @foreach ($medications as $medication)
                                            <option value="{{ $medication->id }}">
                                            {{ $medication->drug_name }} - {{ $medication->concentration }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td width="25%">
                                    <x-forms.textfield type="number" name="dosages[]" placeholder="dosage" required/>
                                </td>

                                <td width="25%">
                                    <x-forms.textarea name="instructions[]" placeholder="instructions" required/>
                                </td>

                            </tr>
                            <tr id="prescription1"></tr>
                        </tbody>
                    </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row_prescription" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='delete_row_prescription' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                    </div>
                </div>
                </div>
                </div>
            </div>
</div>
</div>





<input type="hidden" name="patient_id" value="{{$patient->id}}" />
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <a class="btn btn-secondary" role="button" href="{{route('emergency.visitlist')}}">{{ __('Cancel') }}</a>
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


  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_vital").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#vital' + row_number).html($('#vital' + new_row_number).html()).find('td:first-child');
      $('#vitals_table').append('<tr id="vital' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_vital").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#vital" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });

  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_treatment").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#treatment' + row_number).html($('#treatment' + new_row_number).html()).find('td:first-child');
      $('#treatments_table').append('<tr id="treatment' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_treatment").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#treatment" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });

  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_ward").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#ward' + row_number).html($('#ward' + new_row_number).html()).find('td:first-child');
      $('#wards_table').append('<tr id="ward' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_ward").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#ward" + (row_number - 1)).html('');
        row_number--;
      }
    });
  }); 


  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_diagnosis").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#diagnosis' + row_number).html($('#diagnosis' + new_row_number).html()).find('td:first-child');
      $('#diagnosis_table').append('<tr id="diagnosis' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_diagnosis").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#diagnosis" + (row_number - 1)).html('');
        row_number--;
      }
    });
  }); 



  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_prescription").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#prescription' + row_number).html($('#prescription' + new_row_number).html()).find('td:first-child');
      $('#prescription_table').append('<tr id="prescription' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_prescription").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#prescription" + (row_number - 1)).html('');
        row_number--;
      }
    });
  }); 


  $(document).ready(function(){
    let row_number = 1;
    $("#add_row_discharge").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#discharge' + row_number).html($('#discharge' + new_row_number).html()).find('td:first-child');
      $('#discharge_table').append('<tr id="discharge' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row_discharge").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#discharge" + (row_number - 1)).html('');
        row_number--;
      }
    });
  }); 


    </script> 


@endsection