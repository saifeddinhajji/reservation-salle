<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Reglement;
use DateTime;
use App\Banque;
use Redirect;
use App\Cheque;
use App\Virement;
use App\Espece;
class ReglementController extends Controller
{
    public function index($id)
    {
     $date=new  DateTime();
  

      $reservation=Reservation::find($id);
     $reglements=Reglement::where('reservation_id',$id)->with('cheque')->with('virement')->with('espece')->get();
 
 return view('reglement.reglement')->with('reservation',$reservation)->with('date',$date)->with('reglements',$reglements);
     
   
    

  }
    public function addbanque(Request $request)
    {
    Banque::create($request->all());
    return Redirect::back();
    }
    public function add(Request $request)
    {
      
      $total=Reglement::where('reservation_id',$request->input('reservation_id'))->sum('montant');
      $reservation=Reservation::where('id',$request->input('reservation_id'))->first();
     $prix=$reservation->prix;
      if($request->input('montant')+$total<=$prix){
        $reglement=Reglement::create($request->all());
     if($request->input('type')=="espece")
     {
      
       $espece= new Espece;
       $espece->reglement_id=$reglement->id;
       $espece->save();
     }
     elseif($request->input('type')=="virement")
     {
       $virement=new Virement;
       $virement->reglement_id=$reglement->id;
       $virement->nombanque=$request->input('nombanque');
       $virement->num_virement=$request->input('num_virement');
       $virement->save();
     }
     else
     {
       $cheque=new Cheque;
       $cheque->nombanque=$request->input('nombanque');
       $cheque->num_cheque=$request->input('num_cheque');
       $cheque->propriete=$request->input('propriete');
       $cheque->reglement_id=$reglement->id;
       $cheque->save();
     }
     session()->flash('success','la nouvelle reglement a été enregistrer correctement!');
    }
    else
    {
   
      session()->flash('error','la somme des montants des reglements ne doit pas depassé le prix indiqué dans la reservation!');
    }
     return Redirect::back();

    }
}
