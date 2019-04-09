<?php
        $b=$data->row_array();
    ?>

<div class="x_content">
  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <div class="profile_img">
          <div id="crop-avatar">
             <!-- Current avatar -->
               <input type="hidden" name="kode" value="<?php echo $b['nipeg_user'];?>">
                <img class="img-responsive avatar-view" src="<?php echo base_url().'public/images/staff/'.$b['foto_user'];?>" alt="Avatar" title="Change the avatar">
          </div>
        </div>
          
            
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <h3><?php echo $b['nama_user'];?></h3>
      <ul class="list-unstyled user_data">
              <li><i class="fa fa-credit-card user-profile-icon"></i> <?php echo $b['nipeg_user'];?>
              </li>
              <li>
                <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $b['divisi_user'];?>
              </li>
      </ul>
    </div>
              <?php
                if(!empty($chart)) {
                  foreach($chart as $data){
                      $jumlah[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah[] = 0;
                    }
              ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Kerjaan <small>Staff Hukum</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      <li><a href="<?= base_url('dashboard/staffdiagram'); ?>"><i class="fa fa-arrow-circle-left" title="Kembali"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="<?php echo base_url().'admin/c_admin/filter_tahun_chart_staff/';?>" method="get">
                  <div class="col-md-2 col-sm-2 col-xs-2">
                  <select class="form-control" name="tahun">
                  <option selected="" disabled="" value="0">--Pilih Tahun--</option>
                    <?php
                    $thn_skr = date('Y') - 5;
                    $pilih = $_GET['tahun'];
                    for($x = $thn_skr; $x < $thn_skr + 10; $x++){
                      ?>
                    <option value="<?php echo $x ?>" <?php if($x == $pilih){ echo 'selected';} ?>><?php echo $x ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
                  <button type="submit" class="btn-sm btn-default">Filter</button>
                  <input type="hidden" name="kdn" value="<?php echo $b['nama_user'];?>">
                  </form>
                  <div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
</div>

    <!-- Highcharts -->
    <script src="<?php echo base_url('assets/plugins/highcharts/highcharts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/exporting.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/export-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/sand-signika.js'); ?>"></script>
    <script>
    Highcharts.chart('graph', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Chart Staff <?php echo $b['nama_user'];?>'
      },
      subtitle: {
        text: 'per Tahun'
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
        name: '<?php echo $b['nama_user'];?>',
        data: [49.9, 71.5, 106.4, <?php echo json_encode($jumlah);?>, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

      }]
    });
    </script>
