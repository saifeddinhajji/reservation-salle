<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salle;
use App\Prix;
use Redirect;   
class SalleController extends Controller
{
    public function __construct()
    {
        $this->middleware('directeur');
    }

    public function index()
    {
        $salles=Salle::paginate(8);
      return view('salles.allsalles')->with('salles',$salles);
    }
    public function add(Request $request)
    {
          
       $this->validate($request, [
            'nom'=>'required|string|max:255',
            'capaciteSal' =>'numeric|',
            'adresse' =>'required|string',
            ]);
        $salle=new Salle;
        $salle->nom=$request->input('nom');
        $salle->capaciteSal=$request->input('capaciteSal');
        $salle->adresse=$request->input('adresse');
        $salle->save();
        session()->flash('success','la nouvelle salle a été enregistrer correctement!');
        return Redirect::back();
      
        
    }
    public function detail($id)
    {
        $salle=Salle::find($id);
        $prix=Prix::where('salle_id',$salle->id)->get();
       
        return view('salles.detail')->with('salle',Salle::find($id))->with('prix',$prix);
    }
    public function delete($id)
    {
        $salle=Salle::find($id);
        if($salle)
        {
            $salle->delete();
        }
        return Redirect::back();
    }
    public function update(Request $request)
    {

        $salle=Salle::find($request->input('salle_id'));
        if($salle)
        {
            $salle->nom=$request->input('nom');
            $salle->capaciteSal=$request->input('capaciteSal');
            $salle->adresse=$request->input('adresse');
            $salle->save();
        }
        return Redirect::back();
    }
}
