<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Assistant;
use App\Models\Doctor;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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

    //------------------------------------------
    public function login(){
        return view('Login');
    }
    public function home(Request $request){
        //------------------------------------
        $email = $request->input('email');
        $password = $request->input('password');
    
        $admin = admin::where('Email', '=', $email)->first();
        $assistant = assistant::where('Email', '=', $email)->first();
        $doctor = doctor::where('Email', '=', $email)->first();
     //------------------------------------
         if($admin){
            if (!$admin || !($password==$admin->Password)) {
                return response()->json(['Echec'=>false, 'message' => 'Login Fail, please check email or password']);
            }
            else{
               return view('Admin.home');
            }
    }
     //------------------------------------
     if($assistant){
        if (!$assistant || !($password==$assistant->Password)) {
            return response()->json(['Echec'=>false, 'message' => 'Login Fail, please check email or password']);
         }
         else{
           $id_Assistant =  $assistant->id_assistant;
           $fk_Doctor =  $assistant->fk_doctor;
            return view('Assistant.home',compact('id_Assistant','fk_Doctor'));
         }
    }

    if($doctor){
        if (!$doctor || !($password==$doctor->Password)) {
            return response()->json(['Echec'=>false, 'message' => 'Login Fail, please check email or password']);
        }
        else{
            $id_Doctor =  $doctor->id_doctor;
            return view('Doctor.home',compact('id_Doctor'));
        }
     }

    }
}
