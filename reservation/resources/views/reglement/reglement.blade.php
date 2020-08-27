@extends('layouts.dash')

@section('content')
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
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
                              <h2>Reglement</h2>  
                        </div>
                        <div class="col-md-3">
                        </div> 
                        </div>
  <hr>
            <div class="row">
            
                  <div class="col-md-3">
                  <div class="form-group">
                        <label style="float: left;">Salle:</label>
                        <input type="text" value="salle {{$reservation->salle->nom}}"  class="form-control" readonly>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label style="float: left;">Prix:</label>
                        <input type="text"   class="form-control" value="{{$reservation->prix}}" readonly >
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label style="float: left;">Date Debut:</label>
                        <input type="date"  value="{{ Carbon\Carbon::parse($reservation->start_end)->format('Y-m-d')}}" readonly class="form-control" >
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label style="float: left;">Date Fin:</label>
                        <input type="date" value="{{ Carbon\Carbon::parse($reservation->end_date)->format('Y-m-d')}}" readonly class="form-control" >
                  </div>
                  </div>
            </div>
<hr>

<h4 style="color:#987ff5;font-family: monospace;">Ajouter un Reglement:</h4>
<form action="{{route('addreglement')}}" method="post">
   @csrf
   <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
      <div class="row">
            <div class="col-md-6">
                 
                        
                              <label for="example-datetime-local-input" class="col-form-label">Montant <sup style="color:red">*</sup></label>
                              <input class="form-control" name="montant" type="number"  required >
                        
                  
                 
                              <label >Date creation</label>
                              <input class="form-control"  readonly  value="{{ Carbon\Carbon::parse($date)->format('Y-m-d')}}">
                       
                  
                        
                              <label  >Mehode de payment</label>
                              <select class="form-control" name="type" required id="type">
                                    <option value="espece">Espece</option>
                                    <option value="virement">Virement</option>
                                    <option value="cheque">Cheque</option>
                              </select>
                      
                        <br>
                        <br>
                 
            </div>
           
            <div class="col-md-4">
              <div id="virement" style="display:none">
                   <h6>virement:</h6>
                       <label for="example-datetime-local-input" class="col-form-label">Numero de Virement<sup style="color:red">*</sup></label>
                       <input class="form-control" name="num_virement" type="text" id="required_virement" >
                                       <div class="row" >
                        <div class="col-md-10">
                         <label for="example-datetime-local-input" class="col-form-label">Nom Banque<sup style="color:red">*</sup></label>
                        <select class="form-control" name="nombanque"id="required_banque">
                                    @foreach (DB::table('banques')->get() as  $banque)
                                    <option value="{{$banque->nom}}">{{$banque->nom}}</option>    
                                    @endforeach
                        </select>
                        </div>
                        <div class="col-md-2">
                        <br>
                        
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addbanque" style="margin-top: 17px;margin-right:7px;">+</a>
                        </div>
                        </div>


              </div>
              <div id="cheque" style="display:none">
                <h6>cheque:</h6>
                <label for="example-datetime-local-input" class="col-form-label">Numero de cheque<sup style="color:red">*</sup></label>
                       <input class="form-control" name="num_cheque" type="text" id="required_num_cheque">
                                    <label for="example-datetime-local-input" class="col-form-label">Propriété<sup style="color:red">*</sup></label>
                       <input class="form-control" name="propriete" type="text " id="required_prop">
                      
                        <div class="row" >
                        <div class="col-md-10">
                         <label for="example-datetime-local-input" class="col-form-label">Nom Banque<sup style="color:red">*</sup></label>
                        <select class="form-control" name="nombanque"id="required_banque_cheque">
                                    @foreach (DB::table('banques')->get() as  $banque)
                                    <option value="{{$banque->nom}}">{{$banque->nom}}</option>    
                                    @endforeach
                        </select>
                        </div>
                        <div class="col-md-2">
                        <br>
                        
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addbanque" style="margin-top: 17px;margin-right:7px;">+</a>
                        </div>
                        </div>
              </div>
            </div>
          
      </div>  
      <br><br><br>
              <button  class="btn-sm btn btn-success pull-right"   type="submit" style=";postion:relation" >Valider </button>

            
             


