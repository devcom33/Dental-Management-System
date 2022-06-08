<?php

namespace App\Http\Controllers;
use App\Models\Services;
use App\Models\dents;
use App\Models\traitements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use setContrait;
class TraitementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
    // public function getContrait(){ return self::$contrait; }
    public function store(Request $request)
    {

        $request->validate([
            'choisirdent'=> 'required|max:25',
            'choisirtrait'=> 'required|max:25',
        ]);
        $traitement=new traitements;
        $traitement->fk_service = $request->choisirtrait;
        $traitement->fk_dent    = $request->choisirdent;

        $traitement->save();


        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
