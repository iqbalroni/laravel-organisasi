<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li class="{{request()->is ('/') ? 'active' : ''}}">
            <a href="/">
              <i class="fa fa-dashboard"></i>Dashboard
            </a>
          </li>
      </ul>
    </div>
    @if (auth()->user()->level == 2)
    <div class="menu_section">
        <h3>Data Organisasi</h3>
        <ul class="nav side-menu">
          <li class="{{request()->is ('siswa') ? 'active' : ''}}">
              <a href="/siswa">
                <i class="fa fa-table"></i>
                Anggota {{ Auth::user()->name }}
              </a>
            </li>
          <li class="{{request()->is ('siswa/add') ? 'active' : ''}}">
              <a href="/siswa/add">
                <i class="fa fa-user-plus"></i>
                Tambah data
              </a>
            </li>
        </ul>

        <br>
        <h3>Export & Import</h3>
        <ul class="nav side-menu">
          
        <li class="{{request()->is ('siswa/print') ? 'active' : ''}}">
          <a><i class="fa fa-pie-chart"></i>Export & Import Data<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="/siswa/print">Export</a></li>
            <li><a href="/siswa/import">Import</a></li>
          </ul>
        </li>
        </ul>
      </div>
    @endif


    {{-- admin --}}
    @if (auth()->user()->level == 1)
    <div class="menu_section">
        <h3>Data Organisasi</h3>
        <ul class="nav side-menu">
          <li class="{{request()->is ('admin') ? 'active' : ''}}">
              <a href="/admin">
                <i class="fa fa-graduation-cap"></i>
                Semua Anggota
              </a>
            </li>
          
        <li class="{{request()->is ('jurusan') ? 'active' : ''}}">
          <a><i class="fa fa-pie-chart"></i>Jurusan<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="/jurusan">Tabel Jurusan</a></li>
            <li><a href="/jurusan/add">Tambah Jurusan</a></li>
          </ul>
        </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Data Pengguna</h3>
        <ul class="nav side-menu">
          <li class="{{request()->is ('organisasi','tabeladmin') ? 'active' : ''}}">
              <a><i class="fa fa-user"></i>Pengguna<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="/tabeladmin">Admin</a></li>
            <li><a href="/organisasi">Users</a></li>
          </ul>
        </li>
        <li class="{{request()->is ('organisasi/add') ? 'active' : ''}}">
          <a href="/organisasi/add">
            <i class="fa fa-user-plus"></i>
            Tambah user
          </a>
        </li>
        </ul>
      </div>
    @endif
  </div>
  <!-- /sidebar menu -->