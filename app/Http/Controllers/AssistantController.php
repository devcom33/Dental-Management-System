<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

 use App\Models\consultation;
 use App\Models\Services;
 use App\Models\dents;
 use App\Models\traitements;
 use App\Models\Hestory;
use App\Models\HistoirePatient;
use PDF;

class AssistantController extends Controller
{
    public function index($id_Assistant,$fk_Doctor)
    {
        $d = doctor::all();
        $a = assistant::all();
        $data = patient::paginate(5);
        $calend = Event::all();
      return view('Assistant.Patient',compact('data','a','d','id_Assistant','fk_Doctor','calend'));
    }
    public function create()
    {
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
        $p = new patient;
        $p->Nom               = $request->nom;
        $p->Prenom            = $request->prenom;
        $p->DateNaissance     = $request->datee;
        $p->Adresse           = $request->addr;
        $p->Sexe              = $request->sexe;
        $p->Phone             = $request->phone;
        $p->Email             = $request->email;
        $p->fk_assistant      = $request->y;
        $p->fk_doctor         = $request->x;
         $p->save();
        return redirect()->back();

    } 
  
    //history
    public function show($id,$fk_Doctor,$id_Assistant)
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
         return view('Assistant.view',compact('id_Assistant','post','hestory','data','a','d','serv','consultfrombd','dent','op','trait','patientanddent','fk_Doctor','Montant') );
     
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






    // public function search($id_Assistant,$fk_Doctor,Request $request,){
       
    //     $data= DB::table('patient')->where('Nom', $request->search)->paginate(11);
    //     // return view('assistant.search',compact('data','id_Assistant','fk_Doctor')); 
    //     // return redirect()->back();
    //     dd($data->Nom);
    // }
    //public function search(Request $request,$id_Assistant,$fk_Doctor){
       
        // $data= DB::table('patient')->where('Nom', $request->search)->paginate(6);
        // $value= DB::table('patient')->where('Nom', $request->search)->paginate(60);
        // return view('assistant.search',compact('data','id_Assistant','fk_Doctor')); 
        // return redirect()->back();
        // $data = patient::where('Nom', '=', $request->search)->paginate(15);
        //$d = doctor::all();
      //  $a = assistant::all();

        // $value = DB::select('select * from patient where Nom = :Nom', ['Nom' => $request->search]);
        //$id_patient = null;
        //$data = DB::table('patient')
          //      ->where('Nom', 'like', '%'.$request->search.'%')
            //    ->first();
        //$id_patient = $data->id_patient;
       // return view('assistant.search',compact('data','id_Assistant','fk_Doctor','a','d','id_patient')); 
        // dd($value);
    //}
    public function search($id_Assistant,$fk_Doctor,Request $request){
       
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

         return view('assistant.search',compact('data','id_Assistant','fk_Doctor','a','d')); 

    }

    public function index_Ass($id_Assistant,$fk_Doctor)
    {
        $d = doctor::all();
        $a = assistant::all();
        $data = patient::all();
       return view('Assistant.Patient',compact('data','a','d','id_Assistant','fk_Doctor'));  
    }

 
    public function pdf($id) {
        $post = patient::find($id);
        $pdf = PDF::loadView('Assistant.pdf', compact('post'));
        $pdf = PDF::loadView('Assistant.pdf', compact('post'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('List' . $id. '.pdf');
    }
}