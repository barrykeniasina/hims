@extends('hims.admin_master')
@section('emergency')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h6 class="mb-sm-0">Edit admission for:</h6>
   
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
<!-- Tab links -->
<div class="tab2">
  <button class="tablinks2" onclick="openCity2(event, 'EditAdmission')" id="defaultOpen2">Edit Admission</button>
  <button class="tablinks2" onclick="openCity2(event, 'VisitRecord')">Visit Record</button>

</div>
<!-- Tab content -->
<x-forms.post action="{{ route('updateIncomingRequest.update') }}">
<div id="EditAdmission" class="tabcontent2">

    <div class="card card-default">
        <div class="card-body" >
  
        <div class="row">
            <div class="col-md-4" style="display:none;">
            <x-forms.select-from-pluck id="type1" name="type"  label="Type" value="{{$visit_admission->type}}" :options="['New Admission' => 'New Admission', 'Transfer'=>'Transfer']" />
            </div>
            <div class="col-md-4">
            <x-forms.textfield id="type2" name="type"  label="Type" value="" />
            </div>

            <div class="col-md-4" style="display:none;">
            <x-forms.select-from-pluck id='ref_from1' type=hidden name="refered_from"  label="Refered from" value="{{$visit_admission->refered_from}}" :options="$current_ward" />
            </div>
            <div class="col-md-4">
            <x-forms.textfield id='ref_from2' name="refered_from"  label="Refered from" value=""  readonly="readonly"/>
            </div>

            <div class="col-md-4">
            <x-forms.select-from-pluck name="tranfered_to"  label="Transfered to" value="{{$visit_admission->ward_id}}" :options="$wards" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <x-forms.select-from-pluck name="doctor_incharge"  label="Doctor in-charge" value="{{$visit_admission->user_id}}" :options="$users" />
            </div>

            <div class="col-md-4">
            <x-forms.select-from-pluck name="transport"  label="Transport used" value="{{$visit_admission->transport}}" :options="['Car' => 'Car', 'Utility Vehicle'=>'Utility Vehicle','Boat'=>'Boat','OBM'=>'OBM','Public transport'=>'Public transport']" />
            </div> 
            
            <div class="col-md-4">
            <x-forms.textfield  id="remark" name="remarks" value="{{$visit_admission->remarks}}" label="Remarks" placeholder="Remarks" />          
            </div>   
        </div>
        <div class="row">

            <div class="col-md-4">
            <x-forms.select-from-pluck name="approved"  label="Approved" value="{{$visit_admission->approved}}" :options="['Pending' => 'Pending', 'Rejected'=>'Rejected', 'Yes'=>'Yes']" required/>
            </div>
            <div class="col-md-4">
            <x-forms.select-from-pluck name="bed_id"  label="Bed" value="{{$visit_admission->bed_id}}" :options="$beds" required/>
            </div> 
          
        </div>               
            <x-forms.textfield type=hidden name="user_id" value="{{$admission_by}}" />
            <x-forms.textfield type=hidden name="visit_id" value="{{$visit_id}}" />
            
        </div>  
        </div>   
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            <a class="btn btn-secondary" role="button" href="{{route('emergency_admission_incoming_request.list')}}">{{ __('Cancel') }}</a>
        </div>    
    </div>
    <div id="VisitRecord" class="tabcontent2">
    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Visit details</p> 
                <div class="col-md-4">                    
                    <x-forms.textfield type=date name="visitdate" label="Visit Date"   value="{{ $visit->visitdate->format('Y-m-d') }}"  required/>
                </div>
                <div class="col-md-4">
                    <x-forms.select-from-pluck name="category"  label="category" value="{{$visit->category}}" :options="['New Patient' => 'New Patient', 'Sheduled Return' => 'Shedule Return (Review)','Unsheduled Return' => 'Unsheduled Return', 'Referral' => 'Referral']" required/>
                </div>
          
                <div class="col-md-4">                    
                        <x-forms.textarea name="complaint" label="Complaint/Incident" value="{{$visit->complaint}}"  required/>
                </div>           
            
     </div>
    </div>
    </div>



    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Treatment history</p> 


<table class="table" id="treatments_table">
    <thead>
    </thead>
    <tbody>
    <tr id="treatmentsTemplate" class="d-none">
        <td>
            <input type="textfield" name="treatments[]" class="form-control" value="" placeholder="Treatment"/>
        </td>

        <td>
        </td>
        <td>
        </td>
    </tr>
    @foreach (($visit->treatments) as $treatment)

        <tr id="treatmentsRow{{ $loop->index + 1}}">

            <td>
                <input type="textfield" name="treatments[]" class="form-control" value="{{ (old('treatments.' . $loop->index) ?? $treatment->detail)  }}" placeholder="Treatment"/>
            </td>

        </tr>
    @endforeach

    </tbody>
</table>      
            
     </div>
    </div>
    </div>





    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Vitals</p>  

