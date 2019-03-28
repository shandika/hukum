<div class="x_content">
  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <div class="profile_img">
          <div id="crop-avatar">
             <!-- Current avatar -->
                <img class="img-responsive avatar-view" src="<?php echo base_url().'public/images/staff/'.$this->session->userdata('foto_user');?>" alt="Avatar" title="Change the avatar">
                <br/>        
          </div>
        </div>
    </div>
    <br/>
    <br/>
    
    <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive" >
          <table border="0" >
            <tr >
              <td><h2>Nama</h2></td>
              <td><h5 >:</h5></td>
              <td><h2><?php echo $this->session->userdata('nama_user');?></h2></td>
            </tr>
            <tr >
              <td style="width:70px"> <h2 id="nip">NIPEG</h2></td>
              <td style="width:20px"><h5 >:</h5></td>
              <td><h2><?php echo $this->session->userdata('nipeg_user');?></h2></td>
            </tr>
            <tr >
              <td style="width:100px"> <h2>Unit Kerja</h2></td>
              <td style="width:20px"><h5 >:</h5></td>
              <td><h2><?php echo $this->session->userdata('divisi_user');?></h2></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" id="dokumenmasuk">
                    <h2>Data Dokumen Masuk<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="tabeldata" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode Voucher</th>
                          <th>Judul Dokumen</th>
                          <th>Catatan</th>
                          <th>Penanggung Jawab</th>
                          <th>Tanggal Buat</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    
                    foreach ($data->result_array() as $i) :
                       $kode_voucher=$i['kode_voucher'];
                       $email=$i['email'];
                       $unit_kerja=$i['unit_kerja'];
                       $judul_dokumen=$i['judul_dokumen'];
                       $catatan=$i['catatan'];
                       $tanggal_buat=$i['tgl'];
                       $status=$i['status'];
                       $statusjob=$i['status_job'];
                       $staff=$i['nama_staff'];
                                    
                    ?>
                    
                    <tr>
                      <td><?php echo $kode_voucher;?></td>
                      <td><?php echo $judul_dokumen;?></td>
                      <td><?php
                          $jumlah_karakter = 30;
                          $cetak = substr($catatan,0,$jumlah_karakter); 
                          echo $cetak,"..."; 
                          ?></td>
                      <td><?php echo $staff;?></td>
                      <td><?php echo $tanggal_buat;?></td>
                      <td>
                      <?php 
                      if ($status==0) {
                        echo '<button type="button" class="btn btn-danger btn-xs">Belum Dilihat</button>';
                      } if($status==1){
                        echo '<button type="button" class="btn btn-success btn-xs">Sudah Dilihat</button>';
                      } if($status==2){
                        echo '<button type="button" class="btn btn-warning btn-xs">Pembeharuan Data User</button>';
                      }if($status==3) {
                        echo '<button type="button" class="btn btn-warning btn-xs">Pembeharuan Data Staff</button>';
                      }if($statusjob==2){
                        echo '<button type="button" class="btn btn-info btn-xs">Dikerjakan Staff</button>';
                      } if($statusjob==3){
                        echo '<button type="button" class="btn btn-primary btn-xs">Dikerjakan Admin</button>';
                      }
                      ?>
                      </td>
                      <td style="text-align:right;">
                      <a title="Lihat Detail Dokumen" href="<?php echo base_url().'admin/c_admin/get_job_detail/'.$kode_voucher;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
                      </td>
                    </tr>
            <?php endforeach;?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="graph2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
    <!-- Highcharts -->
    <script src="<?php echo base_url('assets/plugins/highcharts/highcharts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/exporting.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/export-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/sand-signika.js'); ?>"></script>
    
    <!-- Sweetalert -->
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
    
    <?php if($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Data Berhasil Dihapus',
                  type: 'success'
	            });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-finish'):?>
    <script type="text/javascript">
            Swal.fire({
              title: 'Terimakasih',
              text: 'Data Sudah Finish',
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
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Data Sudah Diperbaharui.',
                  type: 'success'
	            });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-login'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Terimakasih',
                  text: 'Selamat Datang <?php echo $this->session->userdata('nama_user');?>.',
                  type: 'success'
	            });
        </script>
    <?php else:?>

    <?php endif;?>
<script>
Highcharts.chart('graph', {
  chart: {
    type: 'column',
    borderWidth : 2
  },
  title: {
    text: 'Monthly Average Rainfall'
  },
  subtitle: {
    text: 'Source: WorldClimate.com'
  },
  xAxis: {
    categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Rainfall (mm)'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: <?php echo $series_data; ?>
});
</script>
<script>
Highcharts.chart('graph2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Monthly Average Rainfall'
  },
  subtitle: {
    text: 'Source: WorldClimate.com'
  },
  xAxis: {
    categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Rainfall (mm)'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Tokyo',
    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

  }, {
    name: 'New York',
    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

  }, {
    name: 'London',
    data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

  }, {
    name: 'Berlin',
    data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

  }]
});
</script>