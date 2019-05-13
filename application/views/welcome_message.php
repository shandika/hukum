<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('public/images/favicon.ico'); ?>" type="image/ico" />

    <title><?php echo $title.' - '.$subtitle;?></title>
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
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet" type="text/css">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        <center><img src="<?php echo base_url().'public/images/Logo-PT-INTI_237-design.png'; ?>" width="200px"></center>
          <section class="login_content">
            <a class="btn btn-default" href="<?php echo base_url('login');?>">Log in</a>
            <a class="btn btn-default" href="<?php echo base_url('user/c_user/lihatData');?>">Lihat Data</a>
            <form name="form_job" action="<?php echo base_url('user/c_user/order_job');?>" method="post">              
              <div>
                <select class="form-control" name="uk" id="uk" />
                  <option disabled selected name="cb" value="">Pilih Unit Kerja</option>
                  <?php 
                  foreach ($unit as $u) {
                  echo "<option value='$u[nama_unit_kerja]'>$u[nama_unit_kerja]</option>";
                  }
                  ?>
                </select>
              </div>
              <br/>
              <div>
                <select id="job" name="job" class="form-control" required="" />
                  <option disabled selected name="job">Job Order</option>
                  <option name="job1" value="New Job">New Job</option>
                  <option name="job2" value="Job Pending">Job Pending</option>
                </select>
              </div>
              <div>
              <input type="text" class="tes">
              </div>
              <br/>
              <div class="form-group">
                <div>
                  <label id="catat"><span class="required fa fa-warning">*</span>Catat Kode Voucher Anda !</label>
                  <input id="kodevoucher" name="kodevoucher" type="text" class="form-control" readonly="readonly" value="<?php echo random_string('alnum', 6); ?>">
                </div>
              </div>
              <div>
                <input name="kodevoucherpending" id="kodevoucherpending" type="text" class="form-control" placeholder="Kode Voucher" />
              </div>
              <div>
                <input name="tglmulai" id="tglmulai" type="text" class="form-control" placeholder="Tanggal Mulai" value="<?php echo date("l, d-m-Y h:i:sa");?>" />
              </div>
              <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
              </div>
              <div>
                <input name="juduldokumen" id="juduldokumen" type="text" class="form-control" placeholder="Judul Dokumen" />
              </div>
              <div>
                <textarea name="catatan" id="catatan" class="form-control" placeholder="Catatan" /> </textarea>
              </div>
              <br/>
              <div>
              <button type="submit" class="btn btn-default submit">Kirim</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©<?php echo date('Y'); ?> PT. Industri Telekomunikasi Indonesia</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
    <!-- Sweetalert -->
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
    
    <script type='text/javascript'>
    $( document ).ready(function() {
    $("#tglmulai").hide();
    $("#juduldokumen").hide();
    $("#catatan").hide();
    $("#kodevoucher").hide();
    $("#kodevoucherpending").hide();
    $("#email").hide();
    $("#uk").hide();
    $("#catat").hide();
    $(".tes").hide();

    });

    $(function () {
        $("#job").change(function () {
            if ($(this).val() == "New Job") {
                $("#kodevoucher").show();
                $("#tglmulai").show();
                $( "#tglmulai" ).prop( "disabled", true );
                $("#juduldokumen").show();
                $("#catatan").show();
                $("#email").show();
                $("#uk").show();
                $("#kodevoucherpending").hide();
                $("#catat").show();
            } else {
                $("#tglmulai").hide();
                $("#juduldokumen").hide();
                $("#kodevoucher").hide();
                $("#uk").hide();
                $("#email").hide();
                $("#kodevoucherpending").show();
                $("#catatan").show();
            }
        });
    });
    </script>
    <?php if($this->session->flashdata('msg')=='error'):?>
    <script type="text/javascript">
                Swal.fire({
                  title: 'Perhatian !',
                  text: 'Kode Voucher yang Anda Masukan Salah !',
                  type: 'warning'
	            });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Data Berhasil Dikirim',
                  type: 'success'
	            });
        </script>
    <?php elseif($this->session->flashdata('msg')=='validasi'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Perhatian !',
                  text: 'Silahkan Isi Seluruh Form !',
                  type: 'warning'
	            });
        </script>
    <?php elseif($this->session->flashdata('msg')=='error-job'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Perhatian !',
                  text: 'Tidak Bisa Kirim Job Saat Hari Weekend !',
                  type: 'warning'
              });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-pending'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Data Sudah Diperbaharui.',
                  type: 'success'
	            });
        </script>
    <?php else:?>

    <?php endif;?>
  </body>
</html>