<table class="table" id="vitals_table">
        <thead>
        </thead>
        <tbody>
        <tr id="vitalsTemplate" class="d-none">
            <td>
                <input type="textfield" name="vitals[]" class="form-control" value="" placeholder="Vitals"/>
            </td>

            <td>
            </td>
            <td>
            </td>
        </tr>
        @foreach (($visit->vitals) as $vital)

            <tr id="vitalsRow{{ $loop->index + 1}}">

                <td>
                    <input type="textfield" name="vitals[]" class="form-control" value="{{ (old('vitals.' . $loop->index) ?? $vital->vital_detail)  }}" placeholder="Vitals"/>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table> 
            
     </div>
    </div>
    </div>





    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Triage Category</p>
                    
                    <table class="table" id="triages_table">
                        <thead>
                        </thead>
                        <tbody>
                        <tr id="triagesTemplate" class="d-none">
                            <td>
                                <x-forms.select-from-pluck name="triages[]" class="form-control" value="" :options="$triages" placeholder="triages"/>
                            </td>

                        </tr>

                        @foreach (($visit->triages) as $triage)

                            <tr id="triagesRow{{ $loop->index + 1}}">

                                <td>
                                    <x-forms.select-from-pluck name="triages[]"  value="{{ $triage->id }}" :options="$triages" placeholder="triages"/>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
            
     </div>
    </div>
    </div>


    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Internal Ward history</p>
                    
                    <table class="table" id="wards_table">
                        <thead>
                        </thead>
                        <tbody>
                        <tr id="wardsTemplate" class="d-none">
                            <td>
                                <x-forms.select-from-pluck name="wards[]" value="" :options="$wards" placeholder="wards"/>
                            </td>
                            <td>
                                    <x-forms.textarea name="details[]"  value="" placeholder="wards"/>
                                </td>
                        </tr>

                        @foreach (($visit->wards) as $ward)

                            <tr id="wardsRow{{ $loop->index + 1}}">

                                <td>
                                    <x-forms.select-from-pluck name="wards[]"  value="{{ $ward->ward_id }}" :options="$wards" placeholder="wards"/>
                                </td>

                                <td>
                                    <x-forms.textarea name="details[]"  value="{{ $ward->detail }}" placeholder="wards"/>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
            
     </div>
    </div>
    </div>





    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Diagnosis</p> 
            
            <table class="table" id="diagnosis_table">
                <thead>
                </thead>
                <tbody>
                <tr id="diagnosisTemplate" class="d-none">
                    <td width="33%">
                        <x-forms.select-from-pluck name="icds[]" value="" :options="$icds" placeholder="Icd code"/>
                    </td>
                    <td width="33%">
                        <x-forms.select-from-pluck name="types[]" value="" :options="['Principal' => 'Principal', 'Provisional' => 'Provisional']" placeholder="type"/>
                    </td>
                    <td width="33%">
                        <x-forms.select-from-pluck name="categories[]" value="" :options="['Primary' => 'Primary', 'Additional' => 'Additional']" placeholder="category"/>
                    </td>
                </tr>

                @foreach (($visit->diagnosis) as $diagnosis)

                    <tr id="diagnosisRow{{ $loop->index + 1}}">

                        <td width="33%">
                            <x-forms.select-from-pluck name="icds[]"  value="{{$diagnosis->icd_id }}" :options="$icds" placeholder="Icd code"/>
                        </td>

                        <td width="33%">
                            <x-forms.select-from-pluck name="types[]" value="{{$diagnosis->type }}" :options="['Principal' => 'Principal', 'Provisional' => 'Provisional']" placeholder="type" required/>
                        </td>

                        <td width="33%">
                            <x-forms.select-from-pluck name="categories[]" value="{{$diagnosis->category}}" :options="['Primary' => 'Primary', 'Additional' => 'Additional']" placeholder="category" required/>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>  
            
     </div>
    </div>
    </div>

    <div class="card card-default">
    <div class="card-body" >
    <div class="row">
    <p>Prescriptions</p>   
            
            <table class="table" id="prescriptions_table">
                    <thead>
                    </thead>
                    <tbody>
                    <tr id="prescriptionsTemplate" class="d-none">
                        <td width="33%">
                            <x-forms.select-from-pluck name="medications[]" value="" :options="$medications" placeholder="Icd code"/>
                        </td>
                        <td width="33%">
                            <x-forms.textfield type="number" name="dosages[]" value="" placeholder="type"/>
                        </td>
                        <td width="33%">
                            <x-forms.textarea name="instructions[]" value="" placeholder="category"/>
                        </td>
                    </tr>

                    @foreach (($visit->prescriptions) as $prescription)

                        <tr id="prescriptionsRow{{ $loop->index + 1}}">

                            <td width="33%">
                                <x-forms.select-from-pluck name="medications[]" value="{{$prescription->id}}" :options="$medications" placeholder="Icd code"/>
                            </td>
                            <td width="33%">
                                <x-forms.textfield type="number" name="dosages[]" value="{{$prescription->dosage}}" placeholder="dosage"/>
                            </td>
                            <td width="33%">
                                <x-forms.textarea name="instructions[]" value="{{$prescription->instructions}}" placeholder="instruction"/>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>       
            
     </div>
    </div>
    </div>




</div>

    
</x-forms.post> 
</div>
</div>
</div>
<!-- end page title -->

</div>




@endsection