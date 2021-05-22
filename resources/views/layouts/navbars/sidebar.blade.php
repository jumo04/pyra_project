<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
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
      <li class="nav-item{{ $activePage ?? '' == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">account-box-multiple</i>
          <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'show_number' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('show_number') }}">
          <i class="material-icons">dots-grid</i>
            <p>{{ __('Mostar Numero') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'block' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('block') }}">
          <i class="material-icons">monitor-off</i>
            <p>{{ __('Bloqueo') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'loterry' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('lottery.form') }}">
          <i class="material-icons">monitor-off</i>
            <p>{{ __('Loteria') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'show_ticket' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('show_ticket') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Mostrar Boleto') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.create') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Crear Usuario') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ticket.form') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Mostrar Boleto') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'place' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('place.form') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Agregar Lugar') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
