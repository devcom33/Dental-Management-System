<?php

namespace App\Http\Controllers;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\consultation;
use App\Models\ordonnance;
use Illuminate\Http\Request;

class ConsultationassistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_Assistant, $fk_Doctor)
    {
        $d = doctor::all();
        $a = assistant::all();
        $data = patient::all();
        return view('Assistant.Consultation',compact('data','a','d','id_Assistant','fk_Doctor') );  
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomP' =>'required|max:25',
            'nomD' =>'required|max:25',
            'observation' =>'required|max:25',
            'datec' =>'required|max:25',
            'montant'=>'required|max:25',
        ]);
        $consu=new consultation();
        $consu->NomPatient=$request->nomP;
        $consu->NomDoctor=$request->nomD;
        $consu->Observation=$request->observation;
        $consu->DateConsultation=$request->datec;
        $consu->Montant_C=$request->montant;
        $consu->fk_assistant   = $request->assis;
        $consu->fk_doctor      = $request->doc;
        $consu->fk_patient     = $request->pat;
        $consu->fk_ordonnance  = $request->or;
        $consu->save();
        return redirect()->back();
        //return redirect('assistant/consultation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultation $consultation)
    {
        //
    }
}
