

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= base_url('assets/'); ?>img/logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Excellenz App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('user'); ?>" class="nav-link">
              <p>
                WELCOME
              </p>
            </a>
          </li>
          <!-- Query Menu -->
          <?php 
              $role_id = $this->session->userdata('role_id');
              $queryMenu = "SELECT `user_menu`.`id`, `menu`
                              FROM `user_menu` JOIN `user_access_menu` 
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                             WHERE `user_access_menu`.`role_id` = $role_id
                             ORDER BY `user_menu`.`sequence` ASC";
              $menu = $this->db->query($queryMenu)->result_array();
          ?>

          <!-- Looping Menu -->
          <?php foreach ($menu as $m) : ?>
          <li class="nav-header">
            <?= strtoupper($m['menu']); ?>
          </li>

          <!-- Siapkan sub-menu sesuai menu -->
          <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                              FROM `user_sub_menu`
                             WHERE `menu_id` = $menuId
                              AND `is_active` = 1
                              ORDER BY `submenu_sequence`"
                              ;
            $subMenu = $this->db->query($querySubMenu)->result_array();
          
            foreach ($subMenu as $sm) :
          ?>
          <li class="nav-item">
          <?php 
            if ($sm['title'] == $title) :
          ?>
            <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
          <?php else : ?> 
            <a href="<?= base_url($sm['url']); ?>" class="nav-link">
          <?php endif; ?>
              <i class="<?= $sm['icon']; ?>"></i>
              <p><?= $sm['title']; ?></p>
            </a>
          </li>
          <?php endforeach; ?>
          <?php endforeach; ?>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
