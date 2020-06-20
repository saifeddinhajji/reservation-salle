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
<form action="{{route('search')}}" method="POST"> @csrf <input type="text"  style="form-control" placeholder="nom,prenom,région" name="search" required> </form>
 
  <a href="/clients/add"  class="btn btn-primary pull-right" style="margin-bottom:10px" >Ajouter un client</a>
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
