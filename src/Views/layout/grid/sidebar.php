<?php

use App\Core\Utils;
?>
<div class="sidebar-brand">
  <!--begin::Brand Link-->
  <a href="./index.html" class="brand-link">
    <!--begin::Brand Image-->
    <!--end::Brand Image-->
    <!--begin::Brand Text-->
    <span class="brand-text fw-light">Management System</span>
    <!--end::Brand Text-->
  </a>
  <!--end::Brand Link-->
</div>

<div class="sidebar-wrapper">
  <nav class="mt-2">
    <!--begin::Sidebar Menu-->
    <ul
      class="nav sidebar-menu flex-column"
      data-lte-toggle="treeview"
      role="menu"
      data-accordion="false">
      <li class="nav-item menu-open">

        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-speedometer"></i>
          <p>
            Dashboard
            <i class="nav-arrow bi bi-chevron-right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link <?= Utils::isActive('/dashboard') ?>">
              <i class="nav-icon bi bi-circle"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/patient" class="nav-link <?= Utils::isActive('/patient') ?>">
              <i class="nav-icon bi bi-circle"></i>
              <p>Patient</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
    <!--end::Sidebar Menu-->
  </nav>
</div>