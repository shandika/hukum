
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
              
              <?php
              //Corporate Finance Bulan Januari
              if(!empty($dc_januari)) {
                foreach($dc_januari as $data){
                    $jumlah1_1[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_1[] = 0;
                  }
                //Corporate Finance Bulan Februari
                if(!empty($dc_februari)) {
                  foreach($dc_februari as $data){
                      $jumlah1_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_2[] = 0;
                  }
                //Corporate Finance Bulan Maret
                if(!empty($dc_maret)) {
                  foreach($dc_maret as $data){
                      $jumlah1_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3[] = 0;
                    } 
                //Corporate Finance Bulan April
                if(!empty($dc_april)) {
                foreach($dc_april as $data){
                  $jumlah1_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_4[] = 0;
                }
                //Corporate Finance Bulan Mei
              if(!empty($dc_mei)) {
                foreach($dc_mei as $data){
                    $jumlah1_5[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_5[] = 0;
                  }
              //Corporate Finance Bulan Juni
              if(!empty($dc_juni)) {
                foreach($dc_juni as $data){
                    $jumlah1_6[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_6[] = 0;
                  }
              //Corporate Finance Bulan Juli
              if(!empty($dc_juli)) {
                foreach($dc_juli as $data){
                    $jumlah1_7[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_7[] = 0;
                  }
              //Corporate Finance Bulan Agustus
              if(!empty($dc_agustus)) {
                foreach($dc_agustus as $data){
                    $jumlah1_8[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_8[] = 0;
                  }
              //Corporate Finance Bulan September
              if(!empty($dc_september)) {
                foreach($dc_september as $data){
                    $jumlah1_9[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_9[] = 0;
                  }
              //Corporate Finance Bulan Oktober
              if(!empty($dc_oktober)) {
                foreach($dc_oktober as $data){
                    $jumlah1_10[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_10[] = 0;
                  }
              //Corporate Finance Bulan November
              if(!empty($dc_november)) {
                foreach($dc_november as $data){
                    $jumlah1_11[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_11[] = 0;
                  }
              //Corporate Finance Bulan Desember
              if(!empty($dc_desember)) {
                foreach($dc_desember as $data){
                    $jumlah1_12[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah1_12[] = 0;
                  }
              //HCMQ Bulan Januari
              if(!empty($hcmq_januari)) {
                foreach($hcmq_januari as $data){
                    $jumlah2_1[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_1[] = 0;
                  }
                //HCMQ Bulan Februari
                if(!empty($hcmq_februari)) {
                  foreach($hcmq_februari as $data){
                      $jumlah2_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah2_2[] = 0;
                  }
                //HCMQ Bulan Maret
                if(!empty($hcmq_maret)) {
                  foreach($hcmq_maret as $data){
                      $jumlah2_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah2_3[] = 0;
                    } 
                //HCMQ Bulan April
                if(!empty($hcmq_april)) {
                foreach($hcmq_april as $data){
                  $jumlah2_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah2_4[] = 0;
                }
                //HCMQ Bulan Mei
              if(!empty($hcmq_mei)) {
                foreach($hcmq_mei as $data){
                    $jumlah2_5[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_5[] = 0;
                  }
              //HCMQ Bulan Juni
              if(!empty($hcmq_juni)) {
                foreach($hcmq_juni as $data){
                    $jumlah2_6[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_6[] = 0;
                  }
              //HCMQ Bulan Juli
              if(!empty($hcmq_juli)) {
                foreach($hcmq_juli as $data){
                    $jumlah2_7[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_7[] = 0;
                  }
              //HCMQ Bulan Agustus
              if(!empty($hcmq_agustus)) {
                foreach($hcmq_agustus as $data){
                    $jumlah2_8[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_8[] = 0;
                  }
              //HCMQ Bulan September
              if(!empty($hcmq_september)) {
                foreach($hcmq_september as $data){
                    $jumlah2_9[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_9[] = 0;
                  }
              //HCMQ Bulan Oktober
              if(!empty($hcmq_oktober)) {
                foreach($hcmq_oktober as $data){
                    $jumlah2_10[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_10[] = 0;
                  }
              //HCMQ Bulan November
              if(!empty($hcmq_november)) {
                foreach($hcmq_november as $data){
                    $jumlah2_11[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_11[] = 0;
                  }
              //HCMQ Bulan Desember
              if(!empty($hcmq_desember)) {
                foreach($hcmq_desember as $data){
                    $jumlah2_12[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah2_12[] = 0;
                  }
              //IT & Umum Bulan Januari
              if(!empty($it_januari)) {
                foreach($it_januari as $data){
                    $jumlah3_1[] = (float) $data->jumlah;
                    }
                  }else{
                    $jumlah3_1[] = 0;
                  }
                //IT & Umum Bulan Februari
                if(!empty($it_februari)) {
                  foreach($it_februari as $data){
                      $jumlah3_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah3_2[] = 0;
                  }
                //IT & Umum Bulan Maret
                if(!empty($it_maret)) {
                  foreach($it_maret as $data){
                      $jumlah3_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_3[] = 0;
                    } 
                //IT & Umum Bulan April
                if(!empty($it_april)) {
                foreach($it_april as $data){
                  $jumlah3_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah3_4[] = 0;
                }
                //IT & Umum Bulan Mei
                if(!empty($it_mei)) {
                  foreach($it_mei as $data){
                      $jumlah3_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_5[] = 0;
                    }
                //IT & Umum Bulan Juni
                if(!empty($it_juni)) {
                  foreach($it_juni as $data){
                      $jumlah3_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_6[] = 0;
                    }
                //IT & Umum Bulan Juli
                if(!empty($it_juli)) {
                  foreach($it_juli as $data){
                      $jumlah3_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_7[] = 0;
                    }
                //IT & Umum Bulan Agustus
                if(!empty($it_agustus)) {
                  foreach($it_agustus as $data){
                      $jumlah3_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_8[] = 0;
                    }
                //IT & Umum Bulan September
                if(!empty($it_september)) {
                  foreach($it_september as $data){
                      $jumlah3_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_9[] = 0;
                    }
                //IT & Umum Bulan Oktober
                if(!empty($it_oktober)) {
                  foreach($it_oktober as $data){
                      $jumlah3_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_10[] = 0;
                    }
                //IT & Umum Bulan November
                if(!empty($it_november)) {
                  foreach($it_november as $data){
                      $jumlah3_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_11[] = 0;
                    }
                //IT & Umum Bulan Desember
                if(!empty($it_desember)) {
                  foreach($it_desember as $data){
                      $jumlah3_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah3_12[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Januari
                if(!empty($pbp_januari)) {
                  foreach($pbp_januari as $data){
                      $jumlah4_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_1[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Februari
                if(!empty($pbp_februari)) {
                  foreach($pbp_februari as $data){
                      $jumlah4_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah4_2[] = 0;
                  }
                //Pengembangan Bisnis dan Produksi Bulan Maret
                if(!empty($pbp_maret)) {
                  foreach($pbp_maret as $data){
                      $jumlah4_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_3[] = 0;
                    } 
                //Pengembangan Bisnis dan Produksi Bulan April
                if(!empty($pbp_april)) {
                foreach($pbp_april as $data){
                  $jumlah4_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah4_4[] = 0;
                }
                //Pengembangan Bisnis dan Produksi Bulan Mei
                if(!empty($pbp_mei)) {
                  foreach($pbp_mei as $data){
                      $jumlah4_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_5[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Juni
                if(!empty($pbp_juni)) {
                  foreach($pbp_juni as $data){
                      $jumlah4_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_6[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Juli
                if(!empty($pbp_juli)) {
                  foreach($pbp_juli as $data){
                      $jumlah4_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_7[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Agustus
                if(!empty($pbp_agustus)) {
                  foreach($pbp_agustus as $data){
                      $jumlah4_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_8[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan September
                if(!empty($pbp_september)) {
                  foreach($pbp_september as $data){
                      $jumlah4_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_9[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Oktober
                if(!empty($pbp_oktober)) {
                  foreach($pbp_oktober as $data){
                      $jumlah4_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_10[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan November
                if(!empty($pbp_november)) {
                  foreach($pbp_november as $data){
                      $jumlah4_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_11[] = 0;
                    }
                //Pengembangan Bisnis dan Produksi Bulan Desember
                if(!empty($pbp_desember)) {
                  foreach($pbp_desember as $data){
                      $jumlah4_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah4_12[] = 0;
                    }
                //Produksi Bulan Januari
                if(!empty($pd_januari)) {
                  foreach($pd_januari as $data){
                      $jumlah5_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_1[] = 0;
                    }
                //Produksi Bulan Februari
                if(!empty($pd_februari)) {
                  foreach($pd_februari as $data){
                      $jumlah5_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah5_2[] = 0;
                  }
                //Produksi Bulan Maret
                if(!empty($pd_maret)) {
                  foreach($pd_maret as $data){
                      $jumlah5_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_3[] = 0;
                    } 
                //Produksi Bulan April
                if(!empty($pd_april)) {
                foreach($pd_april as $data){
                  $jumlah5_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah5_4[] = 0;
                }
                //Produksi Bulan Mei
                if(!empty($pd_mei)) {
                  foreach($pd_mei as $data){
                      $jumlah5_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_5[] = 0;
                    }
                //Produksi Bulan Juni
                if(!empty($pd_juni)) {
                  foreach($pd_juni as $data){
                      $jumlah5_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_6[] = 0;
                    }
                //Produksi Bulan Juli
                if(!empty($pd_juli)) {
                  foreach($pd_juli as $data){
                      $jumlah5_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_7[] = 0;
                    }
                //Produksi Bulan Agustus
                if(!empty($pd_agustus)) {
                  foreach($pd_agustus as $data){
                      $jumlah5_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_8[] = 0;
                    }
                //Produksi Bulan September
                if(!empty($pd_september)) {
                  foreach($pd_september as $data){
                      $jumlah5_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_9[] = 0;
                    }
                //Produksi Bulan Oktober
                if(!empty($pd_oktober)) {
                  foreach($pd_oktober as $data){
                      $jumlah5_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_10[] = 0;
                    }
                //Produksi Bulan November
                if(!empty($pd_november)) {
                  foreach($pd_november as $data){
                      $jumlah5_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_11[] = 0;
                    }
                //Produksi Bulan Desember
                if(!empty($pd_desember)) {
                  foreach($pd_desember as $data){
                      $jumlah5_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah5_12[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Januari
                if(!empty($spi_januari)) {
                  foreach($spi_januari as $data){
                      $jumlah6_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_1[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Februari
                if(!empty($spi_februari)) {
                  foreach($spi_februari as $data){
                      $jumlah6_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah6_2[] = 0;
                  }
                //Satuan Pengawasan Intern Bulan Maret
                if(!empty($spi_maret)) {
                  foreach($spi_maret as $data){
                      $jumlah6_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_3[] = 0;
                    } 
                //Satuan Pengawasan Intern Bulan April
                if(!empty($spi_april)) {
                foreach($spi_april as $data){
                  $jumlah6_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah6_4[] = 0;
                }
                //Satuan Pengawasan Intern Bulan Mei
                if(!empty($spi_mei)) {
                  foreach($spi_mei as $data){
                      $jumlah6_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_5[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Juni
                if(!empty($spi_juni)) {
                  foreach($spi_juni as $data){
                      $jumlah6_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_6[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Juli
                if(!empty($spi_juli)) {
                  foreach($spi_juli as $data){
                      $jumlah6_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_7[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Agustus
                if(!empty($spi_agustus)) {
                  foreach($spi_agustus as $data){
                      $jumlah6_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_8[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan September
                if(!empty($spi_september)) {
                  foreach($spi_september as $data){
                      $jumlah6_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_9[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Oktober
                if(!empty($spi_oktober)) {
                  foreach($spi_oktober as $data){
                      $jumlah6_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_10[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan November
                if(!empty($spi_november)) {
                  foreach($spi_november as $data){
                      $jumlah6_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_11[] = 0;
                    }
                //Satuan Pengawasan Intern Bulan Desember
                if(!empty($spi_desember)) {
                  foreach($spi_desember as $data){
                      $jumlah6_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah6_12[] = 0;
                    }
                //SBU Broadbandn Bulan Januari
                if(!empty($sbub_januari)) {
                  foreach($sbub_januari as $data){
                      $jumlah7_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_1[] = 0;
                    }
                //SBU Broadbandn Bulan Februari
                if(!empty($sbub_februari)) {
                  foreach($sbub_februari as $data){
                      $jumlah7_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah7_2[] = 0;
                  }
                //SBU Broadbandn Bulan Maret
                if(!empty($sbub_maret)) {
                  foreach($sbub_maret as $data){
                      $jumlah7_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_3[] = 0;
                    } 
                //SBU Broadbandn Bulan April
                if(!empty($sbub_april)) {
                foreach($sbub_april as $data){
                  $jumlah7_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah7_4[] = 0;
                }
                //SBU Broadbandn Bulan Mei
                if(!empty($sbub_mei)) {
                  foreach($sbub_mei as $data){
                      $jumlah7_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_5[] = 0;
                    }
                //SBU Broadbandn Bulan Juni
                if(!empty($sbub_juni)) {
                  foreach($sbub_juni as $data){
                      $jumlah7_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_6[] = 0;
                    }
                //SBU Broadband Bulan Juli
                if(!empty($sbub_juli)) {
                  foreach($sbub_juli as $data){
                      $jumlah7_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_7[] = 0;
                    }
                //SBU Broadband Bulan Agustus
                if(!empty($sbub_agustus)) {
                  foreach($sbub_agustus as $data){
                      $jumlah7_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_8[] = 0;
                    }
                //SBU Broadband Bulan September
                if(!empty($sbub_september)) {
                  foreach($sbub_september as $data){
                      $jumlah7_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_9[] = 0;
                    }
                //SBU Broadband Bulan Oktober
                if(!empty($sbub_oktober)) {
                  foreach($sbub_oktober as $data){
                      $jumlah7_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_10[] = 0;
                    }
                //SBU Broadband Bulan November
                if(!empty($sbub_november)) {
                  foreach($sbub_november as $data){
                      $jumlah7_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_11[] = 0;
                    }
                //SBU Broadband Bulan Desember
                if(!empty($sbub_desember)) {
                  foreach($sbub_desember as $data){
                      $jumlah7_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah7_12[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Januari
                if(!empty($sbud_januari)) {
                  foreach($sbud_januari as $data){
                      $jumlah8_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_1[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Februari
                if(!empty($sbud_februari)) {
                  foreach($sbud_februari as $data){
                      $jumlah8_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah8_2[] = 0;
                  }
                //SBU Defense & Digital Service Bulan Maret
                if(!empty($sbud_maret)) {
                  foreach($sbud_maret as $data){
                      $jumlah8_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_3[] = 0;
                    } 
                //SBU Defense & Digital Service Bulan April
                if(!empty($sbud_april)) {
                foreach($sbud_april as $data){
                  $jumlah8_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah8_4[] = 0;
                }
                //SBU Defense & Digital Service Bulan Mei
                if(!empty($sbud_mei)) {
                  foreach($sbud_mei as $data){
                      $jumlah8_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_5[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Juni
                if(!empty($sbud_juni)) {
                  foreach($sbud_juni as $data){
                      $jumlah8_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_6[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Juli
                if(!empty($sbud_juli)) {
                  foreach($sbud_juli as $data){
                      $jumlah8_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_7[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Agustus
                if(!empty($sbud_agustus)) {
                  foreach($sbud_agustus as $data){
                      $jumlah8_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_8[] = 0;
                    }
                //SBU Defense & Digital Service Bulan September
                if(!empty($sbud_september)) {
                  foreach($sbud_september as $data){
                      $jumlah8_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_9[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Oktober
                if(!empty($sbud_oktober)) {
                  foreach($sbud_oktober as $data){
                      $jumlah8_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_10[] = 0;
                    }
                //SBU Defense & Digital Service Bulan November
                if(!empty($sbud_november)) {
                  foreach($sbud_november as $data){
                      $jumlah8_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_11[] = 0;
                    }
                //SBU Defense & Digital Service Bulan Desember
                if(!empty($sbud_desember)) {
                  foreach($sbud_desember as $data){
                      $jumlah8_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah8_12[] = 0;
                    }
                //SBU Smart Energy Bulan Januari
                if(!empty($sbus_januari)) {
                  foreach($sbus_januari as $data){
                      $jumlah9_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_1[] = 0;
                    }
                //SBU Smart Energy Bulan Februari
                if(!empty($sbus_februari)) {
                  foreach($sbus_februari as $data){
                      $jumlah9_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah9_2[] = 0;
                  }
                //SBU Smart Energy Bulan Maret
                if(!empty($sbus_maret)) {
                  foreach($sbus_maret as $data){
                      $jumlah9_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_3[] = 0;
                    } 
                //SBU Smart Energy Bulan April
                if(!empty($sbus_april)) {
                foreach($sbus_april as $data){
                  $jumlah9_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah9_4[] = 0;
                }
                //SBU Smart Energy Bulan Mei
                if(!empty($sbus_mei)) {
                  foreach($sbus_mei as $data){
                      $jumlah9_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_5[] = 0;
                    }
                //SBU Smart Energy Bulan Juni
                if(!empty($sbus_juni)) {
                  foreach($sbus_juni as $data){
                      $jumlah9_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_6[] = 0;
                    }
                //SBU Smart Energy Bulan Juli
                if(!empty($sbus_juli)) {
                  foreach($sbus_juli as $data){
                      $jumlah9_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_7[] = 0;
                    }
                //SBU Smart Energy Bulan Agustus
                if(!empty($sbus_agustus)) {
                  foreach($sbus_agustus as $data){
                      $jumlah9_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_8[] = 0;
                    }
                //SBU Smart Energy Bulan September
                if(!empty($sbus_september)) {
                  foreach($sbus_september as $data){
                      $jumlah9_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_9[] = 0;
                    }
                //SBU Smart Energy Bulan Oktober
                if(!empty($sbus_oktober)) {
                  foreach($sbus_oktober as $data){
                      $jumlah9_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_10[] = 0;
                    }
                //SBU Smart Energy Bulan November
                if(!empty($sbus_november)) {
                  foreach($sbus_november as $data){
                      $jumlah9_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_11[] = 0;
                    }
                //SBU Smart Energy Bulan Desember
                if(!empty($sbus_desember)) {
                  foreach($sbus_desember as $data){
                      $jumlah9_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah9_12[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Januari
                if(!empty($sp_januari)) {
                  foreach($sp_januari as $data){
                      $jumlah10_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_1[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Februari
                if(!empty($sp_februari)) {
                  foreach($sp_februari as $data){
                      $jumlah10_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah10_2[] = 0;
                  }
                //Sekretaris Perusahaan Bulan Maret
                if(!empty($sp_maret)) {
                  foreach($sp_maret as $data){
                      $jumlah10_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_3[] = 0;
                    } 
                //Sekretaris Perusahaan Bulan April
                if(!empty($sp_april)) {
                foreach($sp_april as $data){
                  $jumlah10_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah10_4[] = 0;
                }
                //Sekretaris Perusahaan Bulan Mei
                if(!empty($sp_mei)) {
                  foreach($sp_mei as $data){
                      $jumlah10_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_5[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Juni
                if(!empty($sp_juni)) {
                  foreach($sp_juni as $data){
                      $jumlah10_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_6[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Juli
                if(!empty($sp_juli)) {
                  foreach($sp_juli as $data){
                      $jumlah10_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_7[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Agustus
                if(!empty($sp_agustus)) {
                  foreach($sp_agustus as $data){
                      $jumlah10_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_8[] = 0;
                    }
                //Sekretaris Perusahaan Bulan September
                if(!empty($sp_september)) {
                  foreach($sp_september as $data){
                      $jumlah10_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_9[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Oktober
                if(!empty($sp_oktober)) {
                  foreach($sp_oktober as $data){
                      $jumlah10_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_10[] = 0;
                    }
                //Sekretaris Perusahaan Bulan November
                if(!empty($sp_november)) {
                  foreach($sp_november as $data){
                      $jumlah10_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_11[] = 0;
                    }
                //Sekretaris Perusahaan Bulan Desember
                if(!empty($sp_desember)) {
                  foreach($sp_desember as $data){
                      $jumlah10_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah10_12[] = 0;
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
                  <form action="<?php echo base_url().'admin/c_admin/filter_tahun_staff/';?>" method="get">
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
                  <div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            <div class="clearfix"></div>

            <?php
                //MOHAMAD ADITYA Bulan Januari
                if(!empty($ad_januari)) {
                  foreach($ad_januari as $data){
                      $jumlah1_1_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_1[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Februari
                if(!empty($ad_februari)) {
                  foreach($ad_februari as $data){
                      $jumlah1_1_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_1_2[] = 0;
                  }
                //MOHAMAD ADITYA Bulan Maret
                if(!empty($ad_maret)) {
                  foreach($ad_maret as $data){
                      $jumlah1_1_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_3[] = 0;
                    } 
                //MOHAMAD ADITYA Bulan April
                if(!empty($ad_april)) {
                foreach($ad_april as $data){
                  $jumlah1_1_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_1_4[] = 0;
                }
                //MOHAMAD ADITYA Bulan Mei
                if(!empty($ad_mei)) {
                  foreach($ad_mei as $data){
                      $jumlah1_1_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_5[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Juni
                if(!empty($ad_juni)) {
                  foreach($ad_juni as $data){
                      $jumlah1_1_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_6[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Juli
                if(!empty($ad_juli)) {
                  foreach($ad_juli as $data){
                      $jumlah1_1_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_7[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Agustus
                if(!empty($ad_agustus)) {
                  foreach($ad_agustus as $data){
                      $jumlah1_1_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_8[] = 0;
                    }
                //MOHAMAD ADITYA Bulan September
                if(!empty($ad_september)) {
                  foreach($ad_september as $data){
                      $jumlah1_1_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_9[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Oktober
                if(!empty($ad_oktober)) {
                  foreach($ad_oktober as $data){
                      $jumlah1_1_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_10[] = 0;
                    }
                //MOHAMAD ADITYA Bulan November
                if(!empty($ad_november)) {
                  foreach($ad_november as $data){
                      $jumlah1_1_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_11[] = 0;
                    }
                //MOHAMAD ADITYA Bulan Desember
                if(!empty($ad_desember)) {
                  foreach($ad_desember as $data){
                      $jumlah1_1_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_1_12[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Januari
                if(!empty($nd_januari)) {
                  foreach($nd_januari as $data){
                      $jumlah1_2_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_1[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Februari
                if(!empty($nd_februari)) {
                  foreach($nd_februari as $data){
                      $jumlah1_2_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_2_2[] = 0;
                  }
                //NADYA ARRIZKA HUTAMI Bulan Maret
                if(!empty($nd_maret)) {
                  foreach($nd_maret as $data){
                      $jumlah1_2_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_3[] = 0;
                    } 
                //NADYA ARRIZKA HUTAMI Bulan April
                if(!empty($nd_april)) {
                foreach($nd_april as $data){
                  $jumlah1_2_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_2_4[] = 0;
                }
                //NADYA ARRIZKA HUTAMI Bulan Mei
                if(!empty($nd_mei)) {
                  foreach($nd_mei as $data){
                      $jumlah1_2_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_5[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Juni
                if(!empty($nd_juni)) {
                  foreach($nd_juni as $data){
                      $jumlah1_2_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_6[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Juli
                if(!empty($nd_juli)) {
                  foreach($nd_juli as $data){
                      $jumlah1_2_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_7[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Agustus
                if(!empty($nd_agustus)) {
                  foreach($nd_agustus as $data){
                      $jumlah1_2_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_8[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan September
                if(!empty($nd_september)) {
                  foreach($nd_september as $data){
                      $jumlah1_2_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_9[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Oktober
                if(!empty($nd_oktober)) {
                  foreach($nd_oktober as $data){
                      $jumlah1_2_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_10[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan November
                if(!empty($nd_november)) {
                  foreach($nd_november as $data){
                      $jumlah1_2_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_11[] = 0;
                    }
                //NADYA ARRIZKA HUTAMI Bulan Desember
                if(!empty($nd_desember)) {
                  foreach($nd_desember as $data){
                      $jumlah1_2_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_2_12[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Januari
                if(!empty($pt_januari)) {
                  foreach($pt_januari as $data){
                      $jumlah1_3_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_1[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Februari
                if(!empty($pt_februari)) {
                  foreach($pt_februari as $data){
                      $jumlah1_3_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_3_2[] = 0;
                  }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Maret
                if(!empty($pt_maret)) {
                  foreach($pt_maret as $data){
                      $jumlah1_3_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_3[] = 0;
                    } 
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan April
                if(!empty($pt_april)) {
                foreach($pt_april as $data){
                  $jumlah1_3_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_3_4[] = 0;
                }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Mei
                if(!empty($pt_mei)) {
                  foreach($pt_mei as $data){
                      $jumlah1_3_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_5[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Juni
                if(!empty($pt_juni)) {
                  foreach($pt_juni as $data){
                      $jumlah1_3_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_6[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Juli
                if(!empty($pt_juli)) {
                  foreach($pt_juli as $data){
                      $jumlah1_3_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_7[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Agustus
                if(!empty($pt_agustus)) {
                  foreach($pt_agustus as $data){
                      $jumlah1_3_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_8[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan September
                if(!empty($pt_september)) {
                  foreach($pt_september as $data){
                      $jumlah1_3_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_9[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Oktober
                if(!empty($pt_oktober)) {
                  foreach($pt_oktober as $data){
                      $jumlah1_3_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_10[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan November
                if(!empty($pt_november)) {
                  foreach($pt_november as $data){
                      $jumlah1_3_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_11[] = 0;
                    }
                //PUTTY OCTAVIANY PURWADIPUTRI Bulan Desember
                if(!empty($pt_desember)) {
                  foreach($pt_desember as $data){
                      $jumlah1_3_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_3_12[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Januari
                if(!empty($rd_januari)) {
                  foreach($rd_januari as $data){
                      $jumlah1_4_1[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_1[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Februari
                if(!empty($rd_februari)) {
                  foreach($rd_februari as $data){
                      $jumlah1_4_2[] = (float) $data->jumlah;
                      }
                    }else{
                        $jumlah1_4_2[] = 0;
                  }
                //RADEN SITI SARI DEWI Bulan Maret
                if(!empty($rd_maret)) {
                  foreach($rd_maret as $data){
                      $jumlah1_4_3[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_3[] = 0;
                    } 
                //RADEN SITI SARI DEWI Bulan April
                if(!empty($rd_april)) {
                foreach($rd_april as $data){
                  $jumlah1_4_4[] = (float) $data->jumlah;
                  }
                }else{
                  $jumlah1_4_4[] = 0;
                }
                //RADEN SITI SARI DEWI Bulan Mei
                if(!empty($rd_mei)) {
                  foreach($rd_mei as $data){
                      $jumlah1_4_5[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_5[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Juni
                if(!empty($rd_juni)) {
                  foreach($rd_juni as $data){
                      $jumlah1_4_6[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_6[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Juli
                if(!empty($rd_juli)) {
                  foreach($rd_juli as $data){
                      $jumlah1_4_7[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_7[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Agustus
                if(!empty($rd_agustus)) {
                  foreach($rd_agustus as $data){
                      $jumlah1_4_8[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_8[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan September
                if(!empty($rd_september)) {
                  foreach($rd_september as $data){
                      $jumlah1_4_9[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_9[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Oktober
                if(!empty($rd_oktober)) {
                  foreach($rd_oktober as $data){
                      $jumlah1_4_10[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_10[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan November
                if(!empty($rd_november)) {
                  foreach($rd_november as $data){
                      $jumlah1_4_11[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_11[] = 0;
                    }
                //RADEN SITI SARI DEWI Bulan Desember
                if(!empty($rd_desember)) {
                  foreach($rd_desember as $data){
                      $jumlah1_4_12[] = (float) $data->jumlah;
                      }
                    }else{
                      $jumlah1_4_12[] = 0;
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
                  <form action="<?php echo base_url().'admin/c_admin/filter_tahun_uk/';?>" method="get">
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
                  </form>
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
    <?php elseif($this->session->flashdata('msg')=='success-reset'):?>
    <script type="text/javascript">
            Swal.fire({
              title: 'Terimakasih',
              text: 'Waktu Sudah Direset',
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
    <?php elseif($this->session->flashdata('msg')=='error-reset'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Perhatian !',
                  text: 'Anda Tidak Dapat Mereset Di Waktu Weekend',
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
    type: 'column'
  },
  title: {
    text: 'Chart Data Staff Hukum'
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
    name: 'MOHAMAD ADITYA',
    data: [<?php echo json_encode($jumlah1_1_1);?>,<?php echo json_encode($jumlah1_1_2);?>,<?php echo json_encode($jumlah1_1_3);?>,
           <?php echo json_encode($jumlah1_1_4);?>,<?php echo json_encode($jumlah1_1_5);?>,<?php echo json_encode($jumlah1_1_6);?>,
           <?php echo json_encode($jumlah1_1_7);?>,<?php echo json_encode($jumlah1_1_8);?>,<?php echo json_encode($jumlah1_1_9);?>,
           <?php echo json_encode($jumlah1_1_10);?>,<?php echo json_encode($jumlah1_1_11);?>,<?php echo json_encode($jumlah1_1_12);?>
           ]
  }, {
    name: 'NADYA ARRIZKA HUTAMI',
    data: [<?php echo json_encode($jumlah1_2_1);?>,<?php echo json_encode($jumlah1_2_2);?>,<?php echo json_encode($jumlah1_2_3);?>,
           <?php echo json_encode($jumlah1_2_4);?>,<?php echo json_encode($jumlah1_2_5);?>,<?php echo json_encode($jumlah1_2_6);?>,
           <?php echo json_encode($jumlah1_2_7);?>,<?php echo json_encode($jumlah1_2_8);?>,<?php echo json_encode($jumlah1_2_9);?>,
           <?php echo json_encode($jumlah1_2_10);?>,<?php echo json_encode($jumlah1_2_11);?>,<?php echo json_encode($jumlah1_2_12);?>
           ]
  }, {
    name: 'PUTTY OCTAVIANY PURWADIPUTRI',
    data: [<?php echo json_encode($jumlah1_3_1);?>,<?php echo json_encode($jumlah1_3_2);?>,<?php echo json_encode($jumlah1_3_3);?>,
           <?php echo json_encode($jumlah1_3_4);?>,<?php echo json_encode($jumlah1_3_5);?>,<?php echo json_encode($jumlah1_3_6);?>,
           <?php echo json_encode($jumlah1_3_7);?>,<?php echo json_encode($jumlah1_3_8);?>,<?php echo json_encode($jumlah1_3_9);?>,
           <?php echo json_encode($jumlah1_3_10);?>,<?php echo json_encode($jumlah1_3_11);?>,<?php echo json_encode($jumlah1_3_12);?>
           ]
  }, {
    name: 'RADEN SITI SARI DEWI',
    data: [<?php echo json_encode($jumlah1_4_1);?>,<?php echo json_encode($jumlah1_4_2);?>,<?php echo json_encode($jumlah1_4_3);?>,
           <?php echo json_encode($jumlah1_4_4);?>,<?php echo json_encode($jumlah1_4_5);?>,<?php echo json_encode($jumlah1_4_6);?>,
           <?php echo json_encode($jumlah1_4_7);?>,<?php echo json_encode($jumlah1_4_8);?>,<?php echo json_encode($jumlah1_4_9);?>,
           <?php echo json_encode($jumlah1_4_10);?>,<?php echo json_encode($jumlah1_4_11);?>,<?php echo json_encode($jumlah1_4_12);?>
           ]
  }]
});
</script>
<script>
Highcharts.chart('graph2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Chart Data Divisi'
  },
  subtitle: {
    text: 'per Tahun <?php echo $pilih; ?>'
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
    name: 'Corporate Finance',
    data: [<?php echo json_encode($jumlah1_1);?>,<?php echo json_encode($jumlah1_2);?>,<?php echo json_encode($jumlah1_3);?>,
           <?php echo json_encode($jumlah1_4);?>,<?php echo json_encode($jumlah1_5);?>,<?php echo json_encode($jumlah1_6);?>,
           <?php echo json_encode($jumlah1_7);?>,<?php echo json_encode($jumlah1_8);?>,<?php echo json_encode($jumlah1_9);?>,
           <?php echo json_encode($jumlah1_10);?>,<?php echo json_encode($jumlah1_11);?>,<?php echo json_encode($jumlah1_12);?>
           ]
  }, {
    name: 'Human Capital Management & Quality',
    data: [<?php echo json_encode($jumlah2_1);?>,<?php echo json_encode($jumlah2_2);?>,<?php echo json_encode($jumlah2_3);?>,
           <?php echo json_encode($jumlah2_4);?>,<?php echo json_encode($jumlah2_5);?>,<?php echo json_encode($jumlah2_6);?>,
           <?php echo json_encode($jumlah2_7);?>,<?php echo json_encode($jumlah2_8);?>,<?php echo json_encode($jumlah2_9);?>,
           <?php echo json_encode($jumlah2_10);?>,<?php echo json_encode($jumlah2_11);?>,<?php echo json_encode($jumlah2_12);?>
           ]

  }, {
    name: 'Information Technology & Umum',
    data: [<?php echo json_encode($jumlah3_1);?>,<?php echo json_encode($jumlah3_2);?>,<?php echo json_encode($jumlah3_3);?>,
           <?php echo json_encode($jumlah3_4);?>,<?php echo json_encode($jumlah3_5);?>,<?php echo json_encode($jumlah3_6);?>,
           <?php echo json_encode($jumlah3_7);?>,<?php echo json_encode($jumlah3_8);?>,<?php echo json_encode($jumlah3_9);?>,
           <?php echo json_encode($jumlah3_10);?>,<?php echo json_encode($jumlah3_11);?>,<?php echo json_encode($jumlah3_12);?>
           ]

  }, {
    name: 'Pengembangan Bisnis dan Produksi',
    data: [<?php echo json_encode($jumlah4_1);?>,<?php echo json_encode($jumlah4_2);?>,<?php echo json_encode($jumlah4_3);?>,
           <?php echo json_encode($jumlah4_4);?>,<?php echo json_encode($jumlah4_5);?>,<?php echo json_encode($jumlah4_6);?>,
           <?php echo json_encode($jumlah4_7);?>,<?php echo json_encode($jumlah4_8);?>,<?php echo json_encode($jumlah4_9);?>,
           <?php echo json_encode($jumlah4_10);?>,<?php echo json_encode($jumlah4_11);?>,<?php echo json_encode($jumlah4_12);?>
           ]

  }, {
    name: 'Produksi',
    data: [<?php echo json_encode($jumlah5_1);?>,<?php echo json_encode($jumlah5_2);?>,<?php echo json_encode($jumlah5_3);?>,
           <?php echo json_encode($jumlah5_4);?>,<?php echo json_encode($jumlah5_5);?>,<?php echo json_encode($jumlah5_6);?>,
           <?php echo json_encode($jumlah5_7);?>,<?php echo json_encode($jumlah5_8);?>,<?php echo json_encode($jumlah5_9);?>,
           <?php echo json_encode($jumlah5_10);?>,<?php echo json_encode($jumlah5_11);?>,<?php echo json_encode($jumlah5_12);?>
           ]

  }, {
    name: 'Satuan Pengawasaan Intern',
    data: [<?php echo json_encode($jumlah6_1);?>,<?php echo json_encode($jumlah6_2);?>,<?php echo json_encode($jumlah6_3);?>,
           <?php echo json_encode($jumlah6_4);?>,<?php echo json_encode($jumlah6_5);?>,<?php echo json_encode($jumlah6_6);?>,
           <?php echo json_encode($jumlah6_7);?>,<?php echo json_encode($jumlah6_8);?>,<?php echo json_encode($jumlah6_9);?>,
           <?php echo json_encode($jumlah6_10);?>,<?php echo json_encode($jumlah6_11);?>,<?php echo json_encode($jumlah6_12);?>
           ]

  }, {
    name: 'SBU Broadband',
    data: [<?php echo json_encode($jumlah7_1);?>,<?php echo json_encode($jumlah7_2);?>,<?php echo json_encode($jumlah7_3);?>,
           <?php echo json_encode($jumlah7_4);?>,<?php echo json_encode($jumlah7_5);?>,<?php echo json_encode($jumlah7_6);?>,
           <?php echo json_encode($jumlah7_7);?>,<?php echo json_encode($jumlah7_8);?>,<?php echo json_encode($jumlah7_9);?>,
           <?php echo json_encode($jumlah7_10);?>,<?php echo json_encode($jumlah7_11);?>,<?php echo json_encode($jumlah7_12);?>
           ]

  }, {
    name: 'SBU Defense & Digital Service',
    data: [<?php echo json_encode($jumlah8_1);?>,<?php echo json_encode($jumlah8_2);?>,<?php echo json_encode($jumlah8_3);?>,
           <?php echo json_encode($jumlah8_4);?>,<?php echo json_encode($jumlah8_5);?>,<?php echo json_encode($jumlah8_6);?>,
           <?php echo json_encode($jumlah8_7);?>,<?php echo json_encode($jumlah8_8);?>,<?php echo json_encode($jumlah8_9);?>,
           <?php echo json_encode($jumlah8_10);?>,<?php echo json_encode($jumlah8_11);?>,<?php echo json_encode($jumlah8_12);?>
           ]

  }, {
    name: 'SBU Smart Energy',
    data: [<?php echo json_encode($jumlah9_1);?>,<?php echo json_encode($jumlah9_2);?>,<?php echo json_encode($jumlah9_3);?>,
           <?php echo json_encode($jumlah9_4);?>,<?php echo json_encode($jumlah9_5);?>,<?php echo json_encode($jumlah9_6);?>,
           <?php echo json_encode($jumlah9_7);?>,<?php echo json_encode($jumlah9_8);?>,<?php echo json_encode($jumlah9_9);?>,
           <?php echo json_encode($jumlah9_10);?>,<?php echo json_encode($jumlah9_11);?>,<?php echo json_encode($jumlah9_12);?>
           ]

  }, {
    name: 'Sekretaris Perusahaan',
    data: [<?php echo json_encode($jumlah10_1);?>,<?php echo json_encode($jumlah10_2);?>,<?php echo json_encode($jumlah10_3);?>,
           <?php echo json_encode($jumlah10_4);?>,<?php echo json_encode($jumlah10_5);?>,<?php echo json_encode($jumlah10_6);?>,
           <?php echo json_encode($jumlah10_7);?>,<?php echo json_encode($jumlah10_8);?>,<?php echo json_encode($jumlah10_9);?>,
           <?php echo json_encode($jumlah10_10);?>,<?php echo json_encode($jumlah10_11);?>,<?php echo json_encode($jumlah10_12);?>
           ]

  }]
});
</script>
