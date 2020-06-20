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


    events: [
      {
        id: "1",
        title: "3erss saif",
        start: "2020-06-20T10:30:00",
        end: "2020-06-20T11:30:00"
      },
      {
        id: "1",
        title: "3erssi ena",
        start: "2020-06-20T12:30:00",
        end: "2020-06-20T14:30:00"
      }
    ]
    
    
  });

  calendar.render();
});

</script>


<div id='calendar'></div>

@endsection
