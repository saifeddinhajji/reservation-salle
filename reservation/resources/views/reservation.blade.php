@extends('layouts.dash')

@section('content')

<link href="{{asset('fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
  <script src="{{asset('fullcalendar/packages/core/main.js')}}"></script>
  <script src="{{asset('fullcalendar/packages/core/locales/fr.js')}}"></script>

    <link href="{{asset('fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
    <script src="{{asset('fullcalendar/packages/daygrid/main.js')}}"></script>


    <link href="{{asset('fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
    <script src="{{asset('fullcalendar/packages/timegrid/main.js')}}"></script>

<script>


var array = @json($reservations);
var array2=[]

array.forEach(function(data, index) {
      
      json={
        id: data.id,
        title: data.client.nom + " " + data.client.prenom +" (salle "+data.salle.nom+")" +" (prix "+data.prix.prix+")"  ,
        start: data.start_date,
        end: data.end_date,
        // url: 'http://127.0.0.1:8000/liste_reservation/ajouter_reservation'
      }
      array2.push(json)
    });



document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "fr-FR",
    plugins: ["dayGrid", "timeGrid"],
    defaultView: "timeGridWeek",
    eventTextColor: "#fff",
    eventBorderColor: "#000",
    start:'2020-09-22',
    header: {
      left: "prev,next today",
      center: "title ",
      right: "timeGridWeek,timeGridDay"
    },
    buttonText: {
      today: "Aujourd'huit",
      week: "Semaine",
      day: "Jour"
    },


    events: array2
    
    
  });

  calendar.render();
});

</script>
<form method="post" class="card" action="{{route('serachres')}}" style="border: none;background-color: #f7f5f5;padding: 9px;">
@csrf
<div class="row" >
<div class="col-md-5">
<div class="form-group">
  <label for="my-input">Date depart</label>
  <input id="my-input" class="form-control"  name="start_date" type="datetime-local" required>
</div>
</div>
<div class="col-md-5">
<div class="form-group">
  <label for="my-input">Date fin</label>
  <input id="my-input" class="form-control"  name="end_date" type="datetime-local" required>
</div>
</div>
<div class="col-md-2">

<button type="sumbit" style="margin-top: 32px;"  class=" form-control btn btn-info btn-sm" >filter</button>
</div>
</div>
</form>
<br>
<hr><br>
<div id='calendar'></div>

@endsection
