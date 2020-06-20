<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::orderBy('created_at', 'desc')->paginate(8);

        return view("clients")->with('clients',$clients);
    }
        public function search (Request $request)
        {
            $search=$request->input('search');
            $clients=Client::where('nom','like','%'.$search.'%')
            ->orwhere('prenom','like','%'.$search.'%')
            ->orwhere('cin','like','%'.$search.'%')
            ->orwhere('mobile','like','%'.$search.'%')
            ->orwhere('fix','like','%'.$search.'%')
            ->orwhere('region','like','%'.$search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(8); 
            return view("clients")->with('clients',$clients);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add_clients");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client=new Client;
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');;
        $client->cin=$request->input('cin');
        $client->fix=$request->input('fix');
        $client->mobile=$request->input('mobile');
        $client->region=$request->input('region');
        $client->save();
        session()->flash('success','Opération effectuée avec succès');
       return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client=Client::findOrFail($id);
        if(!$client)
        {
            return  back()->withInput();
        }
        
        return view('updateclient')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $client=Client::findOrFail($id);
        if(!$client)
        {
            return redirect('/clients');
        }
        $client->nom=$request->input('nom');
        $client->prenom=$request->input('prenom');;
        $client->cin=$request->input('cin');
        $client->fix=$request->input('fix');
        $client->mobile=$request->input('mobile');
        $client->region=$request->input('region');
        $client->save();
        session()->flash('success','Opération effectuée avec succès');
       return redirect('/clients');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id);
        if($client)
       { $client->delete();}
       
       session()->flash('success','Opération effectuée avec succès');
       return back()->withInput();
    }
}
