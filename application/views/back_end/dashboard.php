<!-- page content -->
          <?php
                    $level = $this->session->userdata('level');
                    if ($level == "admin") {
                      $this->load->view('admin/index');
                    } else{
                      $this->load->view('staff/index');
                    }
                 ?>
          
        <!-- /page content -->