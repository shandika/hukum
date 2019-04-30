<?php
        $b=$data->row_array();
    ?>

<input type="hidden" name="kode" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="kd" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="stat" value="<?php echo $b['kode_voucher'];?>">

<div class="col-md-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title" id="timer">
    <?php
      $mulai = strtotime($b['tgl_mulai_kerja']);
      $terlambat = strtotime($b['tgl_selesai_kerja']);
      $now = time();
        if($mulai == null) : 
    ?>
      <div class="callout callout-success">
      <h4 align="center">Dokumen Berada di Admin.</h4>
      <h4 align="center">Belum Ditanggapi.</h4>
      <br>
      
      </div>
      <?php elseif( $terlambat > $now ) : ?>
        <div class="callout callout-danger">
          <h1 align="center"><i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?=date('Y-m-d H:i:s', strtotime($b['tgl_selesai_kerja']))?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong></h1><br/>
          <h5 align="center">Batas Waktu Pengerjaan.</h5>
        </div>
      <?php else : ?>
        <div class="callout callout-danger">
          <h4 align="center" style="color:red">Batas Waktu Pengerjaan Sudah Habis.</h4>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>

<div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Job <small><?php echo $b['kode_voucher'];?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?= base_url('user/c_user/lihatData'); ?>"><i class="fa fa-arrow-circle-left" title="Kembali"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'admin/c_admin/kirim_job'?>" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Voucher</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input name="kodevoucher" id="kodevoucher" type="text" class="form-control" readonly="readonly" value="<?php echo $b['kode_voucher']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Mulai</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly="readonly" value="<?php echo $b['tanggal_buat']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perkiraan Selesai</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly="readonly" value="<?php echo $b['tanggal_selesai']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Dokumen</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input name="juduldokumen" id="juduldokumen" type="text" class="form-control" readonly="readonly" value="<?php echo $b['judul_dokumen']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Kerja</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input name="unitkerja" id="unitkerja" type="text" class="form-control" readonly="readonly" value="<?php echo $b['unit_kerja']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly="readonly" value="<?php echo $b['email']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label id="lstaff" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penanggungjawab</label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        <input name="country" id="contry" type="text" class="form-control" readonly="readonly" value="<?php echo $b['nama_staff']?>">
                        </div>
                      </div>

                      <table id="tabelcatatan2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Tanggal Masuk</th>
                          <th>Catatan User</th>
                          <th>Catatan Admin</th>
                          <th>Catatan Staff</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    
                    foreach ($catatan->result_array() as $i) :
                      $tgl_masuk=$i['tgl'];
                      $catatan_user=$i['catatan_user'];
                      $catatan_admin=$i['catatan_admin'];
                      $catatan_staff=$i['catatan_staff'];
                    ?>
                    
                    <tr>
                      <td><?php echo $tgl_masuk;?></td>
                      <td><?php echo $catatan_user;?></td>
                      <td><?php echo $catatan_admin;?></td>
                      <td><?php echo $catatan_staff;?></td>
                    </tr>
            <?php endforeach;?>
                        </tr>
                      </tbody>
                    </table>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <a target="_blank" href="<?php echo base_url().'admin/c_admin/cetakPdf/'.$b['kode_voucher'];?>"><button id="b_print" type="button" class="btn btn-primary">Export Pdf</button></a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Sweetalert -->
<script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
<!-- Script Timer -->
<script src="<?=base_url()?>assets/build/js/token.js"></script>
<script type="text/javascript">
  
  function sisawaktu(t){
    var time = new Date(t);
    var n = new Date();
    var x = setInterval(function(){
      var now = new Date().getTime();
      var dis = time.getTime() - now;            
            var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
      var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
      var s = Math.floor((dis % (1000 * 60)) / (1000));
        h = ("0" + h).slice(-2);
      m = ("0" + m).slice(-2);
      s = ("0" + s).slice(-2);
      var cd = h + ":" + m + ":" + s;
      $('.sisawaktu').html(cd);
    }, 100);
    setTimeout(function() {
      waktuHabis();
    }, (time.getTime() - n.getTime()));
  }

  function countdown(t){
    var time = new Date(t);
    var n = new Date();
    var x = setInterval(function(){
      var now = new Date().getTime();
      var dis = time.getTime() - now;
      var d = Math.floor(dis / (1000 * 60 * 60 * 24));
      var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
      var s = Math.floor((dis % (1000 * 60)) / (1000));
      d = ("0" + d).slice(-2);
      h = ("0" + h).slice(-2);
      m = ("0" + m).slice(-2);
      s = ("0" + s).slice(-2);
      var cd = d + " Hari, " + h + " Jam, " + m + " Menit, " + s + " Detik ";
      $('.countdown').html(cd);
      
      setTimeout(function() {
        location.reload()
      }, dis);
    }, 1000);
  }

  function ajaxcsrf(){
    var csrfname = 'csrf_test_name';
    var csrfhash = '89658958aa2f98aee6424a1a75b16647';
    var csrf = {};
    csrf[csrfname] = csrfhash;
    $.ajaxSetup({
      "data": csrf
    });
  }
  
  $(document).ready(function(){
    setInterval(function() {
      var date = new Date();
      var h = date.getHours(), m = date.getMinutes(), s = date.getSeconds();
      h = ("0" + h).slice(-2);
      m = ("0" + m).slice(-2);
      s = ("0" + s).slice(-2);

      var time = h + ":" + m + ":" + s ;
      $('.live-clock').html(time);
    }, 1000);
  });
</script>
