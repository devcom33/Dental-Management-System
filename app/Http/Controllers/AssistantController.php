<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class AssistantController extends Controller
{
    public function index($id_Assistant,$fk_Doctor)
    {
        $d = doctor::all();
       $a = assistant::all();
        $data = patient::all();
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
            'password'  => 'required|max:25',
        ]);
        $p = new patient;
        $p->Nom               = $request->nom;
        $p->Prenom            = $request->prenom;
        $p->DateNaissance     = $request->datee;
        $p->Adresse           = $request->addr;
        $p->Sexe              = $request->sexe;
        $p->Phone             = $request->phone;
        $p->Email             = $request->email;
        $p->Password          = $request->password;
        $p->CodeRDV           = $request->rdv;
        $p->Assurance         = $request->assurance;
        $p->fk_assistant      = $request->y;
        $p->fk_doctor         = $request->x;
        $p->fk_RDV            = $request->z;
         $p->save();
        return redirect()->back();
    }
    public function show($id,$id_Assistant,$fk_Doctor)
    {
        $post = patient::find($id);
        return view('assistant.view',compact('post','id_Assistant','fk_Doctor'));
    }
   

    public function update(Request $request,$id)
    {
        $p = patient::find($id);
        $p->Nom               = $request->nom;
        $p->Prenom            = $request->prenom;
        $p->DateNaissance     = $request->datee;
        $p->Adresse           = $request->addr;
        $p->Sexe              = $request->sexe;
        $p->Phone             = $request->phone;
        $p->Email             = $request->email;
        $p->Password          = $request->password;
        $p->CodeRDV           = $request->rdv;
        $p->Assurance         = $request->assurance;
        $p->save(); 
      return redirect()->back();
    }

    public function destroy($id)
    {
         $data = patient::find($id);
         $data->delete();   
        return redirect()->back();
    }
    public function search(Request $request,$id_Assistant,$fk_Doctor){
       
        $data= DB::table('patient')->where('Nom', $request->search)->paginate(11);
        return view('assistant.search',compact('data','id_Assistant','fk_Doctor')); 
        return redirect()->back();
    }
    public function index_Ass($id_Assistant,$fk_Doctor)
    {
        $d = doctor::all();
        $a = assistant::all();
        $data = patient::all();
       return view('Assistant.Patient',compact('data','a','d','id_Assistant','fk_Doctor'));  
    }
}