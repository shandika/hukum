<?php 
    $query=$this->db->query("SELECT * FROM tbl_new_job WHERE status='0' OR status='2' OR status='3'");
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('public/images/favicon.ico'); ?>" type="image/ico" />

    <title>Dashboard | Admin</title>
    <script language='JavaScript'>
        var txt="<?php echo $title.' - '.$subtitle;?> | ";
            var speed=250;
            var refresh=null;
            function action() { document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresh=setTimeout("action()",speed);}action();
    </script>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet" type="text/css">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet" type="text/css">
    
    <!-- Datatables -->
    <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- JQVMap -->
    <link href="<?php echo base_url('assets/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet" type="text/css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <!-- sidebar menu -->
            <?php $this->load->view('layout/sidebar');?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" class="tombol-logout" type="button" data-placement="top" title="Logout" href="<?php echo base_url('logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url().'public/images/staff/'.$this->session->userdata('foto_user');?>" alt=""><?php echo $this->session->userdata('nama_user');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a class="tombol-logout" type="button" href="<?php echo base_url('logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li title="Pemberitahuan Masuk" role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php echo $jum_pesan;?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php 
                    $inbox=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y') AS tanggal FROM tbl_new_job WHERE status='0' OR status='2' OR status='3' ORDER BY tanggal_buat DESC LIMIT 9");
                    foreach ($inbox->result_array() as $in) :
                        $kode_voucher=$in['kode_voucher'];
                        $unit_kerja=$in['unit_kerja'];
                        $tangal=$in['tanggal'];
                        $catatan=$in['catatan'];
                  ?>
                    <li>
                      <a href="<?php echo base_url().'admin/c_admin/get_job_detail/'.$kode_voucher;?>">
                        <span class="image"><img src="<?php echo base_url().'public/images/staff/'.$this->session->userdata('foto_user');?>" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $unit_kerja; ?></span>
                          <br/>
                          <span class="time"><?php echo $tangal;?></span>
                        </span>
                        <span class="message">
                          <?php
                          $jumlah_karakter = 20;
                          $cetak = substr($catatan,0,$jumlah_karakter); 
                          echo $cetak,"..."; 
                          ?>
                        </span>
                      </a>
                    </li>
                    <?php endforeach;?>
                    <li>
                      <div class="text-center">
                          <strong><?php 
                          if($jum_pesan>0){
                            echo $jum_pesan;
                          }else{
                            echo "Tidak Ada";
                          }
                          ?> Pemberitahuan </strong>
                          <i class="fa fa-angle-right"></i>
                        
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php $this->load->view($view_isi);?>
        </div>

      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jquery/dist/autocomplete.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/vendors/Chart.js/dist/Chart.min.js'); ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('assets/vendors/gauge.js/dist/gauge.min.js'); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js'); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('assets/vendors/skycons/skycons.js'); ?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.pie.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.time.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.stack.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.resize.js'); ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot.curvedlines/curvedLines.js'); ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('assets/vendors/DateJS/build/date.js'); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/vendors/jqvmap/dist/jquery.vmap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js'); ?>"></script>
    
    <!-- Data Tables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>

    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/custom.js'); ?>"></script>

    <!-- Sweetalert -->
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
    
    <script type="text/javascript">
          $(document).ready(function(){
            
            $("#b_staff").hide();
            $("#b_admin").hide();
            $('#tabeldata').dataTable( {
              "aaSorting": [[ 4, "desc" ]]
              } );
              $('#tabelpending').dataTable( {
              "aaSorting": [[ 4, "desc" ]]
              } );
              $('#tabelfinish').dataTable( {
              "aaSorting": [[ 4, "desc" ]]
              } );
              $('#tabelcatatan').dataTable( {
              "aaSorting": [[ 0, "desc" ]]
              } );
            $(function () {
            $("#user").change(function () {
                if ($(this).val() == "admin") {
                  $("#b_admin").show();
                  $("#country").hide();
                  $("#lstaff").hide();
                  $("#b_staff").hide();
                } else {
                  $("#b_staff").show();
                  $("#b_admin").hide();
                  $("#lstaff").show();
                  $("#country").show();
                }
            });
        });
      });
      </script>

      <script type="text/javascript">
      $('.tombol-logout').on('click', function (e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Anda yakin?',
        text: "Anda Akan Logout !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout!'
      }).then((result) => {
        if(result.value == true) {
          document.location.href = href;
        }
      })
    });

    $('.tombol-delete').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Anda yakin?',
      text: "Data akan dihapus!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!'
    }).then((result) => {
      if(result.value == true) {
        document.location.href = href;
        }
      })
    });

    $('.tombol-hapus-status').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Anda yakin?',
      text: "Data akan dihapus!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!'
    }).then((result) => {
      if(result.value == true) {
        document.location.href = href;
      }
      })
    });
    </script>  
  </body>
</html>
