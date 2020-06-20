@extends('layouts.dash')

@section('content')
<div class="container">
  <h2>Ajouter un client</h2>    
  <hr>
  <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="email" class="form-control" name="nom" require>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prénom</label>
      <input type="password" class="form-control" name="prenom" require>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">CIN</label>
    <input type="text" class="form-control" name="cin">
  </div>
  <div class="form-group">
    <label for="inputAddress">Région / adresse</label>
    <input type="text" class="form-control" name="region">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel mobile</label>
      <input type="text" class="form-control" name="mobile">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputCity">N° tel fixe</label>
      <input type="text" class="form-control" name="fix">
    </div>
  
  </div>
  <button type="submit" class="btn btn-primary pull-right" style="padding:6px 50px">Ajouter</button>
</form>
</div>

@endsection
