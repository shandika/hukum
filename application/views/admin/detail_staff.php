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