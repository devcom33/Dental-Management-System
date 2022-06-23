<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\assistant;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Event;
use App\Models\Hestory;
use App\Models\HistoirePatient;
use Illuminate\Support\Facades\DB;


use App\Models\consultation;
use App\Models\Services;
use App\Models\dents;
use App\Models\traitements;
class DoctorController extends Controller
{

    public function index($id_Doctor)
    {
        $d = doctor::all();
         $a = assistant::all();
        $data = patient::paginate(5);
        $calend = event::all();
   


      return view('Doctor.Patient',compact('data','d','a','id_Doctor','calend'));
      //return view('Assistant.Patient',compact('data','a','d','id_Assistant','fk_Doctor','calend'));

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|max:25',
            'prenom'    => 'required|max:25',
            'sexe'      => 'required|max:25',
            'addr'      => 'required|max:25',
            'phone'     => 'required|max:25',
            'email'     => 'required|email',
            'datee'     => 'required',
        ]);
        $pa = new patient;
        $pa->Nom               = $request->nom;
        $pa->Prenom            = $request->prenom;
        $pa->DateNaissance     = $request->datee;
        $pa->Adresse           = $request->addr;
        $pa->Sexe              = $request->sexe;
        $pa->Phone             = $request->phone;
        $pa->Email             = $request->email;
        $pa->fk_assistant       = $request->y;
        $pa->fk_doctor         = $request->x;
         $pa->save();
         return redirect()->back();
    }
//history
    public function show($id,$id_Doctor)
    {
       $post = patient::find($id);

       $d = doctor::all(); 
       $a = assistant::all();
       $data = patient::all();
       $serv= Services::all();
       $dent=dents::all();
       $op=hestory::all();
       $trait=traitements::all(); 
       $consultfrombd=consultation::all();

       $hestory = Hestory::all();
       //return view('doctor.view',compact('post','id_Doctor','hestory'));
       
        $patientanddent=DB::table('Operations')->join('Consultation','Operations.fk_consultation','=','consultation.id_consultation')->join('patient','patient.id_patient','=','consultation.fk_patient')->join('traitements','traitements.id_traitement','=','Operations.fk_traitement')->join('services','services.id_service','=','traitements.fk_service')->join('dents','dents.id_dents','=','traitements.fk_dent')->join('event_doctors','event_doctors.fk_patient','=','patient.id_patient')->select('patient.id_patient','consultation.id_consultation','patient.Nom','patient.Email','patient.Phone', 'dents.nombre_de_dent', 'services.service','event_doctors.start','event_doctors.end','services.prix')->get()->toArray();
      
      //====================

      $Montant = 0;
      foreach ($patientanddent as $key => $value){
        if($value->id_patient==$post->id_patient){
                $Montant += $value->prix;
        }
      }
//-------------------------------
        //  $fc = new Facture();
        //  $fc->Total=$Montant;
        
         $src = Patient::find($post->id_patient);
         $src->Assurance = $Montant;
         $src->save();
        //  $fc->save();
      
        

      //=====================
        return view('doctor.view',compact('post','hestory','data','a','d','serv','consultfrombd','dent','op','trait','patientanddent','id_Doctor','Montant') );
    }


    public function edit()
    {
        //
    }
    public function update(Request $request,$id)
    {
        $pa = patient::find($id);
        $pa->Nom               = $request->nom;
        $pa->Prenom            = $request->prenom;
        $pa->DateNaissance     = $request->datee;
        $pa->Adresse           = $request->addr;
        $pa->Sexe              = $request->sexe;
        $pa->Phone             = $request->phone;
        $pa->Email             = $request->email;
        $pa->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
         $data = patient::find($id);
         $data->delete();
         return redirect()->back();
       
    }

    public function pdf($id) {
        $post = patient::find($id);
        $pdf = PDF::loadView('Assistant.pdf', compact('post'));
        $pdf = PDF::loadView('Assistant.pdf', compact('post'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('List' . $id. '.pdf');
    }
    public function search($id_Doctor,Request $request){
       
        $search = $request->input('search');
  
        $data = patient::query()
                    ->where('Nom', 'LIKE', "%{$search}%")
                    // ->orWhere('body', 'LIKE', "%{$search}%")
                    ->get();
         $d = doctor::all();
         $a = assistant::all();
         if($data==null){
            dd("error");
            // return redirect()->back();
         }

         return view('doctor.search',compact('data','id_Doctor','a','d')); 

    }
}
