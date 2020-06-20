@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <h2>Listes des clients</h2>  


 


  <div class="row">
    <div class="col-md-8" style="padding-right: 0;">
    <form action="{{route('search')}}" method="POST"> @csrf 
          <div class="row">
            <div class="col-md-9">
            <input type="text" style="border-color: #007bff;"  class="form-control" placeholder="Tapez un Nom, Prenom, N° téléphone etc..." name="search" >
            </div>
            <div class="col-md-3" style=" padding-left: 0;">
            <button type="submit" class="btn btn-outline-primary pull-left"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
      </form>
    </div>
    <div class="col-md-4">
    <a href="/clients/add"  class="btn btn-primary pull-right" style="margin-bottom:10px" >Ajouter un client</a>
</div>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>CIN</th>
        <th>N° de tel mobile</th>
        <th>N° de tel fixe</th>
        <th>N° de tel region</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(!$clients)
      aucun client dans la base de données
      @endif
      @foreach ($clients as $client)
      <tr>
        <td>{{$client->nom}}</td>
        <td>{{$client->prenom}}</td>
        <td>{{$client->cin}}</td>
        <td>{{$client->mobile}}</td>
        <td>{{$client->fix}}</td>
        <td>{{$client->region}}</td>
      <td class="text-center"><a class="btn btn-secondary btn-sm " style="margin-right:7px" href="{{route('updateclient',$client->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a><a class="btn btn-danger btn-sm " href="{{route('deleteclient',$client->id)}}" onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet client?');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach
    
    
    </tbody>
  </table>
  <div class="text-center">  {{ $clients->links() }}</div>
</div>

@endsection
