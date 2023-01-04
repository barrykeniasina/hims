@extends('hims.admin_master')
@section('emergency')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">

<div class="row">
<div class="col-md-10">  
    <h6 class="mb-sm-0">Manage Outpatient information of:</h6>
</div>
<div class="col-md-2" style="float:right;"> 
    <a href="{{ url('/emergency/admission/createRequest',[$visit->id]) }}" class="btn btn-warning btn-sm">Admit Patient</a>
</div>
</div>
<br/>

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

    
<x-forms.post action="{{route('emergency.visit.update')}}">
<div id="step1" class="tabcontent">
<div class="card card-default">
        <div class="card-body">
            <div class="row">
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
            
            
            <x-forms.textfield type=hidden name="patient_id" value="{{$patient[0]->id}}" />
            <x-forms.textfield type=hidden name="visit_id" value="{{$visit->id}}" />
    


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




            <div class="row">
                <div class="col-md-12">
                    <button id="treatmentsAddRow" class="btn btn-success btn-sm pull-left">+ Add Row</button>
                    <button id='treatmentsDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
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



                        <div class="row">
                            <div class="col-md-12">
                                <button id="vitalsAddRow" class="btn btn-success btn-sm pull-left">+ Add Row</button>
                                <button id='vitalsDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
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



                        <div class="row">
                            <div class="col-md-12">
                                <button id="triagesAddRow" class="btn btn-success btn-sm pull-left">+ Add Row</button>
                                <button id='triagesDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
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


            <p>Wards</p>
                    
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




                <div class="row">
                    <div class="col-md-12">
                        <button id="wardsAddRow" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='wardsDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
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



                <div class="row">
                    <div class="col-md-12">
                        <button id="diagnosisAddRow" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='diagnosisDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
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


                <div class="row">
                    <div class="col-md-12">
                        <button id="prescriptionsAddRow" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                        <button id='prescriptionsDeleteRow' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                    </div>
                </div>
                </div>
                </div>
            </div>
</div>
</div>




        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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


    </script> 

    <script>
      $(document).ready(function(){
        let row_number = {{ count(old('triages', $visit->triages->count() ? $visit->triages : [''])) }};
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


      //Treatments
      $(document).ready(function(){
      let rowCountTreatments = {{ old('treatmentsCount', $visit->treatments()->count() ) }};
            $("#treatmentsAddRow").click(function(e){
                console.log('treatmentsAddRow clicked ' + rowCountTreatments);
                e.preventDefault();
                let new_row_number = rowCountTreatments + 1;
                $('#treatments_table').append('<tr id="treatmentsRow' + new_row_number + '"></tr>');
                $('#treatmentsRow' + new_row_number).html($('#treatmentsTemplate').html());
                rowCountTreatments++;
            });

            $("#treatmentsDeleteRow").click(function(e){
                console.log('treatmentsDeleteRow clicked ' + rowCountTreatments);
                e.preventDefault();
                if(rowCountTreatments > 0){
                    $("#treatmentsRow" + (rowCountTreatments)).remove();
                    rowCountTreatments--;
                }
            });

        });
        //end treatments

      //Vitals
      $(document).ready(function(){
      let rowCountVitals = {{ old('vitalsCount', $visit->vitals()->count() ) }};
            $("#vitalsAddRow").click(function(e){
                console.log('vitalsAddRow clicked ' + rowCountVitals);
                e.preventDefault();
                let new_row_number = rowCountVitals + 1;
                $('#vitals_table').append('<tr id="vitalsRow' + new_row_number + '"></tr>');
                $('#vitalsRow' + new_row_number).html($('#vitalsTemplate').html());
                rowCountVitals++;
            });

            $("#vitalsDeleteRow").click(function(e){
                console.log('vitalsDeleteRow clicked ' + rowCountVitals);
                e.preventDefault();
                if(rowCountVitals > 0){
                    $("#vitalsRow" + (rowCountVitals)).remove();
                    rowCountVitals--;
                }
            });

        });
        //end Vitals

      //triages
      $(document).ready(function(){
      let rowCountTriages = {{ old('triagesCount', $visit->triages()->count() ) }};
            $("#triagesAddRow").click(function(e){
                console.log('triagesAddRow clicked ' + rowCountTriages);
                e.preventDefault();
                let new_row_number = rowCountTriages + 1;
                $('#triages_table').append('<tr id="triagesRow' + new_row_number + '"></tr>');
                $('#triagesRow' + new_row_number).html($('#triagesTemplate').html());
                rowCountTriages++;
            });

            $("#triagesDeleteRow").click(function(e){
                console.log('triagesDeleteRow clicked ' + rowCountTriages);
                e.preventDefault();
                if(rowCountTriages > 0){
                    $("#triagesRow" + (rowCountTriages)).remove();
                    rowCountTriages--;
                }
            });

        });
        //end triages



      //wards
      $(document).ready(function(){
      let rowCountWards = {{ old('wardsCount', $visit->wards()->count() ) }};
            $("#wardsAddRow").click(function(e){
                console.log('wardsAddRow clicked ' + rowCountWards);
                e.preventDefault();
                let new_row_number = rowCountWards + 1;
                $('#wards_table').append('<tr id="wardsRow' + new_row_number + '"></tr>');
                $('#wardsRow' + new_row_number).html($('#wardsTemplate').html());
                rowCountWards++;
            });

            $("#wardsDeleteRow").click(function(e){
                console.log('wardsDeleteRow clicked ' + rowCountWards);
                e.preventDefault();
                if(rowCountWards > 0){
                    $("#wardsRow" + (rowCountWards)).remove();
                    rowCountWards--;
                }
            });

        });
        //end wards



      //diagnosis
      $(document).ready(function(){
      let rowCountDiagnosis = {{ old('diagnosisCount', $visit->diagnosis()->count() ) }};
            $("#diagnosisAddRow").click(function(e){
                console.log('diagnosisAddRow clicked ' + rowCountDiagnosis);
                e.preventDefault();
                let new_row_number = rowCountDiagnosis + 1;
                $('#diagnosis_table').append('<tr id="diagnosisRow' + new_row_number + '"></tr>');
                $('#diagnosisRow' + new_row_number).html($('#diagnosisTemplate').html());
                rowCountDiagnosis++;
            });

            $("#diagnosisDeleteRow").click(function(e){
                console.log('diagnosisDeleteRow clicked ' + rowCountDiagnosis);
                e.preventDefault();
                if(rowCountDiagnosis > 0){
                    $("#diagnosisRow" + (rowCountDiagnosis)).remove();
                    rowCountDiagnosis--;
                }
            });

        });
        //end diagnosis

      //prescriptions
      $(document).ready(function(){
      let rowCountPrescriptions = {{ old('prescriptionsCount', $visit->prescriptions()->count() ) }};
            $("#prescriptionsAddRow").click(function(e){
                console.log('prescriptionsAddRow clicked ' + rowCountPrescriptions);
                e.preventDefault();
                let new_row_number = rowCountPrescriptions + 1;
                $('#prescriptions_table').append('<tr id="prescriptionsRow' + new_row_number + '"></tr>');
                $('#prescriptionsRow' + new_row_number).html($('#prescriptionsTemplate').html());
                rowCountPrescriptions++;
            });

            $("#prescriptionsDeleteRow").click(function(e){
                console.log('prescriptionsDeleteRow clicked ' + rowCountPrescriptions);
                e.preventDefault();
                if(rowCountPrescriptions > 0){
                    $("#prescriptionsRow" + (rowCountPrescriptions)).remove();
                    rowCountPrescriptions--;
                }
            });

        });
        //end prescriptions



    </script>
@endsection