</form>
</div>
<br>
<hr>
<button type="button" onclick="printDiv('printMe')" class="btn btn-primary" style="float:right">Imprimer</button>

<di  id="printMe">
<h2>Historique  des Reglements: </h2>


<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Reglement_id</th>
      <th scope="col">Date de Creation </th>
      <th scope="col">Montant</th>
      <th scope="col">type</th>
      <th scope="col"> Nom Banque</th>
      <th scope="col">Propriété</th>
      <th scope="col">Numero(cheque/virement)</th>
  </tr>
  </thead>
  <tbody>
@foreach($reglements as $reglement)

    <tr>

      <th scope="row">{{$reglement->id}}</th>
      <th scope="row">{{$reglement->created_at->format('d-m-Y')}}</th>
      <td>{{$reglement->montant}}</td>
      <td>{{$reglement->type}}</td>
      <td>
        @if($reglement->type=="cheque")
         @foreach($reglement->cheque as $cheque)
         {{$cheque->nombanque}}
         @endforeach
        @elseif($reglement->type=="virement")
          @foreach($reglement->virement as $virement)
            {{$virement->nombanque}}
          @endforeach
        @else
        ------
        @endif
     </td>
     <td>
      @if($reglement->type=="cheque")
         @foreach($reglement->cheque as $cheque)
         {{$cheque->propriete}}
         @endforeach
        @else
        ------
        @endif
     </td>
      <td>
       @if($reglement->type=="cheque")
         @foreach($reglement->cheque as $cheque)
         {{$cheque->num_cheque}}
         @endforeach
        @elseif($reglement->type=="virement")
          @foreach($reglement->virement as $virement)
            {{$virement->num_virement}}
          @endforeach
        @else
        ------
        @endif
      </td>
    </tr>
    <tr>
@endforeach
<tbody>
</table>
<hr>
<div class="row">
<div class="col-md-9">
Singature
</div>
<div class="col-md-3">

@php 
$total=DB::table('reglements')->where('reservation_id',$reservation->id)->sum('montant');
@endphp
<strong style="color:blue">total:</strong>  {{$total}} TND
<br>

<strong style="color:red">reset:</strong>   {{$reservation->prix-$total}} TND

</div>

</div>
</div>
<!--modaladdbanque-->
<div class="modal fade" id="addbanque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau banque  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('addbanque')}}">
        @csrf
            <div class="form-group">
                <label >Nom de banque:</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
          
            
           
           
           
          
        <button type="submit"   class="btn" style="background-color:#DB7093;float:right">Ajouter</button>
        </form>
        
      </div>

    </div>
  </div>
</div>      
<!--endmodaladdbanque-->
<script  >
/*$('#type').change(function(){
   console.log($("#type option:selected").text());

 /*  
   }*/



$(document).ready(function() {  
    // $('#virement').hide();
    //$('#cheque').show();
    $('#type').change(function(){
        $res=$(this).find("option:selected").attr('value');
       
        switch($res) {
            case "cheque":
            $('#required_num_cheque').attr("required", true);
            $('#required_prop').attr("required", true);
            $('#required_banque_cheque').attr("required", true);
            $('#required_banque').attr("required", false);
            $('#required_virement').attr("required", false);
            $('#cheque').show();
            $('#virement').hide();
            break;
            case "virement":
            $('#required_num_cheque').attr("required", false);
            $('#required_prop').attr("required", false);
            $('#required_banque_cheque').attr("required", false);

            $('#required_banque').attr("required", true);
            $('#required_virement').attr("required", true);
            $('#virement').show();  
            $('#cheque').hide();   
            break;
            default:
            $('#virement').hide();
            $('#required_banque').attr("required", false);
            $('#required_virement').attr("required", false);
            $('#required_num_cheque').attr("required", false);
            $('#required_prop').attr("required", false);
            $('#required_banque_cheque').attr("required", false);
            $('#cheque').hide();
         
            }

    });
 });
 function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
</script>

@endsection
