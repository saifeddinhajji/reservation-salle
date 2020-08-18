@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <h2>Listes des comptes</h2>  


 


  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <a class="btn btn-primary btn-sm pull-right" style="margin-bottom:10px"  data-toggle="modal" data-target="#adduser" >Ajouter un Compte</a>
</div>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Role</th>
        
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(!$users)
      aucun compte dans la base de données
      @endif
      @foreach ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->prenom}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->telephone}}</td>
        <td>{{$user->role}}</td>
        
      <td class="text-center">

      <a class="btn btn-danger btn-sm " href="{{route('deletecompte',$user->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a></>
      </tr>
      @endforeach
    
    
    </tbody>
  </table>
  <div class="text-center">  {{ $users->links() }}</div>
</div>

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau compte  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addcompte')}}">
        @csrf
            <div class="form-group">
                <label >Nom:</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label >Prénom:</label>
                <input type="text" name="prenom" class="form-control" >
            </div>
            <div class="form-group">
                <label >Telephone:</label>
                <input type="number" name="telephone" class="form-control" >
            </div>
            <div class="form-group">
                <label >Email:</label>
                <input type="text" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <label >Mote de passe:</label>
                <input type="text" name="password" class="form-control" >
            </div>
            
            <div  class="form-group">
                <select class="form-control" name="role">
                    <option value="directeur">directeur de la société</option>
                    <option value="financier"> Responsable financier </option>
                </select>
            </div>
        <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>
@endsection
