<?php

namespace App\Http\Controllers;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\consultation;
use App\Models\Services;
use App\Models\Operations;
use App\Models\dents;
use App\Models\traitements;
use App\Models\EventDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index($id_Doctor)
    {
        $rdv = EventDoctor::all();
        $d = doctor::all();
        $a = assistant::all();
        $data = patient::all();
        $serv= Services::all();
        $dent=dents::all();
        $op=Operations::all();
        $trait=traitements::all();
        $consultfrombd=consultation::all();
        $patientanddent=DB::table('Operations')->join('Consultation','Operations.fk_consultation','=','consultation.id_consultation')->join('patient','patient.id_patient','=','consultation.fk_patient')->join('traitements','traitements.id_traitement','=','Operations.fk_traitement')->join('services','services.id_service','=','traitements.fk_service')->join('dents','dents.id_dents','=','traitements.fk_dent')->join('event_doctors','event_doctors.fk_patient','=','patient.id_patient')->select('consultation.id_consultation','patient.Nom','patient.Email','patient.Phone', 'dents.nombre_de_dent', 'services.service','event_doctors.start','event_doctors.end','services.prix')->get()->toArray();
        return view('Doctor.Consultation',compact('data','a','d','serv','consultfrombd','dent','op','trait','patientanddent','id_Doctor','rdv') );  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }
    public function store(Request $request)
    {
        $request->validate([
            'doc' => 'required',
            'patient' => 'required',
        ]);
        $consu=new consultation();
        $consu->fk_doctor      = $request->doc;
        $consu->fk_patient     = $request->patient;
        $consu->save();

        
        return redirect()->back();
    }

    public function show(consultation $consultation)
    {
        //
    }

    public function edit(consultation $consultation)
    {
        //
    }

    public function update(Request $request, consultation $consultation)
    {
        //
    }
    public function destroy(consultation $consultation)
    {
        //
    }
}
