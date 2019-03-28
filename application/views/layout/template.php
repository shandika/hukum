
            <!-- Template -->
            <?php
                    $level = $this->session->userdata('level');
                    if ($level == "admin") {
                      $this->load->view('layout/template_admin');
                    } else{
                      $this->load->view('layout/template_staff');
                    }
                 ?>
            <!-- /Template -->

                                <!-- footer content -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span><p>©<?php echo date('Y'); ?> PT. Industri Telekomunikasi Indonesia</p></span>
            </div>
                <a href="#top" class="scrollup"><i class="fa fa-chevron-up"></i></a>    
          </div>
        </footer>

        <!-- /footer content -->
        <script src="<?php echo base_url().'assets/build/js/scroll.js'?>"></script>
        