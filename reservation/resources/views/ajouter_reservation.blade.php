@extends('layouts.dash')

@section('content')
<div class="container">
  <h2>Ajouter une réservation</h2>    

<br>
  <hr>
<form action="{{route('saveres')}}" method="post">
  @csrf
  <div class="form-row">

 <div class="form-group col-md-6">
    <label >Salle et Prix <sup style="color:red">*</sup></label>
    <select class="form-control" name="prix_id" required>
        <option selected disabled>sélectionnez une salle/prix</option>
        @foreach(DB::table('salles')->get() as $salle)
          <optgroup label="{{$salle->nom}}">
          @foreach (DB::table('prix-loc')->where('salle_id',$salle->id)->get() as $prix)
              <option  value="{{$prix->id}}">{{$prix->prix}} TND<span>({{$prix->datedebut}}--{{$prix->datefin}})<span></option>
          @endforeach
          </optgroup>
        @endforeach
        <input type='hidden' id='salleid'>
      

        
        
    </select>
  </div>
<input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">

  <div class="form-group col-md-6">
      <div class="row">
<div class="col-md-10">
            <label >Client <sup style="color:red">*</sup></label>
      <select class="form-control"  name="client_id" required>
      <option selected disabled>sélectionnez un client</option>
      @foreach (DB::table('clients')->orderby('created_at','desc')->get() as $client)
      <option value="{{$client->id}}">{{$client->nom}}</option>
      @endforeach
    </select>
    </div>
    <div class="col-md-2">
    <br>
    <a class="btn btn-danger btn-sm "  href="/clients/add" style="margin-top: 10px;margin-right:7px;" >+</a>

    </div>
    </div>
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
   <div class="form-group  col-md-6">
  
   
      <label for="example-datetime-local-input" class="col-form-label">Date creation <sup style="color:red">*</sup></label>
      <input class="form-control" type="date" readonly  value="{{ Carbon\Carbon::parse($date)->format('Y-m-d')}}"   >
  </div>


  </div>
  <hr>
  <div class="form-row">
    <div class="col-md-4">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" name="engagement">
        <label class="form-check-label" >engagement</label>
      </div>
    </div>
    <div class="col-md-4">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" name="permisdefete">
          <label class="form-check-label" >Permis de fête </label>
        </div>
    </div>
  </div>
<hr>
  <button type="submit" class="btn-sm btn-danger"  name="action" value="sans" style="padding:6px 50px">+ sans Règlement</button>

  <button type="submit" class="btn-sm btn-danger pull-right" name="action" value="avec" style="padding:6px 50px">+ avec Règlement</button>
</form>
</div>

@endsection
