<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autre;
use Redirect;
class AutresController extends Controller
{
    public function all()
    {
    $autres=Autre::paginate(8);
    return view('autres.all')->with('autres',$autres);
    }
    public function add(Request $request)
    {
       Autre::create($request->all());
       session()->flash('success','la nouvelle autres a été enregistrer correctement!');
       return Redirect::back();
    }
    public function delete($id)
    {
        $autre=Autre::find($id);
        if($autre)
        {
            $autre->delete();
        }
        return Redirect::back();
    }
    public function update(Request $request)
    {

        $autre=Autre::find($request->input('autre_id'));
        if($autre)
        {
           $autre->update($request->all());
        }
        return Redirect::back();
    }
}
