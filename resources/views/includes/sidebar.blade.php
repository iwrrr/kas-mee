<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mb-1">
      <a href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/img/logo-with-text.svg') }}" alt="" width="200">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/img/logo.svg') }}" alt="" width="50">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu Utama</li>
      <li class="nav-item {{ ($currentMenu == 'dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi-grid"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Manajemen</li>
      <li class="nav-item {{ ($currentMenu == 'user') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('user.index') }}"><i class="bi-person"></i><span>User</span></a>
      </li>
      <li class="nav-item {{ ($currentMenu == 'kas') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('kas.index') }}"><i class="bi-journals"></i><span>Kas</span></a>
      </li>
      <li class="nav-item {{ ($currentMenu == 'transaksi') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('transaksi.index') }}"><i class="bi-currency-dollar"></i><span>Transaksi</span></a>
      </li>
    </ul>
  </aside>
</div>