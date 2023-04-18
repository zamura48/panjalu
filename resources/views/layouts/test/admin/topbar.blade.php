<!-- Topbar -->
@if (Auth::user()->role == 'panjalu'){
    <header class="topbar my-color">
        <div class="topbar-left">
          <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>
          <h4 class="text-white"><strong>PANJALU</strong> | Pelayanan Pengaduan Kejaksaan dan Tindak Lanjut</h4>
          {{-- <ul class="topbar-btns ml-500">
            <li class="dropdown">
              <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="{{ asset('vendor') }}/bootstrap-theadmin-master/assets/img/avatar/1.jpg" alt="..."></span>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{url('/logout')}}"><i class="ti-power-off"></i> Logout</a>
              </div>
            </li>
          </ul> --}}
        </div>
      </header>
}
@else{
    <header class="topbar my-color">
        <div class="topbar-left">
          <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>
          <h4 class="text-white"><strong>LAYANAN ANTAR</strong> | Pelayanan Pengajuan Antar Barang Bukti</h4>
          {{-- <ul class="topbar-btn">
            <li class="dropdown">
              <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="{{ asset('vendor') }}/bootstrap-theadmin-master/assets/img/avatar/1.jpg" alt="..."></span>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{url('/logout')}}"><i class="ti-power-off"></i> Logout</a>
              </div>
            </li>
          </ul> --}}
        </div>
      </header>
}
@endif
<!-- END Topbar -->
