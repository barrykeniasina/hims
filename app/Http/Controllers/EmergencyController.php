<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Triage;
use App\Models\Ward;
use App\Models\Visit_diagnosis;
use App\Models\Icd;
use App\Models\Visit_prescription;
use App\Models\Medication;
use App\Models\Visit_treatment;
use App\Models\Visit_ward;
use App\Models\Lab;
use App\Models\Result;


class EmergencyController extends Controller
{
    public function index()
    {
        //$patients = Patient::all();
        return view('hims.emergency.list');
    }
    public function visitlist()
    {
        //$patients = Patient::all();
        return view('hims.emergency.visitlist');
    }
    public function resuslist()
    {
        //$patients = Patient::all();
        return view('hims.emergency.resus.list');
    }
    public function acutelist()
    {
        //$patients = Patient::all();
        return view('hims.emergency.acute.list');
    }
    public function create()
    {
        $triages = Triage::all();
        $wards = Ward::all();
        
        //dd($triages);
        return view('hims.emergency.create')
        ->with(['triages'=> $triages])
        ->with(['wards'=> $wards]);
    }

    public function visit($id)
    {
        $triages = Triage::all();
        $patient = Patient::find($id);

        $id = Auth::user()->id;
        $wards = User::query()
        ->join('departments','departments.id','=','users.user_department_id')       
        ->join('wards','wards.department_id','=','departments.id')
        ->select('wards.*')
        ->where('users.id','=', $id)
        ->where('wards.type','=', 'Out-patient')
        ->get()
        ;
        $visit_diagnosis = Visit_diagnosis::all();
        $icds = Icd::all();
        $medications = Medication::all();
        //dd($patient);
        return view('hims.emergency.create',compact('patient'))
        ->with(['triages'=> $triages])
        ->with(['wards'=> $wards])
        ->with(['visit_diagnosis'=> $visit_diagnosis])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])
        ;
    }

    public function triage($id)
    {
        
        $visit = Visit::find($id);
        $triages = Triage::all();

        //dd($visit);

        $patient = Visit::query()
        ->join('patients','patients.id','=','visits.patient_id')       
        ->select('patients.*')
        ->where('visits.id','=', $id)
        ->first()
        ;

        //dd($patient);

        return view('hims.emergency.createaction',compact('patient'))->with(['triages'=> $triages]);
    }


    public function edit($id)
    {
        //dd($id);
        $visit = Visit::find($id);

        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')    
        ->where('visits.id','=',$id)  
        ->select('patients.*')
        ->get()
        ;

        $user_id = Auth::user()->id;
        $wards = User::query()
        ->join('departments','departments.id','=','users.user_department_id')       
        ->join('wards','wards.department_id','=','departments.id')
        ->where('users.id','=', $user_id)
        ->where('wards.type','=', 'Out-patient')
        ->pluck('wards.ward_detail', 'wards.id')
        ;

        $lab_results = Visit::query()
        ->join('labs','labs.visit_id','=','visits.id')       
        //->join('departments','visits.department_id','=','departments.id')
        //->join('wards','wards.department_id','=','departments.id')
        ->join('results','labs.result_id','=','results.id')
        ->where('visits.id','=', $id)
        ->select('labs.*','results.*')
        ->get()
        ;

       // dd($visit);

        $triages = Triage::pluck('triage_desc', 'id');

        $icds = Icd::pluck('description','id');
        $medications = Medication::pluck('drug_name','id');
        $treatments = Visit_treatment::all();
        $visit_prescriptions = Visit_prescription::all();
        $visit_wards = Visit_ward::all();

        //dd($visit_prescriptions[0]->unit);

        return view('hims.emergency.edit',compact('triages'))
        ->with(['visit'=> $visit])
        ->with(['patient'=> $patient])
        ->with(['wards'=> $wards])
        ->with(['triages'=> $triages])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])  
        ->with(['treatments'=> $treatments]) 
        ->with(['visit_prescriptions'=> $visit_prescriptions])  
        ->with(['visit_wards'=> $visit_wards]) 
        ->with(['lab_results'=> $lab_results])   
        
        ;
    }

   

    public function store(Request $request)
    {
        

        $id = Auth::user()->id;
        $department_id = User::query()
        ->join('departments','departments.id','=','users.user_department_id')       
        ->select('departments.id as department')
        ->where('users.id','=', $id)
        ->get()
        ;




        //visit details
        $depid_arr = $department_id->pluck('department');


            $request->validate([  

                'visitdate'=>'nullable|max:50', 
                'patient_id'=>'nullable|max:50', 
                'department_id'=>'nullable|max:50', 
                'entered_by'=>'nullable|max:50', 
                'category'=>'max:50', 
                'complaint'=>'max:500', 
                'discharge_date'=>'nullable|max:50',
                'review_date'=>'nullable|max:50',

            ]);
           
            Visit::create([
    
                'visitdate'=>request('visitdate'),      
                'patient_id'=>request('patient_id'), 
                'department_id'=>$depid_arr[0], 
                'entered_by'=>$id, 
                'category'=>request('category'), 
                'complaint'=>request('complaint'),
                'discharge_date'=>request('discharge_date'),
                'review_date'=>request('review_date'),                
         
            ]);

            //get last visit of patient
            $visit=Patient::query()
            ->join('visits','visits.patient_id','=','patients.id')
            ->where('patients.id','=', $request->patient_id)
            ->select('visits.id')->orderBy('visits.created_at', 'desc')->first();

            //find the visit
            $newVisit=Visit::findOrFail($visit->id);

            //insert treatments
            $treatments = $request->input('treatments', []);
            for ($i = 0; $i < count($treatments); $i++){
                
                if ($treatments[$i] != '') {
                    $newVisit->treatments()->create([

                        'detail' => $treatments[$i],

                    ]);
                }
                
            }

            
            //insert vitals
            $vitals = $request->input('vitals', []);
            for ($i = 0; $i < count($vitals); $i++){
                
                if ($vitals[$i ] != '') {
                    $newVisit->vitals()->create([

                        'vital_detail' => $vitals[$i],

                    ]);
                }
                
            }

            //insert triage
            $triages = $request->input('triages', []);
    
            for ($triage=0; $triage < count($triages); $triage++) {
                if ($triages[$triage] != '') {
    
                    $newVisit->triages()->attach($triages[$triage]);
                }
            }

            //insert ward 
            $wards = $request->input('wards', []);
            $details = $request->input('details', []);
                        
            for ($i = 0; $i < count($wards); $i++){
                
                if ($wards[$i] != '') {

                    $newVisit->wards()->create([

                        'ward_id' => $wards[$i],
                        'detail' => $details[$i],

                    ]);
                }
                
            }

                //diagnosis
                $icds = $request->input('icds', []);
                $types = $request->input('types', []);
                $categories = $request->input('categories', []);
                //dd($categories); 
                for ($i = 0; $i < count($icds); $i++){
                    
                    if ($icds[$i] != '') {
    
                        $newVisit->diagnosis()->create([
    
                            'type' => $types[$i],
                            'category' => $categories[$i],
                            'icd_id' => $icds[$i],
    
                        ]);
                    }
                    
                }  

            //prescription
            $medications = $request->input('medications', []);
            $dosages = $request->input('dosages', []);
            $units = $request->input('units', []);
            $instructions = $request->input('instructions', []);
                        
            for ($i = 0; $i < count($medications); $i++){
                
                if ($medications[$i ] != '') {

                    $newVisit->prescriptions()->create([

                        'medication_id' => $medications[$i],
                        'dosage' => $dosages[$i],
                        //'unit' => $units[$i],
                        'instructions' => $instructions[$i],

                    ]);
                }
                
            }           


            //lab
            
            $lab_type = $request->input('lab_type', []);
            $spec_type = $request->input('spec_type', []);
            $priority = $request->input('priority', []);
            $clinical_notes = $request->input('clinical_notes', []);
                        
            for ($i = 0; $i < count($lab_type); $i++){
                
                if ($lab_type[$i ] != '') {

                    $newVisit->labs()->create([

                        'lab_type' => $lab_type[$i],
                        'spec_type' => $spec_type[$i],
                        'priority' => $priority[$i],
                        'clinical_notes' => $clinical_notes[$i],

                    ]);
                }
                
            }  


            $triage=Patient::query()
            ->join('visits','visits.patient_id','=','patients.id')
            ->join('triage_visit','triage_visit.visit_id','=','visits.id')
            ->join('triages','triage_visit.triage_id','=','triages.id')
            ->where('patients.id','=', $request->patient_id)
            ->select('triages.triage_desc')->orderBy('triage_visit.id', 'desc')->first();      

            $ward=Patient::query()
            ->join('visits','visits.patient_id','=','patients.id')
            ->join('visit_wards','visit_wards.visit_id','=','visits.id')
            ->join('wards','visit_wards.ward_id','=','wards.id')
            ->where('patients.id','=', $request->patient_id)
            ->select('wards.ward_detail')->orderBy('wards.id', 'desc')->first();                

            //dd( $request->patient_id);

            DB::table('visits')
            ->where('visits.id', '=',$visit->id)
            ->update([
                'triage_taken'=>'Yes',
                'triage' => $triage->triage_desc,
            ]);


            DB::table('visits')
            ->where('visits.id', '=',$visit->id)
            ->update([
                'ward' => $ward->ward_detail,
            ]);

            return redirect('/emergency/visit');
    }

   public function update(Request $request)
    {
        //dd($request->visit_id);
        $id = Auth::user()->id;
        $department_id = User::query()
        ->join('departments','departments.id','=','users.user_department_id')       
        ->select('departments.id as department')
        ->where('users.id','=', $id)
        ->get()
        ;

       //find the visit
       $newVisit=Visit::findOrFail($request->visit_id);

       

        //visit details
        $depid_arr = $department_id->pluck('department');


            $request->validate([  

                'visitdate'=>'nullable|max:50', 
                'patient_id'=>'nullable|max:50', 
                'department_id'=>'nullable|max:50', 
                'entered_by'=>'nullable|max:50', 
                'category'=>'max:50', 
                'complaint'=>'max:500', 
                'discharge_date'=>'nullable|max:50',
                'review_date'=>'nullable|max:50',

            ]);
           
            $newVisit->update();

            //dd($newVisit);


            //insert treatments
            $newVisit->treatments()->delete();
            $treatments = $request->input('treatments', []);
            for ($i = 0; $i < count($treatments); $i++){
                
                if ($treatments[$i] != '') {
                    $newVisit->treatments()->create([

                        'detail' => $treatments[$i],

                    ]);
                }
                
            }

            
            //insert vitals
            $newVisit->vitals()->delete();
            $vitals = $request->input('vitals', []);
            for ($i = 0; $i < count($vitals); $i++){
                
                if ($vitals[$i ] != '') {
                    $newVisit->vitals()->create([

                        'vital_detail' => $vitals[$i],

                    ]);
                }
                
            }

            //insert triage
            $newVisit->triages()->detach();
            $triages = $request->input('triages', []);
    
            for ($triage=0; $triage < count($triages); $triage++) {
                if ($triages[$triage] != '') {
    
                    $newVisit->triages()->attach($triages[$triage]);
                }
            }

            //insert ward
            $newVisit->wards()->delete(); 
            $wards = $request->input('wards', []);
            $details = $request->input('details', []);
                        
            for ($i = 0; $i < count($wards); $i++){
                
                if ($wards[$i] != '') {

                    $newVisit->wards()->create([

                        'ward_id' => $wards[$i],
                        'detail' => $details[$i],

                    ]);
                }
                
            }

            //diagnosis
            $newVisit->diagnosis()->delete();
                $icds = $request->input('icds', []);
                $types = $request->input('types', []);
                $categories = $request->input('categories', []);
                   //dd($categories);   
                for ($i = 0; $i < count($icds); $i++){
                    
                    if ($icds[$i] != '') {
    
                        $newVisit->diagnosis()->create([
    
                            'type' => $types[$i],
                          //  'category' => $categories[$i],
                            'icd_id' => $icds[$i],
    
                        ]);
                    }
                    
                }  

            //prescription
            $newVisit->prescriptions()->delete();
            $medications = $request->input('medications', []);
            $dosages = $request->input('dosages', []);
            $units = $request->input('units', []);
            $instructions = $request->input('instructions', []);
                        
            for ($i = 0; $i < count($medications); $i++){
                
                if ($medications[$i ] != '') {

                    $newVisit->prescriptions()->create([

                        'medication_id' => $medications[$i],
                        'dosage' => $dosages[$i],
                        //'unit' => $units[$i],
                        'instructions' => $instructions[$i],

                    ]);
                }
                
            } 
            //lab       
            $newVisit->labs()->delete();   
            $lab_type = $request->input('lab_type', []);
            $spec_type = $request->input('spec_type', []);
            $priority = $request->input('priority', []);
            $clinical_notes = $request->input('clinical_notes', []);
                        
            for ($i = 0; $i < count($lab_type); $i++){
                
                if ($lab_type[$i ] != '') {

                    $newVisit->labs()->create([

                        'lab_type' => $lab_type[$i],
                        'spec_type' => $spec_type[$i],
                        'priority' => $priority[$i],
                        'clinical_notes' => $clinical_notes[$i],

                    ]);
                }
                
            } 

            $triage=Patient::query()
            ->join('visits','visits.patient_id','=','patients.id')
            ->join('triage_visit','triage_visit.visit_id','=','visits.id')
            ->join('triages','triage_visit.triage_id','=','triages.id')
            ->where('patients.id','=', $request->patient_id)
            ->select('triages.triage_desc')->orderBy('triage_visit.id', 'desc')->first();      

            $ward=Patient::query()
            ->join('visits','visits.patient_id','=','patients.id')
            ->join('visit_wards','visit_wards.visit_id','=','visits.id')
            ->join('wards','visit_wards.ward_id','=','wards.id')
            ->where('patients.id','=', $request->patient_id)
            ->select('wards.ward_detail')->orderBy('wards.id', 'desc')->first();                

            

            DB::table('visits')
            ->where('visits.id', '=',$request->visit_id)
            ->update([
                'triage_taken'=>'Yes',
                'triage' => $triage->triage_desc,
            ]);


            DB::table('visits')
            ->where('visits.id', '=',$request->visit_id)
            ->update([
                'ward' => $ward->ward_detail,
            ]);

            

            return redirect('/emergency/visit');

    }

    public function destroy($id)
    {
        $donors = Donor::findOrFail($id);
        $donors->delete();

        return redirect('/donor');

    }

}
