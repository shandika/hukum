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

<div style="margin-top: 20px">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Kerjaan Staff Hukum</h2>
                <div class="clearfix"></div>
                <div class="dropdown">
                    <select id="job" name="job" class="form-control" required="" />
                        <option disabled selected name="job">Pilih Diagram</option>
                        <option name="job1" value="Newjob">Per Hari</option>
                        <option name="job2" value="Jobpending">Per Bulan</option>
                        <option name="job3" value="Pending">Per Tahun</option>
                    </select>
                </div>
                <br/>

                <div class="form-group">
                    <div>
                        <div name="diagramhari" id="grafik_batangperminggu"></div>
                    </div>
                </div>

                <div>
                    <div name="diagrambulan" id="grafik_batangbulan"></div>
                </div>

                <div>
                    <div name="diagramtahun" id="grafik_batangtahun"></div>  
                </div>                    

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


    <!-- J Query (MENGHIDE DIAGRAM)-->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Menambahkan library Highcharts -->
    <script src="<?php echo base_url('assets/plugins/highcharts/highcharts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/exporting.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/highcharts/export-data.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type='text/javascript'>
        $( document ).ready(function() {
        $("#grafik_batangperminggu").hide();
        $("#grafik_batangbulan").hide();
        $("#grafik_batangtahun").hide();
        });

         $(function () {
            $("#job").change(function () {
                if ($(this).val() == "Newjob") {
                    $("#grafik_batangperminggu").show();
                    $("#grafik_batangbulan").hide();
                    $("#grafik_batangtahun").hide();
                } else if ($(this).val() == "Jobpending") {
                    $("#grafik_batangbulan").show();
                    $("#grafik_batangtahun").hide();
                    $("#grafik_batangperminggu").hide();
                } else {
                    $("#grafik_batangtahun").show();
                    $("#grafik_batangbulan").hide();
                    $("#grafik_batangperminggu").hide();

                }
            });
        });
    </script>

        <!-- Script untuk membuat grafik batang -->
    <!-- HIGHCHART PERTAHUN-->
    <script type="text/javascript">

        Highcharts.chart('grafik_batangtahun', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data Kerja Staff Pertahun'
            },
            subtitle: {
                text: '<?php echo $this->session->userdata('nama_user');?>'
            },
            xAxis: {
                categories: [
                    '2016'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
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
                name: 'Januari',
                data: [515]

            }, {
                name: 'Februari',
                data: [530]

            }, {
                name: 'Maret',
                data: [340]

            }, {
                name: 'April',
                data: [340]

            }, {
                name: 'Mei',
                data: [340]

            }, {
                name: 'Juni',
                data: [200]

            }, {
                name: 'Juli',
                data: [340]

            }, {
                name: 'Agustus',
                data: [340]

            }, {
                name: 'September',
                data: [200]

            }, {
                name: 'Oktober',
                data: [340]

            }, {
                name: 'November',
                data: [340]

            }, {
                name: 'Desember',
                data: [200]

            }]
        });
    </script>

    <!-- HIGHCHART PERBULAN-->
    <script type="text/javascript">

        Highcharts.chart('grafik_batangbulan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data Kerja Staff Perbulan'
            },
            subtitle: {
                text: '<?php echo $this->session->userdata('nama_user');?>'
            },
            xAxis: {
                categories: [
                    '2016'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
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
                name: 'Minggu1',
                data: [515]

            }, {
                name: 'Minggu2',
                data: [530]

            }, {
                name: 'Minggu3',
                data: [340]

            }, {
                name: 'Minggu4',
                data: [340]
            }]
        });        
    </script>

    <!-- HIGHCHART PERMINGGU-->
    <script type="text/javascript">

        Highcharts.chart('grafik_batangperminggu', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data Kerja Staff Perminggu'
            },
            subtitle: {
                text: '<?php echo $this->session->userdata('nama_user');?>'
            },
            xAxis: {
                categories: [
                    '2016'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
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
                name: 'Senin',
                data: [515]

            }, {
                name: 'Selasa',
                data: [530]

            }, {
                name: 'Rabu',
                data: [340]

            }, {
                name: 'Kamis',
                data: [340]

            }, {
                name: 'Jumat',
                data: [340]
            }]
        });        
    </script>
    
    <!-- Sweetalert -->
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
    <script>
      $(document).ready(function() {
          $('#datatable-responsive').dataTable( {
              "aaSorting": [[ 3, "asc" ]]
          } );
      } );
      </script>
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


    <!-- Scrollup-->
    <script type="text/javascript" src="jquery.js"></script>