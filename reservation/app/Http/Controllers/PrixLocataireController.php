<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prix;
use Redirect;
class PrixLocataireController extends Controller
{
    public function add(Request $request)
    {
        $prix=Prix::create($request->all());
        return Redirect::back();
    }
    public function delete($id)
    {
        $prix=Prix::find($id);
        if($prix)
        {
            $prix->delete();
        }
    return Redirect::back();  

}
public function update(Request $request)
{
    $prix=Prix::find($request->input('prix_id'));
    if($prix)
    {
        $prix->update($request->all());
    }
    return Redirect::back();  
}
}
