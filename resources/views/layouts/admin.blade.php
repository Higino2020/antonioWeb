<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Esc. 1008</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/master.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto" action="{{route('material.consultarAll')}}" method="post">
                @csrf
                <div class="search-element">
                  <input class="form-control" type="search" name="valor" placeholder="pesquisa pelo nome ou codigo do material" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <i data-feather="user"></i>> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">{{Auth::user()->name}}</div>
              <a href="{{route('perfil')}}" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Perfil
              </a> 
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>  Sair
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('inicio')}}"> <span class="logo-name" style="font-size: 12px">Esc. 1008</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="dropdown active">
              <a href="{{route('inicio')}}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
            </li>
            @if(Auth::user()->tipo =="Admin")
            <li class="dropdown">
              <a href="{{route('user')}}" class="menu-toggle nav-link"><i data-feather="users"></i><span>Usuarios</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Areas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('area.index')}}">Secções</a></li>
                <li><a class="nav-link" href="{{route('funcio.index')}}">Funcionarios</a></li>
              </ul>
            </li>
            @endif
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Bens</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('cate.index')}}">Categoria</a></li>
                <li><a class="nav-link" href="{{ route('material.index') }}">Materias</a></li>
                <li><a class="nav-link" href="{{ route('entradas.index') }}">Entradas</a></li>
                <li><a class="nav-link" href="{{route('saidas.index')}}">Saidas</a></li>
              </ul>
            </li>
            <li class="menu-header">Relatórios</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="edit"></i><span>Entradas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#Consultar" data-toggle="modal" onclick="consultar('Entradas');">Por Material</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Requisitadas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#Consultar" data-toggle="modal" onclick="consultar('Requisições');">Por Material</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      @include('pages.consultar');
      @yield('patrimonio')
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Patrimonio</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script>
    $(function(){
      $('.alert').fadeOut(5000)
    })
  </script>
   <script>
    function consultar(valor) {
        document.getElementById('tipo').value = valor;
    }
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>