@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <h2>Listes des autres</h2>  


 


  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <a class="btn btn-primary pull-right" style="margin-bottom:10px"  data-toggle="modal" data-target="#addsalle" >Ajouter un Autre</a>
</div>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID Bien</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Espace</th>
        <th>Type</th>
        <th> Nombre de chambre</th>
        <th>Date de creation </th>
       
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(!$autres)
      aucun autre dans la base de données
      @endif
      @foreach ($autres as $autre)
      <tr>

        <td>{{$autre->id}}</td>
        <td>{{$autre->nom}}</td>
        <td>{{$autre->adresse}}</td>
        <td>{{$autre->espace}}</td>
        <td>{{$autre->type}}</td>
        <td>5</td>
        <td>{{$autre->created_at}}</td>
       
   
      <td class="text-center">
    
      <a class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#updateautre{{$autre->id}}" style="margin-right:7px" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
   <!--modal update---------->
   
<div class="modal fade" id="updateautre{{$autre->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau Autre  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <form method="post" action="{{route('addautre')}}">
        @csrf
            <input type="hidden" value="{{$autre->id}}" name="autre_id">
            <div class="form-group">
                <label style="float: left;">Nom:</label>
                <input type="text" name="nom" value="{{$autre->nom}}" class="form-control" >
            </div>
            <div class="form-group">
                <label style="float: left;">Adresse:</label>
                <input type="text" name="adresse" value="{{$autre->adresse}}" class="form-control" >
            </div>
             <div class="form-group">
                <label style="float: left;" >Espace:</label>
                <input type="number" name="espace" value="{{$autre->espace}}" class="form-control" >
            </div>
              <div class="form-group">
                <label style="float: left;">Nombre de chambre:</label>
                <input type="number" name="nombre_chambre"  value="{{$autre->nombre_chambre}}" class="form-control" >
            </div>
           

              <div class="form-group">
                <label style="float: left;" >Type:</label>
                <select name="type" class="form-control" >
                <option selected disabled>{{$autre->type}}</option>
                <option value="type1">maison</option>
                <option value="type2">dépôt</option>
                <option value="type3">garage</option>
                </select>
            </div>
           
           
           
          
        <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>
   <!------end update modal-->
  <a class="btn btn-danger btn-sm " href="{{route('deleteautre',$autre->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
      </td>
      @endforeach
    
    
    </tbody>
  </table>
  <div class="text-center">  {{ $autres->links() }}</div>
</div>

<div class="modal fade" id="addsalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau Autre  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addautre')}}">
        @csrf
            <div class="form-group">
                <label >Nom:</label>
                <input type="text" name="nom" class="form-control" >
            </div>
            <div class="form-group">
                <label >Adresse:</label>
                <input type="text" name="adresse" class="form-control" >
            </div>
             <div class="form-group">
                <label >Espace:</label>
                <input type="number" name="espace" class="form-control" >
            </div>
              <div class="form-group">
                <label >Nombre de chambre:</label>
                <input type="number" name="nombre_chambre" class="form-control" >
            </div>
           

              <div class="form-group">
                <label >Type:</label>
                <select name="type" class="form-control" >
               <option value="type1">maison</option>
                <option value="type2">dépôt</option>
                <option value="type3">garage</option>

                </select>
            </div>
           
           
           
          
        <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>
@endsection
