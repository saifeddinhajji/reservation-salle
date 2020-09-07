<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Auth;
use App\Prix;
use DateTime;
use Redirect;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with("client")->with('salle')->with('prix')->get();
       
     return view("reservation") ->with('reservations',json_decode($reservations));      
    }
    public function search(Request $request)
    {
        $reservations = Reservation::where('start_date','<=',$request->input('start_date'))->where('end_date','>=',$request->input('end_date'))->with("client")->with('salle')->with('prix')->get();
        return view("reservation") ->with('reservations',json_decode($reservations)); 
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $reservations=Reservation::orderBy('created_at', 'desc')->paginate(8);

        return view("liste_reservation")->with('reservations',$reservations);
        
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date=new  DateTime();
        return view("ajouter_reservation")->with('date',$date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $salle_id=Prix::find($request->input('prix_id'))->salle->id;
      $res1=Reservation::where('salle_id','=',$salle_id)->where('start_date','<=',$request->input('start_date'))->where('end_date','>=',$request->input('end_date'))->count();

        $res2=Reservation::where('salle_id','=',$salle_id)->where('start_date','<=',$request->input('start_date'))->where('end_date','>=',$request->input('end_date'))->count();

       
        $res3=Reservation::where('salle_id','=',$salle_id)->whereBetween('start_date',[$request->input('start_date'),$request->input('end_date')])->count();
        $res4=Reservation::where('salle_id','=',$salle_id)->whereBetween('end_date',[$request->input('start_date'),$request->input('end_date')])->count();
     
     
       if($res1==0 && $res2==0 && $res3==0 && $res4==0  ){

            $reservation=new Reservation;
            $reservation->salle_id=$salle_id;
            $reservation->prix_id=$request->input('prix_id');
            $reservation->user_id=Auth::user()->id;
            $reservation->client_id=$request->input('client_id');
            $reservation->start_date=$request->input('start_date');
            $reservation->end_date=$request->input('end_date');
            $reservation->description=$request->input('description');
            $reservation->prix=$request->input('prix');
            $reservation->engagement=$request->input('engagement')=="on";
            $reservation->permisdefete=$request->input('permisdefete')=="on";
            $reservation->save();
           session()->flash('success','la nouvelle reservation a été enregistrer correctement!');
          }else{
            session()->flash('error','chevauchement entre deux période!');
            return redirect('/liste_reservation');
        }
        
        

if($request->input('action')=="avec" && $reservation)
{
    return Redirect::to('reglement/'.$reservation->id);
}
return redirect('/liste_reservation');
     
       
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation=Reservation::findOrFail($id);
        if(!$reservation)
        {
            return  back()->withInput();
        }
        
        return view('updatereservation')->with('reservation',$reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $reservation=Reservation::findOrFail($id);
        if($reservation)
       { $reservation->delete();}
       
       session()->flash('success','la reservation  supprimer avec succées');
       return back()->withInput();
    }
}
