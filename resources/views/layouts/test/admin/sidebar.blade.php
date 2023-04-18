<!-- Sidebar -->
{{-- PANJALU --}}
@if (Auth::user()->role == 'panjalu') {
    <aside class="sidebar sidebar-expand-lg sidebar-icons-right sidebar-icons-boxed">
      <header class="sidebar-header my-color">
        <a class="logo-icon" href="../index.html"><img src="{{asset('assets')}}/img/logo.png" alt="logo icon"></a>
        <span class="logo">
          <img src="{{ asset('assets') }}/img/panjalu.png" alt="..." class="w-190px">
        </span>
        <span class="sidebar-toggle-fold"></span>
      </header>

      <nav class="my-subcolor sidebar-navigation">
        <ul class="menu">

          <li class="menu-category">Admin PANJALU</li>

          <li class="menu-item">
            <a class="menu-link" href="{{ url('/panjalu/admin') }}">
              <span class="icon fa fa-bullhorn"></span>
              <span class="title">Layanan Aduan</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="{{ url('/logout') }}">
              <span class="icon ti-power-off"></span>
              <span class="title">Logout</span>
            </a>
          </li>

        </ul>
      </nav>

    </aside>
}
@else{
    {{-- LAYANAN ANTAR --}}
    <aside class="sidebar sidebar-expand-lg sidebar-icons-right sidebar-icons-boxed">
        <header class="sidebar-header my-color">
          <a class="logo-icon" href="../index.html"><img src="{{asset('assets')}}/img/logo.png" alt="logo icon"></a>
          <span class="logo">
            {{-- <img src="{{ asset('assets') }}/img/panjalu.png" alt="..." class="w-190px"> --}}
            <h4 class="text-white">Layanan Antar</h4>
          </span>
          <span class="sidebar-toggle-fold"></span>
        </header>

        <nav class="my-subcolor sidebar-navigation">
          <ul class="menu">

            <li class="menu-category">Admin Layanan Antar</li>

            <li class="menu-item">
              <a class="menu-link" href="{{ url('/panjalu/admin') }}">
                <span class="icon fa fa-bullhorn"></span>
                <span class="title">Layanan Antar</span>
              </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('/logout') }}">
                  <span class="icon ti-power-off"></span>
                  <span class="title">Logout</span>
                </a>
            </li>

          </ul>
        </nav>

      </aside>
}
@endif
<!-- END Sidebar -->
