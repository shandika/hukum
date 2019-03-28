

<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <?php
                    $level = $this->session->userdata('level');
                    if ($level == "admin") {
                      $this->load->view('layout/sidebar_admin');
                    } else{
                      $this->load->view('layout/sidebar_staff');
                    }
                 ?>
              </div>

            </div>
            <!-- /sidebar menu -->