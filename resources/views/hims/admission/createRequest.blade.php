@extends('hims.admin_master')
@section('emergency')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h6 class="mb-sm-0">Create admission for:</h6>
   
</div>

<div class="card card-default">
        <div class="card-body">
        <table>
        <tr>
            <td>
                Name: {{$patient[0]->fname}}
            </td> 
            <td>
                Age: {{\Carbon\Carbon::parse($patient[0]->dob)->diff(\Carbon\Carbon::now())->format('%y years')}}
            </td>
             <td>
                 D.O.B:  {{ date('d-m-Y', strtotime($patient[0]->dob)) }}
             </td>       
        </tr>
        </table>


        </div>
    </div>

<x-forms.post action="{{ url('/emergency/admission/storeRequest') }}">
    <div class="card card-default">
        <div class="card-body">
  
        <div class="row">
            <div class="col-md-4">
            <x-forms.select-from-pluck name="type"  label="Type" value="" :options="['New Admission' => 'New Admission', 'Transfer'=>'Transfer']" required/>
            </div>
      
            <div class="col-md-4">
            <x-forms.select-from-pluck name="refered_from"  label="Refered from" value="" :options="$current_ward" required/>
            </div>
        
            <div class="col-md-4">
            <x-forms.select-from-pluck name="tranfered_to"  label="Transfered to" value="" :options="$wards" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <x-forms.select-from-pluck name="doctor_incharge"  label="Doctor in-charge" value="" :options="$users" required/>
            </div>

            <div class="col-md-4">
            <x-forms.select-from-pluck name="transport"  label="Transport used" value="" :options="['Car' => 'Car', 'Utility Vehicle'=>'Utility Vehicle','Boat'=>'Boat','OBM'=>'OBM','Public transport'=>'Public transport']" required/>
            </div> 
            
            <div class="col-md-4">
            <x-forms.textfield  name="remarks" value="" label="Remarks" placeholder="Remarks"/>          
            </div>   
        
        </div>
                
            <x-forms.textfield type=hidden name="user_id" value="{{$admission_by}}" />
            <x-forms.textfield type=hidden name="visit_id" value="{{$visit_id}}" />
            
        </div>         
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <a class="btn btn-secondary" role="button" href="">{{ __('Cancel') }}</a>
        </div>
    
</x-forms.post> 
</div>
</div>
</div>
<!-- end page title -->

</div>




@endsection