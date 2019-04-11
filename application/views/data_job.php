 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" id="dokumenmasuk">
                    <h2>Data Dokumen Masuk<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?= base_url('welcome'); ?>"><i class="fa fa-arrow-circle-left" title="Kembali"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="tabeldata2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                       $status=$i['status_pending'];
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
                      if($status==0){
                        echo '<button type="button" class="btn btn-danger btn-xs">Pending</button>';
                      } else{
                        echo '<button type="button" class="btn btn-success btn-xs">Finish</button>';
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
