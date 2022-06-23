<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\EventDoctor;
use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\Event;
use App\Models\Patient;
use League\CommonMark\Extension\Table\Table;
use Carbon\Carbon;
use LDAP\Result;

class FullCalenderController_D extends Controller
{
    public function index(Request $request, $id_Doctor)
    {
        if($request->ajax()) {
        
             $data = EventDoctor::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'status', 'start', 'end','NomP','NomD','fk_doctor']);
  
             return response()->json($data);
        }
  

        $d = doctor::all();
        $p = patient::all();
        $a = assistant::all();
        return view('Doctor.fullcalender',compact('p','d','a','id_Doctor'));
    }
 
    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $event = EventDoctor::create([
                'status' => $request->status,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
             $j = 1; 
                $rdv = EventDoctor::all();

                $start = date("H:i:s", strtotime($request->start));
                $end = date("H:i:s", strtotime($request->end));
         
                $ystart = date("Y-m-d", strtotime($request->start));
                $yend = date("Y-m-d", strtotime($request->end));

                $p = EventDoctor::find($request->id);
           
                $result1 = $ystart<=$yend;
                $result2 = $start<$end;
                 if($result1==true && $result2==true){
                foreach($rdv as $x){
                  $start_rdv = date("H:i:s", strtotime($x->start));
                  $end_rdv = date("H:i:s", strtotime($x->end));

      
                  $ystart_rdv = date("Y-m-d", strtotime($x->start));
                  $yend_rdv = date("Y-m-d", strtotime($x->end));
                  if($ystart==$ystart_rdv && $yend==$yend_rdv){              

                    if($start_rdv < $start && $end_rdv < $start)
                      {
                     $j=1;
                      }
                     else if($start_rdv > $end && $end_rdv > $end)
                      {
                        $j=1;
                      }
                      else{
                        $j=0;
                            break;
                      }
                 
               
              }
              
            }//end foreach
            }
            if($j==0){
              return response()->json("Impossible check date");
            }else{
              $p->status           = $request->status;
              $p->start           = $request->start;
              $p->end             = $request->end;
              $p->update();
             return response()->json("le rendez vous est réservé");
            }
               
               break;
  
               case 'delete':
              $event = EventDoctor::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
    public function store(Request $request)
    {
      $j=1;
       $rdv = EventDoctor::all();

       $start = date("H:i:s", strtotime($request->start));
       $end = date("H:i:s", strtotime($request->end));

       $ystart = date("Y-m-d", strtotime($request->start));
       $yend = date("Y-m-d", strtotime($request->end));

       $result1 = $ystart<=$yend;
       $result2 = $start<$end;
       if($result1==true && $result2==true){
          foreach($rdv as $x){
            $start_rdv = date("H:i:s", strtotime($x->start));
            $end_rdv = date("H:i:s", strtotime($x->end));

            $ystart_rdv = date("Y-m-d", strtotime($x->start));
            $yend_rdv = date("Y-m-d", strtotime($x->end));

        if($ystart==$ystart_rdv && $yend==$yend_rdv){              
          if($start_rdv < $start && $end_rdv < $start)
          {
         $j=1;
          }
         else if($start_rdv > $end && $end_rdv > $end)
          {
            $j=1;
          }
          else{
            $j=0;
                break;
          }
          }
         //-------------
        }    
          if($j==0){
            // return response()->json("Impossible check time");
            return redirect()->back() ->with('alert', 'please check time !');

          }else{
            $ps = new EventDoctor;
            $do=Doctor::find($request->y);
            $pa=Patient::find($request->x);
              $ps->NomP            =$pa->Nom;
              $ps->NomD            =$do->Nom;    
              $ps->prenomP         =$pa->Prenom;
              $ps->prenomD         =$do->Prenom;  
              $ps->start           = $request->start;
              $ps->end             = $request->end;
              if($request->status==1||$request->status==1) {
                $ps->status         = "completed";
              } 
              if($request->status==2||$request->status==2) {
                $ps->status = "pending";
              }
              $ps->fk_doctor       = $request->y;
              $ps->fk_patient      = $request->x;
              $ps->save();   
              return redirect()->back();
          }
                 
       }
        else{
          return redirect()->back() ->with('alert', 'please check time !');
        }
  }
   public function pending($id_Doctor){
     $pending = EventDoctor::all();
     return view('Doctor.pending',compact('id_Doctor','pending')) ;
   }
   public function completed($id_Doctor){
    $completed = EventDoctor::all();
    return view('Doctor.completed',compact('id_Doctor','completed')) ;
  }
  public function valider($id_p){
    $validier = EventDoctor::find($id_p);
    $validier->status  = "completed";
    $validier->save();
    return redirect()->back();

  }
}
