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
        title: data.client.nom + " " + data.client.prenom +" (salle "+data.salle+")" ,
        start: data.start_date,
        end: data.end_date
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


<div id='calendar'></div>

@endsection
