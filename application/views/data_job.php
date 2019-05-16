<div class="col-md-12 col-sm-6 col-xs-12">
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pending</a>
      </li>
      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Finish</a>
      </li>
    </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Dokumen<small>Pending</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="tabelpending" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode Voucher</th>
                          <th>Unit Kerja</th>
                          <th>Judul Dokumen</th>
                          <th>Catatan</th>
                          <th>Penanggung Jawab</th>
                          <th>Tanggal Buat</th>
                          <th>Timer</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                    
                              foreach ($pending->result_array() as $i) :
                                $kode_voucher=$i['kode_voucher'];
                                $email=$i['email'];
                                $unit_kerja=$i['unit_kerja'];
                                $judul_dokumen=$i['judul_dokumen'];
                                $catatan=$i['catatan'];
                                $tanggal_buat=$i['tgl'];
                                $status=$i['status'];
                                $status_pending=$i['status_pending'];
                                $staff=$i['nama_staff'];
                                $tanggal_mulai=$i['tgl_mulai_kerja'];
                                              
                              ?>
                              <tr>
                                <td><?php echo $kode_voucher;?></td>
                                <td><?php echo $unit_kerja;?></td>
                                <td><?php
                                    $jumlah_karakter = 30;
                                    $cetak = substr($judul_dokumen,0,$jumlah_karakter); 
                                    echo $cetak,"..."; 
                                    ?></td>
                                <td><?php
                                    $jumlah_karakter = 30;
                                    $cetak = substr($catatan,0,$jumlah_karakter); 
                                    echo $cetak,"..."; 
                                    ?></td>
                                <td><?php echo $staff;?></td>
                                <td><?php echo $tanggal_buat;?></td>
                                <td>
                                  <?php 
                                  $awal  = new DateTime($tanggal_mulai); //Waktu awal

                                  $akhir = new DateTime(); // Waktu sekarang atau akhir

                                  $diff  = $awal->diff($akhir);

                                  $daterange     = new DatePeriod($awal, new DateInterval('P1D'), $akhir);
                                  //mendapatkan range antara dua tanggal dan di looping
                                  $i=0;
                                  $x=0;
                                  $j=0;
                                  $akhir=1;

                                  foreach($daterange as $date){
                                  $daterange     = $date->format("Y-m-d h:i:s");
                                  $datetime     = DateTime::createFromFormat('Y-m-d h:i:s', $daterange);

                                  //Convert tanggal untuk mendapatkan nama hari
                                  $day         = $datetime->format('D');

                                  //Check untuk menghitung yang bukan hari sabtu dan minggu
                                  if($day!="Sun" && $day!="Sat") {
                                      //echo $i;
                                      $x    +=    $akhir-$i;
                                  }
                                  $akhir++;
                                  $i++;
                                  }    
                                  if($x>1){
                                    echo $x. ' ' . 'hari, ';
                                    echo $diff->h. ' '. 'jam ';
                                    echo $diff->i. ' '. 'menit ';
                                    
                                  }else{
                                    echo '0'. ' ' . 'hari, ';
                                    echo $diff->h. ' ' . 'jam ';
                                    echo $diff->i. ' ' . 'menit ';
                                  }
                                   ?>
                                </td>
                                <td style="text-align:right;">
                                <a title="Lihat Detail Dokumen" href="<?php echo base_url().'user/c_user/get_job_detail/'.$kode_voucher;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
                                </td>
                              </tr>
                      <?php endforeach;?>
                      </tbody>
                    </table>
                    
          
                  </div>
                </div>
              </div>
        </div>
        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="profile-tab">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Dokumen<small>Finish</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="tabelfinish" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode Voucher</th>
                          <th>Judul Dokumen</th>
                          <th>Catatan</th>
                          <th>Penanggung Jawab</th>
                          <th>Tanggal Buat</th>
                          <th>Tanggal Selesai</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    
                    foreach ($finish->result_array() as $i) :
                      $kode_voucher=$i['kode_voucher'];
                      $email=$i['email'];
                      $unit_kerja=$i['unit_kerja'];
                      $judul_dokumen=$i['judul_dokumen'];
                      $catatan=$i['catatan'];
                      $tanggal_buat=$i['tgl'];
                      $status=$i['status'];
                      $status_pending=$i['status_pending'];
                      $staff=$i['nama_staff'];
                      $tgl_selesai_kerja=$i['tgl_selesai_kerja'];
                                    
                    ?>
                    
                    <tr>
                      <td><?php echo $kode_voucher;?></td>
                      <td><?php
                            $jumlah_karakter = 30;
                            $cetak = substr($judul_dokumen,0,$jumlah_karakter); 
                            echo $cetak,"..."; 
                      ?></td>
                      <td><?php
                          $jumlah_karakter = 30;
                          $cetak = substr($catatan,0,$jumlah_karakter); 
                          echo $cetak,"..."; 
                          ?></td>
                      <td><?php echo $staff;?></td>
                      <td><?php echo $tanggal_buat;?></td>
                      <td><?php echo $tgl_selesai_kerja;?></td>
                      <td style="text-align:right;">
                      <a title="Lihat Detail Dokumen" href="<?php echo base_url().'user/c_user/get_job_detail/'.$kode_voucher;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
                      </td>
                    </tr>
            <?php endforeach;?>
                        </tr>
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
        </div>
      </div>
  </div>
