<?php
        $b=$data->row_array();
    ?>

<input type="hidden" name="kode" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="kd" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="stat" value="<?php echo $b['kode_voucher'];?>">

<div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Job <small><?php echo $b['kode_voucher'];?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?= base_url('dashboard/dokumenmonitoring'); ?>"><i class="fa fa-arrow-circle-left" title="Kembali"></i></a></li>
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
                        <label id="lstaff" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penanggungjawab</label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        <input name="country" id="contry" type="text" class="form-control" readonly="readonly" value="<?php echo $b['nama_staff']?>">
                        </div>
                      </div>
                      <table id="tabelcatatan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                          <a target="_blank" href="<?php echo base_url().'admin/c_admin/cetakPdf/'.$b['kode_voucher'];?>"><button id="b_print" type="button" class="btn btn-primary">Print</button></a>
                          <button type="button" class="btn btn-danger tombol-hapus-status" href="<?php echo base_url(); ?>admin/c_admin/hapus_job/<?= $b['kode_voucher']; ?>">Hapus</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

<!-- Sweetalert -->
<script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>