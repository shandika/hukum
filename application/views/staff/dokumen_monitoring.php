<div class="col-md-12 col-sm-6 col-xs-12">
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pending</a>
      </li>
      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Finish</a>
      </li>
    </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Dokumen<small>Pending</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="tabelpending" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode Voucher</th>
                          <th>Judul Dokumen</th>
                          <th>Catatan</th>
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
                                $catatan=$i['catatan_admin'];
                                $tanggal_buat=$i['tanggal_buat'];
                                $status=$i['status'];
                                $status_staff=$i['status_inbox_staff'];
                                $status_pembaharuan=$i['status_pembaharuan_staff'];
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
                                <td><?php echo $tanggal_buat;?></td>
                                <td>
                                <?php 
                                if ($status_staff==1) {
                                  echo '<button type="button" class="btn btn-danger btn-xs">Belum Dilihat</button>';
                                } if($status_staff==2){
                                  echo '<button type="button" class="btn btn-success btn-xs">Sudah Dilihat</button>';
                                }if($status_pembaharuan==1) {
                                  echo '<button type="button" class="btn btn-warning btn-xs">Pembaharuan Data</button>';
                                } if($status_pembaharuan==2) {
                                  echo '<button type="button" class="btn btn-success btn-xs">Sudah Ditanggapi</button>';
                                } if($status_pembaharuan==0) {
                                  echo '<button type="button" class="btn btn-danger btn-xs">Tidak Ada Pembaharuan</button>';
                                }
                                ?>
                                </td>
                                <td style="text-align:right;">
                                <a href="<?php echo base_url().'staff/c_staff/get_job_detail/'.$kode_voucher;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
                                </td>
                              </tr>
                      <?php endforeach;?>
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Dokumen<small>Finish</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
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
                          <th>Tanggal Buat</th>
                          <th>Status</th>
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
                      $catatan=$i['catatan_admin'];
                      $tanggal_buat=$i['tanggal_buat'];
                      $status_staff=$i['status_inbox_staff'];
                      $status_pending=$i['status_pending'];
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
                      <td><?php echo $tanggal_buat;?></td>
                      <td>
                      <?php 
                      if ($status_staff==1) {
                        echo '<button type="button" class="btn btn-danger btn-xs">Belum Dilihat</button>';
                      } if($status_staff==2){
                        echo '<button type="button" class="btn btn-success btn-xs">Sudah Dilihat</button>';
                      }
                      ?>
                      </td>
                      <td style="text-align:right;">
                      <a href="<?php echo base_url().'staff/c_staff/get_status_detail/'.$kode_voucher;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
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
</div>
<script src="<?php echo base_url('assets/plugins/chartjs/Chart.min.js'); ?>"></script>
    <!-- Sweetalert -->
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
    <?php else:?>

    <?php endif;?>