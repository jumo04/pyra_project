<div class="sidebar" data-color="purple" data-background-color="white">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal" style="letter-spacing: 10px;">
      {{ __('P Y R A') }}
    </a>
  </div>  
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage  == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>Inicio</p>
        </a>
      </li>
      @can('listar-usuarios')
      <li class="nav-item{{ $activePage  == 'user-management' ?  ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">account_box</i>
            <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
      @endcan
      @can('rol-list')
      <li class="nav-item{{ $activePage  == 'rol-management' ?  ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">construction</i>
            <p>{{ __('Roles y Permisos') }}</p>
        </a>
      </li>
      @endcan
      @can('listar-numeros')
      <li class="nav-item{{ $activePage   == 'show_number' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('show_number') }}">
          <i class="material-icons">format_list_numbered</i>
            <p>{{ __('Numeros') }}</p>
        </a>
      </li>
      @endcan
      @can('loteria-listar')
      <li class="nav-item{{ $activePage == 'lotteries' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('lotteries.index') }}">
          <i class="material-icons">ballot</i>
            <p>{{ __('Loteria') }}</p>
        </a>
      </li>
      @endcan
      @can('listar-boletos') 
      <li class="nav-item{{ $activePage  == 'show_ticket' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('show_ticket') }}">
          <i class="material-icons">local_play</i>
            <p>{{ __('Boleto') }}</p>
        </a>
      </li>
      @endcan
      @can('listar-historial')
      <li class="nav-item{{ $activePage == 'histories' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('history.index') }}">
          <i class="material-icons">radio_button_checked</i>
            <p>{{ __('Historial') }}</p>
        </a>
      </li>
      @endcan
    </ul>
  </div>
</div>
