<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect ;
use Auth;
use Mail;
use App\Mail\PasswordEmail;
use Illuminate\Support\Str;
class UsersController extends Controller
{
    public function __construct()
    {
       // $this->middleware('directeur');
    }
    public function list()
    {
        $users=User::paginate(8);
        return view('users.list')->with('users',$users);
    }
    public function add(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'prenom' =>'string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'telephone'=>'numeric',
            'role'=>'required',
            'password'=>'required',
            ]);
          //  $password =Str::random(8);
        $user=new User;
        $user->name=$request->input('name');
        $user->prenom=$request->input('prenom');
        $user->email=$request->input('email');
        $user->password= Hash::make($request->input('password'));
        $user->telephone=$request->input('telephone');
        $user->role=$request->input('role');
        $user->save();
        /* Mail::to($request->input('email'))
        ->send(new PasswordEmail($request->input('email'),$password));*/
        session()->flash('success','la nouvelle compte de utlisateur a été enregistrer correctement!');
        return Redirect::back();

dump($request);
    }
    public function deletecompte($id)
    {
        $user=User::find($id);
        if($user && $user->id != Auth::user()->id)
        {
            $user->delete();
        }
        return Redirect::back();
    }
}
