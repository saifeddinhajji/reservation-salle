@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
<div class="row">
<div class="col-md-9">
 <h2>Listes des réservations</h2> 
</div>
<div class="col-md-3">
  <a href="/liste_reservation/ajouter_reservation"  class="btn-sm btn-primary pull-right" style="margin-bottom:10px" >Ajouter une réservation</a>

</div>
</div>
<hr>
<br>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom Client</th>
        <th>N° tel</th>
        <th>Salle</th>
        <th>Date depart</th>
        <th>Date fin</th>
        <th>Prix</th>
        <th>option</th>
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
        <td>salle {{DB::table('salles')->where('id',$res->salle_id)->select('nom')->value('nom')}}</td>
        <td>{{$res->start_date}}</td>
        <td>{{$res->end_date}} </td>
        <td>{{DB::table('prix-loc')->where('id',$res->prix_id)->select('prix')->value('prix')}} TND</td>
        <td>@if($res->engagement==true) engagement / @endif @if($res->permisdefete==true)  permisdefete @endif /</td>
          <td style="padding: 17px 1px;">
          
                    <a class="btn btn-primary btn-sm "  href="{{route('reglement',$res->id)}}" ><i class="fa fa-info-circle"></i></a>      

          <a class="btn btn-danger btn-sm "  href="{{route('deletereservation',$res->id)}}" ><i class="fa fa-times" aria-hidden="true"></i></a></td>        
        </tr>
      @endforeach
      
    
    </tbody>
  </table>
</div>

@endsection
