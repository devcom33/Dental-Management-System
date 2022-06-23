<?php
//this admin
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Assistant;
use App\Models\Admin;
use App\Models\Doctor;
class AdminController extends Controller
{

    public function index()
    {

        
        $a = admin::all();
        $d = doctor::paginate(4); 
        $data = assistant::paginate(4);;
        $segment=request()->segments();  //il retourn array
        if(end($segment)=="doctor"){

            return view('Admin.Doctor',compact('d','a'));
        }
        else if(end($segment)=="assistant"){

            return view('Admin.Assistant',compact('data','d','a'));
        }

    }

    public function create()
    {
        // hhh mn nytk
    }
    public function store(Request $request)
    {
        $segment=request()->segments();
        if(end($segment)=="doctor"){
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'sexe'=>'required',
                'datenaissance'=>'required',
                'adresse'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'password' => 'required',
            ]);

            $doct=new doctor;
            $doct->Nom=$request->nom;
            $doct->Prenom=$request->prenom;
            $doct->Sexe=$request->sexe;
            $doct->DateNaissance=$request->datenaissance;
            $doct->Adresse=$request->adresse;
            $doct->Phone=$request->phone;
            $doct->Email=$request->email;
            $doct->Password=$request->password;
            $doct->fk_admin= $request->y;
            $doct->save();
            return redirect('Admin/doctor');

    }

    else if(end($segment)=="assistant"){
        $request->validate([
            'nom'       => 'required|max:25',
            'prenom'    => 'required|max:25',
            'sexe'      => 'required|max:25',
            'phone'     => 'required|max:25',
            'email'     => 'required|email',
            'password'  => 'required|max:25',
        ]);
        $assist = new assistant;
        $assist->Nom               = $request->nom;
        $assist->Prenom            = $request->prenom;
        $assist->Sexe              = $request->sexe;
        $assist->Phone             = $request->phone;
        $assist->Email             = $request->email;
        $assist->Password          = $request->password;
        $assist->fk_admin         = $request->y;
        $assist->fk_doctor         = $request->x;
        $assist->save();
        return redirect('Admin/assistant');
        
    }
        
    }


    public function show($id)
    {
        
        $segment=request()->segments(2);
        $seg=request()->segments();
        if(end($segment)==$id){
            if($seg[1]=="doctor"){
                $post=doctor::find($id);
                return view('admin.view',compact('post'));
                
            }
            else if($seg[1]=="assistant"){
                $post = assistant::find($id);
                return view('Admin.view',compact('post'));
            }
        }
    }


    // public function edit($id)
    // {
    //     $post = assistant::find($id);
    //      return view('Admin.EditA',compact('post'));
        
    // }
    // avec dans Assistant.blade.php  
    //  <!-- Button Edit -->   
    // <a class="btn btn-primary" href="{{ route('admin.edit',$value) }}">Edit</a>

   
    public function update(Request $request,$id)
    { 
        $segment=request()->segments(2);
        $seg=request()->segments();
        if(end($segment)==$id){
            if($seg[1]=="doctor"){
                $post=doctor::find($id);
                $post->update($request->all());
                $post->Nom=$request->nom;
                $post->Prenom=$request->prenom;
                $post->Sexe=$request->sexe;
                $post->DateNaissance=$request->datenaissance;
                $post->Adresse=$request->adresse;
                $post->Phone=$request->phone;
                $post->Email=$request->email;
                $post->Password=$request->password;
                $post->save();
                return redirect('/Admin/doctor');
            }
            else if($seg[1]=="assistant"){         
                $post = assistant::find($id);
                $post->update($request->all());
                $post->Nom = $request->nom;
                $post->Prenom = $request->prenom;
                $post->Sexe = $request->sexe;
                $post->Phone = $request->phone;
                $post->Email = $request->email;
                $post->Password = $request->password;
                $post->save();
                return redirect('/Admin/assistant');
            }
        }
        
    }

    
    public function destroy($id)
    {
        $segment=request()->segments(2);
        $seg=request()->segments();
        if(end($segment)==$id){
            if($seg[1]=="doctor"){
                $data = doctor::find($id);
                $data->delete();
                return redirect('Admin/doctor');
            }
            else if($seg[1]=="assistant"){
            $data = assistant::find($id);
            $data->delete();
            return redirect('Admin/assistant');
            }
        }
        
        
        // return redirect()->route('admin.index')
        //                 ->with('success','Post deleted successfully');
    }
    // public function search(Request $request){
    // $data= DB::table('doctor')->where('Nom', $request->search)->paginate(6);
    //    return view('Admin.search',compact('data'));
    // }
    // public function searchA(Request $request){
    //     $data= DB::table('assistant')->where('Nom', $request->search)->paginate(6);
    //        return view('Admin.searchA',compact('data'));
    //     }

    public function searchA(Request $request){
       
        $search = $request->input('search');
  
        $data = assistant::query()
                    ->where('Nom', 'LIKE', "%{$search}%")
                    // ->orWhere('body', 'LIKE', "%{$search}%")
                    ->get();
          $a = admin::all();
          $d = doctor::paginate(4);
         if($data==null){
           
            // return redirect()->back();
         }

         return view('admin.searchA',compact('data','a','d')); 

    }

    public function searchD(Request $request){
       
        $search = $request->input('search');
  
        $data = doctor::query()
                    ->where('Nom', 'LIKE', "%{$search}%")
                    // ->orWhere('body', 'LIKE', "%{$search}%")
                    ->get();
         $a = admin::all();
         $d = doctor::paginate(4);
         if($data==null){
            dd("error");
            // return redirect()->back();
         }

         return view('admin.search',compact('data','a','d')); 

    }
}

