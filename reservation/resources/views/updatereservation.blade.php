@extends('layouts.dash')

@section('content')
<div class="container">
  <h2>Mise Ajour  une réservation</h2>    
  <hr>
<form action="{{route('saveres')}}" method="post">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
    <label >Salle <sup style="color:red">*</sup></label>
    <select class="form-control" name="salle" required>
    <option selected disabled>sélectionnez une salle</option>
      <option value="1">salle 1</option>
      <option value="2">salle 2</option>
    </select>
  </div>

<input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">

    <div class="form-group col-md-6">
      <label >Client <sup style="color:red">*</sup></label>
      <select class="form-control"  name="client_id" required>
      <option selected value="{{$res->client_id}}">{{DB::table('clients')->where('id',$res->client_id)}}</option>
      @foreach (DB::table('clients')->orderby('created_at','desc')->get() as $client)

      <option value="{{$client->id}}">{{$client->nom}}</option>
      @endforeach
      
    </select>
    </div>

  </div>
<hr>

<div class="form-row">

  <div class="form-group  col-md-6">
      <label for="example-datetime-local-input" class="col-form-label">Date début <sup style="color:red">*</sup></label>
      <input class="form-control" type="datetime-local"  name="start_date" required>
  </div>

  <div class="form-group  col-md-6">
      <label for="example-datetime-local-input" class="col-form-label">Date fin <sup style="color:red">*</sup></label>
      <input class="form-control" type="datetime-local"  name="end_date" required>
  </div>

</div>



<div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3" name="description"></textarea>
  </div>


  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Prix <sup style="color:red">*</sup></label>
    <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">TND</span>
        </div>
          <input  type="number" min="0" step="1" placeholder="0"  class="form-control" name="prix" required>
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="inputAddress">Avance <sup style="color:red">*</sup></label>
    <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">TND</span>
        </div>
          <input  type="number" min="0" step="1" placeholder="0"  class="form-control" name="avance" required>
    </div>
  </div>
  </div>

  <button type="submit" class="btn btn-primary pull-right" style="padding:6px 50px">Ajouter</button>
</form>
</div>

@endsection
