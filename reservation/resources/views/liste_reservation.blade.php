@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <h2>Listes des réservations</h2>    
  <a href="/liste_reservation/ajouter_reservation"  class="btn btn-primary pull-right" style="margin-bottom:10px" >Ajouter une réservation</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom Client</th>
        <th>N° tel</th>
        <th>Salle</th>
        <th>Date depart</th>
        <th>Date fin</th>
        <th>Prix</th>
        <th>Avance</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($reservations as $res)
      <tr>
        @php
            $client=DB::table('clients')->where('id',$res->client_id)->first();
        @endphp
        <td>{{$client->nom}}{{$client->prenom}} </td>
      <td>{{$client->mobile}}@if($client->fix) /{{$client->fix}}@endif</td>
        <td>salle {{$res->salle}}</td>
        <td>{{$res->start_date}}</td>
        <td>{{$res->end_date}} </td>
        <td>{{$res->prix}} TND</td>
        <td>{{$res->avance}}TND</td>
          <td class="text-center">

           
            <a class="btn btn-danger btn-sm " href="{{route('deletereservation',$res->id)}}" onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet reservation?');"></i></a>
          </td>
        </tr>
      @endforeach
      
    
    </tbody>
  </table>
</div>

@endsection
