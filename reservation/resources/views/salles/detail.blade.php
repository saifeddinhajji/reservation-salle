@extends('layouts.dash')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <h2>Detail salle et prix</h2>  


 


  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <a class="btn btn-primary pull-right" style="margin-bottom:10px"  data-toggle="modal" data-target="#addsalle" >Ajouter un Salle</a>
</div>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID Bien</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Capacite de salle</th>
        <th> Date de creation </th>
        <th>Nombre de reservation</th> 
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td>{{$salle->id}}</td>
        <td>{{$salle->nom}}</td>
        <td>{{$salle->adresse}}</td>
        <td>{{$salle->capaciteSal}}</td>
        <td>{{$salle->created_at}}</td>
        <td>{{DB::table('reservations')->where('salle_id',$salle->id)->count()}}</td>
      <td class="text-center">
            <a class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#addlocataire{{$salle->id}}" style="margin-right:7px;background-color:#0589ff !important" >+</a>
      <a class="btn btn-secondary btn-sm " href="{{route('detailsalle',$salle->id)}}" style="margin-right:7px;background-color: #ffc107;"  ><i style="color: red;" class="fa fa-pencil" aria-hidden="true"></i></a>

      <a class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#updatesalle{{$salle->id}}" style="margin-right:7px" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="modal fade" id="updatesalle{{$salle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier salle {{$salle->nom}}  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('updatesalle')}}">
        @csrf
        <input type="hidden" name="salle_id" value="{{$salle->id}}">
            <div class="form-group">
                <label style="float: left;" >Nom:</label>
                <input type="text" name="nom" value="{{$salle->nom}}" class="form-control" >
            </div>
            <div class="form-group">
                <label style="float: left;">Adresse:</label>
                <input type="text" name="adresse" value="{{$salle->adresse}}" class="form-control" >
            </div>
             <div class="form-group">
                <label style=" float: left;">Capacite de Salle:</label>
                <input type="number" name="capaciteSal" value="{{$salle->capaciteSal}}" class="form-control" >
            </div>
           
           
           
          
        <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>

<!--modall add locataire--->
<div class="modal fade" id="addlocataire{{$salle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter prix locataire vers {{$salle->nom}}   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addprixtosalle')}}">
                    @csrf
                    <input type="hidden" name="salle_id" value="{{$salle->id}}">
                    <div class="form-group">
                            <label style="float:left;" >Salle:</label>
                            <input type="text"   class="form-control" value="{{$salle->nom}}"  readonly>
                        </div>
                        <div class="form-group">
                            <label style="float: left;" >date depart:</label>
                            <input type="date" name="datedebut"  class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label style="float: left;">Date fin:</label>
                            <input type="date" name="datefin" class="form-control"  required>
                        </div>
                        
                        <div class="form-group">
                            <label style=" float: left;">Prix:</label>
                            <input type="number" name="prix"  class="form-control" required>
                        </div>
                    <div class="form-group">
                            <label style=" float: left;">Saison:</label>
                            <input type="text" name="saison"  class="form-control" required>
                        </div>
                    
                    
                    
                    <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>
<!----end modal add locataire -->
      <a class="btn btn-danger btn-sm " href="{{route('deletesalle',$salle->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
     
     
      </td>
   
    
    
    </tbody>
  </table>

</div>

<div class="modal fade" id="addsalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau salle  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addsalle')}}">
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
                <label >Capacite de Salle:</label>
                <input type="number" name="capaciteSal" class="form-control" >
            </div>
           
           
           
          
        <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID Prix locataire</th>
        <th>Sasion</td>
        <th>Prix</th>
        <th>Date debut</th>
        <th>Datefin</th>
        <th> Date de creation </th>
        <th>Nombre de reservation</th> 
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($salle->prix as  $pr)
          
      
      <tr>

        <td>{{$pr->id}}</td>
        <td>{{$pr->saison}}</td>
        <td>{{$pr->prix}}</td>
        <td>{{$pr->datedebut}}</td>
        <td>{{$pr->datefin}}</td>
        
        <td>{{$pr->created_at}}</td>
        <td>{{DB::table('reservations')->where('prix_id',$pr->id)->count()}}</td>
        <td>
              <a class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#updateprixloc{{$pr->id}}" style="margin-right:7px" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a class="btn btn-danger btn-sm " href="{{route('deleteprix',$pr->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
<div class="modal fade" id="updateprixloc{{$pr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier prix locataire  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="{{route('updateprixloc')}}">
                    @csrf
                    <input type="hidden" name="prix_id" value="{{$pr->id}}">
                    <div class="form-group">
                            <label style="float:left;" >Salle:</label>
                            <input type="text"   class="form-control" value="{{$salle->nom}}"  readonly>
                        </div>
                        <div class="form-group">
                            <label style="float: left;" >date depart:</label>
                            <input type="date" name="datedebut"  value="{{ Carbon\Carbon::parse($pr->datedebut)->format('Y-m-d')}}"  class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label style="float: left;">Date fin:</label>
                            <input type="date" name="datefin" value="{{ Carbon\Carbon::parse($pr->datefin)->format('Y-m-d')}}" class="form-control"  required>
                        </div>
                        
                        <div class="form-group">
                            <label style=" float: left;">Prix:</label>
                            <input type="number" name="prix"  value="{{$pr->prix}}" class="form-control" required>
                        </div>
                    <div class="form-group">
                            <label style=" float: left;">Saison:</label>
                            <input type="text" name="saison"  value="{{$pr->saison}}" class="form-control" required>
                        </div>
                    
                    
                    
                    <button type="submit"  style="float:right" class="btn btn-primary">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>

        </td>
    </tr>
    @endforeach
    <tbody>
</table>
@endsection
