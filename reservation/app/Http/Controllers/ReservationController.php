<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Auth;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=Reservation::all();  
        dd(json_decode($reservations));    
        return view("reservation") ->with('reservations',$reservations);
        
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
        return view("ajouter_reservation");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation=new Reservation;
        $reservation->salle=$request->input('salle');
        $reservation->user_id=Auth::user()->id;
        $reservation->client_id=$request->input('client_id');
        $reservation->start_date=$request->input('start_date');
        $reservation->end_date=$request->input('end_date');
        $reservation->description=$request->input('description');
        $reservation->prix=$request->input('prix');
        $reservation->avance=$request->input('avance');
        $reservation->save();
        session()->flash('success','la nouvelle reservation a été enregistrer correctement!');
       return redirect('/liste_reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
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
