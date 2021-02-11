<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Charts -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo site_url('provinsi/read');?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Provinsi</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('kota/read');?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Kota</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span>
    </a>
    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h4 class="collapse-header">Chart:</h4>
        <a class="collapse-item" href="<?php echo site_url('Chart/pie');?>">Chart Pie</a>
        <a class="collapse-item" href="<?php echo site_url('Chart/column');?>">Chart Column</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>