<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()."Dashboard";?>" class="brand-link">
        <img src="<?= base_url('assets/'); ?>img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Unpad</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url()."Dashboard";?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()."Pengguna";?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()."Bank";?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Bank Kata
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()."Sentimen";?>" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Sentimen
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()."Report";?>" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
