<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\traitements;
use App\Models\consultation;
use App\Models\EventDoctor;
use Redirect,Response;
use Carbon\Carbon;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//----------------------------------------------------------------
    public $cons;
    public $contrait;
    public function setCons(){
        $dbconsu=DB::table('consultation')->latest()->first();
        $this->cons=$dbconsu->id_consultation;
    }
    public function setContrait(){
        $dbtraitements=DB::table('traitements')->latest()->first();
        $this->contrait=$dbtraitements->id_traitement;
    }
    public function getCons(){return $this->cons;}
    public function getContrait(){return $this->contrait;}
    public function indx($id_Doctor)
    {
       
        $data=Patient::select('id_patient','created_at')->get()->groupBy(function ($data){
            return Carbon::parse($data->created_at)->format('M');
        });
        $dataconsult=consultation::select('id_consultation','created_at')->get()->groupBy(function ($dataconsult){
            return Carbon::parse($dataconsult->created_at)->format('M');
        });
        $months=[];
        $monthCount=[];
         
        foreach($data as $month=>$values){
          $months[]=$month;
          $monthCount[]=count($values);
        }
        $mnth=[];
        $countmnt=[];
        foreach($dataconsult as $month=>$values){

            $mnth[]=$month;
            $countmnt[]=count($values);
          }
          $aucun=traitements::where('fk_service',1)->get();
          $cleanings=traitements::where('fk_service',2)->get();
          $whitening=traitements::where('fk_service',3)->get();
          $extractions=traitements::where('fk_service',4)->get();
          $count_aucun=count($aucun);
          $count_cleanings=count($cleanings);
          $count_whitening=count($whitening);
          $count_extractions=count($extractions);
          //somme revenu
          $today = Carbon::now();
          $curmonth=$today->month;
          $curday=$today->day;
          $datam=Patient::whereMonth('created_at',$curmonth)->get();
          $cons=Consultation::whereDay('created_at',$curday)->get();
          $rdv=EventDoctor::whereDay('created_at',$curday)->get();
          $som=0;
          $countpat=count($datam);
          foreach($datam as $key=>$value){
            $som=$value->Assurance+$som;
           }
           //count consultation
           $countconsultation=count($cons);
           //count rendez-vous
           $countrdv=count($rdv);
        return view('Doctor.home',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount,'dataconsult'=>$dataconsult,'mnth'=>$mnth,'countmnt'=>$countmnt,'som'=>$som,'countpat'=>$countpat,'countconsultation'=>$countconsultation,'countrdv'=>$countrdv],compact('id_Doctor','count_aucun','count_cleanings','count_whitening','count_extractions'));
    }
    public function indxassistant($fk_Doctor,$id_Assistant)
    {
       
        $data=Patient::select('id_patient','created_at')->get()->groupBy(function ($data){
            return Carbon::parse($data->created_at)->format('M');
        });
        $dataconsult=consultation::select('id_consultation','created_at')->get()->groupBy(function ($dataconsult){
            return Carbon::parse($dataconsult->created_at)->format('M');
        });
        $months=[];
        $monthCount=[];
         
        foreach($data as $month=>$values){
          $months[]=$month;
          $monthCount[]=count($values);
        }
        $mnth=[];
        $countmnt=[];
        foreach($dataconsult as $month=>$values){

            $mnth[]=$month;
            $countmnt[]=count($values);
          }
          $aucun=traitements::where('fk_service',1)->get();
          $cleanings=traitements::where('fk_service',2)->get();
          $whitening=traitements::where('fk_service',3)->get();
          $extractions=traitements::where('fk_service',4)->get();
          $count_aucun=count($aucun);
          $count_cleanings=count($cleanings);
          $count_whitening=count($whitening);
          $count_extractions=count($extractions);
          //somme revenu
          $today = Carbon::now();
          $curmonth=$today->month;
          $curday=$today->day;
          $datam=Patient::whereMonth('created_at',$curmonth)->get();
          $cons=Consultation::whereDay('created_at',$curday)->get();
          $rdv=EventDoctor::whereDay('created_at',$curday)->get();
          $som=0;
          $countpat=count($datam);
          foreach($datam as $key=>$value){
            $som=$value->Assurance+$som;
           }
           //count consultation
           $countconsultation=count($cons);
           //count rendez-vous
           $countrdv=count($rdv);
        return view('Assistant.home',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount,'dataconsult'=>$dataconsult,'mnth'=>$mnth,'countmnt'=>$countmnt,'som'=>$som,'countpat'=>$countpat,'countconsultation'=>$countconsultation,'countrdv'=>$countrdv],compact('id_Assistant','fk_Doctor','count_aucun','count_cleanings','count_whitening','count_extractions'));
    }
    
    public function indexadmin(){
        $datadoctor=Doctor::all();
        $dataassistant=Assistant::all();
        $codoctor=count($datadoctor);
        $coassistant=count($dataassistant);
        return view('Admin.home',compact('codoctor','coassistant'));
    }

    //------------------------------------------
    public function login(){
        return view('Login');
    }
    public function dashboard(Request $request){
        //------------------------------------
        $email = $request->input('email');
        $password = $request->input('password');
    
        $admin = admin::where('Email', '=', $email)->first();
        $assistant = assistant::where('Email', '=', $email)->first();
        $doctor = doctor::where('Email', '=', $email)->first();
     //------------------------------------
         if($admin){
            if (!$admin || !($password==$admin->Password)) {
                return redirect()->back() ->with('alert', 'please check email or password!');
            }
            else{

                $request->session()->put('LoggedUser',$admin->id_admin);
                
                return redirect('/dashboard');

            }
    }
     //------------------------------------
     if($assistant){
        if (!$assistant || !($password==$assistant->Password)) {
            return redirect()->back() ->with('alert', 'please check email or password!');
         }
         else{
           $id_Assistant =  $assistant->id_assistant;
           $fk_Doctor =  $assistant->fk_doctor;
           $request->session()->put('LoggedUser',$assistant->id_assistant);
           return redirect()->to('dashboard/'.$fk_Doctor.'/'.$id_Assistant);
         }
    }

    if($doctor){
        
        if (!$doctor || !($password==$doctor->Password)) {
            return redirect()->back() ->with('alert', 'please check email or password!');
        }
        else{
            $id_Doctor =  $doctor->id_doctor;
            $request->session()->put('LoggedUser',$doctor->id_doctor);
            return redirect()->to('dashboard/'.$id_Doctor);
        }
     }
     else{
        return redirect()->back() ->with('alert', 'please check email or password!');
     }
    }
}
