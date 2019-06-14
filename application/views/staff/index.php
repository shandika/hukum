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
</div>

<?php
                //MOHAMAD ADITYA Bulan Januari
                if(!empty($st_januari)) {
                  foreach($st_januari as $data){
                      $jumlah1_1_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_1[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Februari
                if(!empty($st_februari)) {
                  foreach($st_februari as $data){
                      $jumlah1_1_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_1_2[] = 0;
                  }
                //MOHAMAD ADITYA Bulan Maret
                if(!empty($st_maret)) {
                  foreach($st_maret as $data){
                      $jumlah1_1_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_3[] = 0;
                    } 
                //MOHAMAD ADITYA Bulan April
                if(!empty($st_april)) {
                foreach($st_april as $data){
                  $jumlah1_1_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_1_4[] = 0;
                }
                //MOHAMAD ADITYA Bulan Mei
                if(!empty($st_mei)) {
                  foreach($st_mei as $data){
                      $jumlah1_1_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_5[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Juni
                if(!empty($st_juni)) {
                  foreach($st_juni as $data){
                      $jumlah1_1_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_6[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Juli
                if(!empty($st_juli)) {
                  foreach($st_juli as $data){
                      $jumlah1_1_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_7[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Agustus
                if(!empty($st_agustus)) {
                  foreach($st_agustus as $data){
                      $jumlah1_1_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_8[] = 0;
                    }
                //MOHAMAD ADITYA Bulan September
                if(!empty($st_september)) {
                  foreach($st_september as $data){
                      $jumlah1_1_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_9[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Oktober
                if(!empty($st_oktober)) {
                  foreach($st_oktober as $data){
                      $jumlah1_1_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_10[] = 0;
                    }
                //MOHAMAD ADITYA Bulan November
                if(!empty($st_november)) {
                  foreach($st_november as $data){
                      $jumlah1_1_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_11[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Desember
                if(!empty($st_desember)) {
                  foreach($st_desember as $data){
                      $jumlah1_1_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_12[] = 0;
                    }
                
            ?>

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
                  <form action="<?php echo base_url().'staff/c_staff/filter_tahun_staff/';?>" method="get">
                  <div class="col-md-2 col-sm-2 col-xs-2">
                  <select class="form-control" name="tahun_staff">
                  <option selected="" disabled="" value="0">--Pilih Tahun--</option>
                    <?php
                    $thn_skr = date('Y') - 5;
                    $pilih2 = $_GET['tahun_staff'];
                    for($x = $thn_skr; $x < $thn_skr + 10; $x++){
                      ?>
                    <option value="<?php echo $x ?>" <?php if($x == $pilih2){ echo 'selected';} ?>><?php echo $x ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
                  <button type="submit" class="btn-sm btn-default">Filter</button>
                  </form>
                  <div id="graphtahun" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
        </div>
        <div class="clearfix"></div>

<?php
                //MOHAMAD ADITYA Hari Senin
                if(!empty($sth_senin)) {
                  foreach($sth_senin as $data){
                      $jumlah1_5_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_5_1[] = 0;
                    }
                //MOHAMAD ADITYA Hari Selasa
                if(!empty($sth_selasa)) {
                  foreach($sth_selasa as $data){
                      $jumlah1_5_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_5_2[] = 0;
                  }
                //MOHAMAD ADITYA Hari Rabu
                if(!empty($sth_rabu)) {
                  foreach($sth_rabu as $data){
                      $jumlah1_5_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_5_3[] = 0;
                    } 
                //MOHAMAD ADITYA Hari Kamis
                if(!empty($sth_kamis)) {
                foreach($sth_kamis as $data){
                  $jumlah1_5_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_5_4[] = 0;
                }
                //MOHAMAD ADITYA Hari Jumat
                if(!empty($sth_jumat)) {
                  foreach($sth_jumat as $data){
                      $jumlah1_5_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_5_5[] = 0;
                    }
    ?>

<div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph <small>Month</small></h2>
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
                  <form action="<?php echo base_url().'staff/c_staff/filter_bulan_staff/';?>" method="get">
                  <div class="col-md-2 col-sm-2 col-xs-2">
                  <select class="form-control" name="bulan_filter">
                    <option selected="" disabled="" value="0">--Pilih Bulan--</option>
                    <option value="January">Januari</option>
                    <option value="February">Februari</option>
                    <option value="March">Maret</option>
                    <option value="April">April</option>
                    <option value="May">Mei</option>
                    <option value="June">Juni</option>
                    <option value="July">Juli</option>
                    <option value="August">Agustus</option>
                    <option value="September">September</option>
                    <option value="October">Oktober</option>
                    <option value="November">November</option>
                    <option value="December">Desember</option>
        
                    <?php
                    
                    $pilih3 = $_GET['bulan_filter'];
                    
                    ?>
                  </select>
                  </div>
                  <button type="submit" class="btn-sm btn-default">Filter</button>
                  </form>
                  <div id="graphBulan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Highcharts -->
    <script src="<?php echo base_url('assets/plugins/highcharts/highcharts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/exporting.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/export-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/sand-signika.js'); ?>"></script>
<script>
Highcharts.chart('graphtahun', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Chart Data Dokumen Finish <?php echo $this->session->userdata('nama_user');?>'
  },
  subtitle: {
    text: 'per Tahun <?php echo $pilih2; ?>'
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
      text: 'Dokumen'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.0f} dokumen</b></td></tr>',
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
    name: '<?php echo $this->session->userdata('nama_user');?>',
    data: [<?php echo json_encode($jumlah1_1_1);?>,<?php echo json_encode($jumlah1_1_2);?>,<?php echo json_encode($jumlah1_1_3);?>,
           <?php echo json_encode($jumlah1_1_4);?>,<?php echo json_encode($jumlah1_1_5);?>,<?php echo json_encode($jumlah1_1_6);?>,
           <?php echo json_encode($jumlah1_1_7);?>,<?php echo json_encode($jumlah1_1_8);?>,<?php echo json_encode($jumlah1_1_9);?>,
           <?php echo json_encode($jumlah1_1_10);?>,<?php echo json_encode($jumlah1_1_11);?>,<?php echo json_encode($jumlah1_1_12);?>
           ]
  }]
});
</script>
<script>
Highcharts.chart('graphBulan', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Chart Data Dokumen Finish <?php echo $this->session->userdata('nama_user');?>'
  },
  subtitle: {
    text: 'per Bulan <?php echo $pilih3; ?>'
  },
  xAxis: {
    categories: [
      'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Dokumen'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.0f} dokumen</b></td></tr>',
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
    name: '<?php echo $this->session->userdata('nama_user');?>',
    data: [<?php echo json_encode($jumlah1_5_1);?>,<?php echo json_encode($jumlah1_5_2);?>,<?php echo json_encode($jumlah1_5_3);?>,
           <?php echo json_encode($jumlah1_5_4);?>,<?php echo json_encode($jumlah1_5_5);?>
           ]
  }]
});
</script>
