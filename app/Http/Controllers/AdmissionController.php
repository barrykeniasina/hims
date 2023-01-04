<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Patient;
use App\Models\Ward;
use App\Models\User;
use App\Models\Visit_admission;
use App\Models\Visit;
use App\Models\Bed;
use App\Models\Triage;
use App\Models\Icd;
use App\Models\Medication;
use App\Models\Visit_treatment;
use App\Models\Visit_prescription;
use App\Models\Visit_ward;
use App\Models\Visit_diagnosis;



use Auth;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{


    public function emergency_admission_request()
    {
        return view('hims.emergency.list_visit_admission_request');
    }
    public function emergency_admission_incoming_request()
    {
        return view('hims.emergency.list_admission_incoming_request');
    }

    public function internal_medicine_admission_OutgoingRequest()
    {
        return view('hims.internal_medicine.list_internal_medicine_outgoing_request');
    }

    public function internal_medicine_admission_request()
    {
        return view('hims.internal_medicine.list_internal_medicine_request');
    }
    
    

    public function visit($id)
    {
        $triages = Triage::all();
        $patient = Patient::find($id);
        $wards = Ward::all();
        $visit_diagnosis = Visit_diagnosis::all();
        $icds = Icd::all();
        $medications = Medication::all();
        //dd($patient);
        return view('hims.admission.create',compact('patient'))
        ->with(['triages'=> $triages])
        ->with(['wards'=> $wards])
        ->with(['visit_diagnosis'=> $visit_diagnosis])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])
        ;
    }


    public function createRequest($id)
    {
        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')       
        ->select('patients.fname','patients.dob')
        ->where('visits.id','=', $id)
        ->get()
        ;
        $visit_id=$id;
        $visit = Visit::find($id);

        $curr_ward=Visit_admission::query()
        ->join('users as b', 'visit_admissions.admission_by','=', 'b.id')
        ->join('users as c', 'visit_admissions.user_id','=', 'c.id')
        ->join('wards as d','visit_admissions.refered_from','=','d.id') 
        ->join('wards as e','visit_admissions.ward_id','=','e.id')   
        ->join('visits','visit_admissions.visit_id','=','visits.id') 
        ->join('patients','visits.patient_id','=','patients.id')  
        ->join('departments','e.department_id','=','departments.id')      
        ->select(

            'e.ward_detail as ward_to',
          
            )
            
           // ->where('visits.id','=',$visit_id)
            ->orderby('visit_admissions.created_at','DESC')
            ->get()
        ;
       // dd($curr_ward[0]->ward_to);

        $current_ward = Ward::where('ward_detail',$visit->ward)->pluck('ward_detail','id');



        $wards = Ward::pluck('ward_detail','id');
        $users = User::pluck('name','id');
        
        $admission_by = Auth::user()->id;

        return view('hims.admission.createRequest')
        ->with(['patient'=> $patient])
        ->with(['admission_by'=> $admission_by]) 
        ->with(['wards'=> $wards])
        ->with(['users'=> $users])
        ->with(['visit_id'=> $visit_id])
        ->with(['visit'=> $visit])
        ->with(['current_ward'=> $current_ward])
        ;
    }

    public function createInternalMedicineRequest($id)
    {
        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')       
        ->select('patients.fname','patients.dob')
        ->where('visits.id','=', $id)
        ->get()
        ;
        $visit_id=$id;
        $visit = Visit::find($id);
        $current_ward = Ward::where('ward_detail',$visit->ward)->pluck('ward_detail','id');
        $wards = Ward::pluck('ward_detail','id');
        $users = User::pluck('name','id');
        
        $admission_by = Auth::user()->id;

        return view('hims.admission.createInternalMedicineRequest')
        ->with(['patient'=> $patient])
        ->with(['admission_by'=> $admission_by]) 
        ->with(['wards'=> $wards])
        ->with(['users'=> $users])
        ->with(['visit_id'=> $visit_id])
        ->with(['visit'=> $visit])
        ->with(['current_ward'=> $current_ward])
        ;
    }

    public function editRequest($id)
    {

        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')       
        ->select('patients.fname','patients.dob')
        ->where('visits.id','=', $id)
        ->get()
        ;
        
        $triages = Triage::pluck('triage_desc', 'id');
        $icds = Icd::pluck('description','id');
        $medications = Medication::pluck('drug_name','id');
        $treatments = Visit_treatment::all();
        $visit_prescriptions = Visit_prescription::all();
        $visit_wards = Visit_ward::all();


        $visit_id=$id;

        $visit_admission = Visit_admission::find($id);

        $visit = Visit::find($id);

        $current_ward = Ward::where('ward_detail',$visit->ward)->pluck('ward_detail','id');
        $wards = Ward::pluck('ward_detail','id');
        $users = User::pluck('name','id');
        
        $admission_by = Auth::user()->id;

        //bed query
        $user_department = User::find($admission_by);


        $beds = Bed::query()
        ->join('wards','beds.ward_id','=','wards.id')  
        ->join('departments','wards.department_id','=','departments.id')  
        ->where('departments.id','=',$user_department->user_department_id)
        //->whereNotIn('beds.id',DB::table('visit_admissions')->pluck('visit_admissions.bed_id'))
        ->pluck('beds.code','beds.id')
        ;

        return view('hims.internal_medicine.editRequest')

        ->with(['patient'=> $patient])
        ->with(['admission_by'=> $admission_by]) 
        ->with(['wards'=> $wards])
        ->with(['users'=> $users])
        ->with(['visit_id'=> $visit_id])
        ->with(['visit'=> $visit])
        ->with(['current_ward'=> $current_ward]) 
        ->with(['visit_admission'=> $visit_admission])
        ->with(['triages'=> $triages])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])
        ->with(['treatments'=> $treatments])
        ->with(['visit_prescriptions'=> $visit_prescriptions])
        ->with(['visit_wards'=> $visit_wards])
        ->with(['beds'=> $beds])      
        ;
    }

    
    public function emergency_admission_incoming_request_edit($id)
    {

        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')       
        ->select('patients.fname','patients.dob')
        ->where('visits.id','=', $id)
        ->get()
        ;
        
        $triages = Triage::pluck('triage_desc', 'id');
        $icds = Icd::pluck('description','id');
        $medications = Medication::pluck('drug_name','id');
        $treatments = Visit_treatment::all();
        $visit_prescriptions = Visit_prescription::all();
        $visit_wards = Visit_ward::all();


        $visit_id=$id;

        $visit_admission = Visit_admission::find($id);

        $visit = Visit::find($id);

        $current_ward = Ward::where('ward_detail',$visit->ward)->pluck('ward_detail','id');
        $wards = Ward::pluck('ward_detail','id');
        $users = User::pluck('name','id');
        
        $admission_by = Auth::user()->id;

        //bed query
        $user_department = User::find($admission_by);


        $beds = Bed::query()
        ->join('wards','beds.ward_id','=','wards.id')  
        ->join('departments','wards.department_id','=','departments.id')  
        ->where('departments.id','=',$user_department->user_department_id)
        //->whereNotIn('beds.id',DB::table('visit_admissions')->pluck('visit_admissions.bed_id'))
        ->pluck('beds.code','beds.id')
        ;

        return view('hims.emergency.editIncomingRequest')

        ->with(['patient'=> $patient])
        ->with(['admission_by'=> $admission_by]) 
        ->with(['wards'=> $wards])
        ->with(['users'=> $users])
        ->with(['visit_id'=> $visit_id])
        ->with(['visit'=> $visit])
        ->with(['current_ward'=> $current_ward]) 
        ->with(['visit_admission'=> $visit_admission])
        ->with(['triages'=> $triages])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])
        ->with(['treatments'=> $treatments])
        ->with(['visit_prescriptions'=> $visit_prescriptions])
        ->with(['visit_wards'=> $visit_wards])
        ->with(['beds'=> $beds])      
        ;
    }
    public function displayVisit($id)
    {

        $visit = Visit::find($id);

        $patient = Patient::query()
        ->join('visits','visits.patient_id','=','patients.id')    
        ->where('visits.id','=',$id)  
        ->select('patients.*')
        ->get()
        ;

        $wards = Ward::pluck('ward_detail', 'id');

        $triages = Triage::pluck('triage_desc', 'id');

        $icds = Icd::pluck('description','id');
        $medications = Medication::pluck('drug_name','id');
        $treatments = Visit_treatment::all();
        $visit_prescriptions = Visit_prescription::all();
        $visit_wards = Visit_ward::all();



        return view('hims.admission.displayVisit',compact('triages'))
        ->with(['visit'=> $visit])
        ->with(['patient'=> $patient])
        ->with(['wards'=> $wards])
        ->with(['triages'=> $triages])
        ->with(['icds'=> $icds])
        ->with(['medications'=> $medications])  
        ->with(['treatments'=> $treatments]) 
        ->with(['visit_prescriptions'=> $visit_prescriptions])  
        ->with(['visit_wards'=> $visit_wards]);   
    }
    public function delete($id)
    {

        $sectors = Sector::find($id);
        
        return view('admin.sectors.delete',compact('sectors'));
    }

    public function storeRequest(Request $request)
    {
            //find the visit


            $request->validate([  
                'type'=>'required|max:255|min:1', 
                'refered_from'=>'required|max:50|min:1', 
                'tranfered_to'=>'required|max:50|min:1', 
                'doctor_incharge'=>'required|max:50|min:1', 
                'transport'=>'required|max:50|min:1', 
                'user_id'=>'required|max:50|min:1', 
                'visit_id'=>'required|max:50|min:1',
                'approved'=>'nullable|max:50',
                'remarks'=>'required|max:255|min:1', 
            ]);
     

            Visit_admission::create([
    
                'visit_id'=>request('visit_id'), 
                'type'=>request('type'),  
                'admission_by'=>request('user_id'),
                'refered_from'=>request('refered_from'), 
                'ward_id'=>request('tranfered_to'), 
                'user_id'=>request('doctor_incharge'), 
                'transport'=>request('transport'),                  
                'remarks'=>request('remarks'), 
                'approved'=>'Pending',             
            ]);

            $id = Auth::user()->id;

            $user_department = User::query()
            ->join('departments','departments.id','=','users.user_department_id')       
            ->join('wards','wards.department_id','=','departments.id')
            ->where('users.id','=', $id)
            ->pluck('departments.department_desc')
            ;

            $transfer_department = User::query()
            ->join('departments','departments.id','=','users.user_department_id')       
            ->join('wards','wards.department_id','=','departments.id')
            ->where('wards.id','=', $request->tranfered_to)
            ->pluck('departments.department_desc')

            ;

            if($transfer_department[0] == $user_department[0])
            {
                return redirect('/emergency/admission/IncomingRequestList');
            }  

            return redirect('/emergency/admission/requestList/');
    }
    public function storeInternalMedicineRequest(Request $request)
    {
            //find the visit


            $request->validate([  
                'type'=>'required|max:255|min:1', 
                'refered_from'=>'required|max:50|min:1', 
                'tranfered_to'=>'required|max:50|min:1', 
                'doctor_incharge'=>'required|max:50|min:1', 
                'transport'=>'required|max:50|min:1', 
                'user_id'=>'required|max:50|min:1', 
                'visit_id'=>'required|max:50|min:1',
                'approved'=>'nullable|max:50',
                'remarks'=>'required|max:255|min:1', 
            ]);

      

            Visit_admission::create([
    
                'visit_id'=>request('visit_id'), 
                'type'=>request('type'),  
                'admission_by'=>request('user_id'),
                'refered_from'=>request('refered_from'), 
                'ward_id'=>request('tranfered_to'), 
                'user_id'=>request('doctor_incharge'), 
                'transport'=>request('transport'),                  
                'remarks'=>request('remarks'), 
                'approved'=>'Pending',             
            ]);
            $id = Auth::user()->id;

            $user_department = User::query()
            ->join('departments','departments.id','=','users.user_department_id')       
            ->join('wards','wards.department_id','=','departments.id')
            ->where('users.id','=', $id)
            ->pluck('departments.department_desc')
            ;

            $transfer_department = User::query()
            ->join('departments','departments.id','=','users.user_department_id')       
            ->join('wards','wards.department_id','=','departments.id')
            ->where('wards.id','=', $request->tranfered_to)
            ->pluck('departments.department_desc')

            ;

            if($transfer_department[0] == $user_department[0])
            {
                return redirect('/internal_medicine/admission/requestList/');
            }   

            return redirect('/internal_medicine/admission/OutgoingRequestList');
    }

   public function updateRequest(Request $request)
    {

        //dd($request->bed_id);

        $visit_admission=Visit_admission::findOrFail($request->visit_id);
/*
        $request->validate([  
            'type'=>'required|max:255|min:1', 
            'refered_from'=>'required|max:50|min:1', 
            'tranfered_to'=>'required|max:50|min:1', 
            'doctor_incharge'=>'required|max:50|min:1', 
            'transport'=>'required|max:50|min:1', 
            'user_id'=>'required|max:50|min:1',
            'bed_id'=>'nullable|max:50|min:1',  
            'visit_id'=>'required|max:50|min:1',
            'approved'=>'nullable|max:50',
            'remarks'=>'required|max:255|min:1', 
        ]);
*/
        //$input = $request->except(['visit_id']);

        $visit_admission->approved = $request->approved;
        $visit_admission->bed_id = $request->bed_id;
        $visit_admission->save();
        
        //$visit_admission->update($input);
     
        return redirect('/internal_medicine/admission/requestList/');
    }
    public function updateIncomingRequest(Request $request)
    {

        //dd($request->bed_id);

        $visit_admission=Visit_admission::findOrFail($request->visit_id);
/*
        $request->validate([  
            'type'=>'required|max:255|min:1', 
            'refered_from'=>'required|max:50|min:1', 
            'tranfered_to'=>'required|max:50|min:1', 
            'doctor_incharge'=>'required|max:50|min:1', 
            'transport'=>'required|max:50|min:1', 
            'user_id'=>'required|max:50|min:1',
            'bed_id'=>'nullable|max:50|min:1',  
            'visit_id'=>'required|max:50|min:1',
            'approved'=>'nullable|max:50',
            'remarks'=>'required|max:255|min:1', 
        ]);
*/
        //$input = $request->except(['visit_id']);

        $visit_admission->approved = $request->approved;
        $visit_admission->bed_id = $request->bed_id;
        $visit_admission->save();
        
        //$visit_admission->update($input);
     
        return redirect('/emergency/admission/IncomingRequestList/');
    }
    public function destroy($id)
    {
        $sectors = Sector::findOrFail($id);
        $sectors->delete();

        return redirect('/sector');

    }

}
