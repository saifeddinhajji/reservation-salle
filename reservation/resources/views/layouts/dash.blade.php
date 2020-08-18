<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Salles des Fêtes</title>




    
  <!-- font-awesome CSS -->
  <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('template/css/simple-sidebar.css')}}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> <i class="fa fa-angle-double-left" aria-hidden="true"></i><b>  Salles des Fêtes </b><i class="fa fa-angle-double-right" aria-hidden="true"></i> </div>
      <div class="list-group list-group-flush">
      <a class="list-group-item list-group-item-action bg-light" ></a>
       
      <a href="/reservation" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" aria-hidden="true"></i><b> Réservations</b></a>
        <a href="/reservation" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Calendrier réservations</a>
        <a href="/liste_reservation" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Liste réservations</a>
     
     
        <a href="/clients" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" aria-hidden="true"></i><b> Clients</b></a>

        <a href="/clients" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Locataires</a>
        <a href="/clients/add" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Ajouter un locataire </a>

@if(Auth::user()->role=="directeur")
        <a href="/allsalles" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" aria-hidden="true"></i><b> Bien</b></a>
  <a href="{{route('allsalles')}}" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Salles</a>
        <a href="{{route('allautres')}}" class="list-group-item list-group-item-action bg-light">&nbsp;&nbsp;&nbsp;Autres</a>
@endif


        <a class="list-group-item list-group-item-action bg-light"></a>
        <a class="dropdown-item list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       &nbsp;&nbsp;&nbsp; Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
     

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
       @if(Auth::user()->role=="direcrteur")      
        <a class="nav-link" href="{{route('listutlisateur')}}">List Des Comptes <span class="sr-only">(current)</span></a>
      @endif
          
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid" style="padding:40px">
      @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
