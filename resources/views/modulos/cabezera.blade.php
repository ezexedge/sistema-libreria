<header class="main-header">
    <!-- Logo -->
    <a href="{{url('Inicio')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-book" style="font-size:25px;"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Libreria</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(auth()->user()->foto == "")

              <img src="{{url("storage/defecto.png")}}" class="user-image" alt="User Image">

              @else

              <img src="{{url('storage/' . auth()->user()->foto)}}" class="user-image" alt="User Image">

            @endif
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height:80px;">

                <p>
                  {{auth()->user()->name}} - {{auth()->user()->rol}}
                </p>
              </li>
              <!-- Menu Body -->
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('Mis-datos')}}" class="btn btn-default btn-flat">Mis datos</a>
                </div>
                <div class="pull-right">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                  </form>
                </div>
               
              </li>
            </ul>
          </li>
       
        </ul>
      </div>
    </nav>
  </header>

