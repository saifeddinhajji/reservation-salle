@extends('layouts.dash')

@section('content')
<div class="container">
  <h2>Ajouter un locataire </h2>    
    <a href="/liste_reservation/ajouter_reservation"  class="btn-sm btn-primary pull-right" style="margin-bottom:10px" >Ajouter une réservation</a>
<br>
  <hr>
  <form method="post" action="{{route('save_clients')}}">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom <sup style="color: red;font-size:20 px;">*</sup></label>
      <input type="text" class="form-control" name="nom" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prénom <sup style="color: red;font-size:20 px;">*</sup></label>
      <input type="text" class="form-control" name="prenom" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">CIN <sup style="color: red;font-size:20 px;">*</sup></label>
    <input type="number" class="form-control" name="cin" required>
  </div>
  <div class="form-group">
    <label for="inputAddress">Région / adresse <sup style="color: red;font-size:20 px;">*</sup></label>
    <input type="text" class="form-control" name="region" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel mobile <sup style="color: red">*</sup></label>
      <input type="number" class="form-control" name="mobile" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel fixe</label>
      <input type="number" class="form-control" name="fix">
    </div>
  
  </div>
  <button type="submit" class="btn-sm btn-primary pull-right" style="padding:6px 50px">Ajouter</button>
</form>
</div>

@endsection
