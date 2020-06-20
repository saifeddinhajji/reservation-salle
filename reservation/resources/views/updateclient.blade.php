@extends('layouts.dash')

@section('content')
<div class="container">
<h2>Mise A jour de client {{$client->nom}}</h2>    
  <hr>
<form method="post" action="{{route('update',$client->id)}}" >
    @csrf
  <div class="form-row">
  <input type="hidden" name="id" value="{{$client->id}}">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom <sup style="color: red;font-size:20 px;">*</sup></label>
    <input type="text" class="form-control" name="nom" value="{{$client->nom}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prénom <sup style="color: red;font-size:20 px;">*</sup></label>
      <input type="text" class="form-control" name="prenom" value="{{$client->prenom}}" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">CIN <sup style="color: red;font-size:20 px;">*</sup></label>
    <input type="number" class="form-control" name="cin" value="{{$client->cin}}" required>
  </div>
  <div class="form-group">
    <label for="inputAddress">Région / adresse <sup style="color: red;font-size:20 px;">*</sup></label>
    <input type="text" class="form-control" name="region"value="{{$client->region}}"  required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel mobile <sup style="color: red">*</sup></label>
      <input type="number" class="form-control" name="mobile" value="{{$client->mobile}}" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel fixe</label>
      <input type="number" class="form-control" name="fix" value="{{$client->fix}}">
    </div>
  
  </div>
  <button type="submit" class="btn btn-primary pull-right" style="padding:6px 50px">Modifier </button>
</form>
</div>

@endsection
