@extends('layouts.dash')

@section('content')
<div class="container">
  <h2>Listes des clients</h2>    
  <a href="/clients/add"  class="btn btn-primary pull-right" style="margin-bottom:10px" >Ajouter un client</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>CIN</th>
        <th>N° de tel mobile</th>
        <th>N° de tel fixe</th>
        <th>N° de tel region</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Assidi</td>
        <td>Wassim</td>
        <td>12659399</td>
        <td>53877262</td>
        <td>77000000</td>
        <td>Tunis</td>
        <td class="text-center"><a class="btn btn-secondary btn-sm " style="margin-right:7px"><i class="fa fa-pencil" aria-hidden="true"></i></a><a class="btn btn-danger btn-sm "><i class="fa fa-times" aria-hidden="true"></i></a></td>
      </tr>
    
    </tbody>
  </table>
</div>

@endsection
