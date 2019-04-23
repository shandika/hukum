<?php
        $b=$data->row_array();
    ?>

<input type="hidden" name="kode" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="kd" value="<?php echo $b['kode_voucher'];?>">
<input type="hidden" name="stat" value="<?php echo $b['kode_voucher'];?>">


                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail New Job <small><?php echo $b['kode_voucher'];?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-arrow-circle-left" title="Kembali"></i></a></li>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Catatan</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea name="catatan" id="catatan" class="form-control" rows="10" readonly="readonly"><?php echo $b['catatan']?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Catatan Staff</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea readonly="" name="catatanstaff" id="catatanadmin" class="form-control" rows="6"><?php echo $b['catatan_staff']?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Catatan Admin</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea name="catatanadmin" id="catatanadmin" class="form-control" rows="6"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label id="kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Pengerjaan</label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="user" id="user" class="form-control">
                            <option disabled selected>--Pilih--</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label id="lstaff" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penanggungjawab</label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <!-- <input autocomplete="off" value="<?php echo $b['nama_staff']?>" name="country" id="country" type="text" class="form-control">
                          <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul> -->
                          <select name="country" id="country" class="form-control">
                          <option value='' disabled selected <?php if($b['nama_staff'] == '0'){ echo 'selected';} ?>>--Pilih--</option>
                          <?php foreach($staff as $row) { ?>
                              <option value="<?=$row['nama_user']?>" <?php if($row['nama_user'] == $b['nama_staff']){ echo 'selected';} ?>><?=$row['nama_user']?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button id="b_admin" type="submit" class="btn btn-success submit">Kirim</button>
                          <button id="b_staff" type="submit" class="btn btn-primary submit">Kirim</button>
                          <button id="b_user" name="Pending" value="Pending" type="submit" class="btn btn-primary submit">Job Pending</button>
                          <button id="b_finish" name="Finish" value="Finish" type="submit" class="btn btn-success">Finish</button>
                          <button type="button" class="btn btn-danger tombol-delete" href="<?php echo base_url(); ?>admin/c_admin/hapus_job/<?= $b['kode_voucher']; ?>">Hapus</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Sweetalert -->
<script src="<?php echo base_url().'assets/plugins/sweetalerts/sweetalert2.all.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/sweetalerts/myscript.js'?>"></script>
<script>
  $(function () {
        $("#user").change(function () {
            if ($(this).val() == "admin" || $(this).val() == "staff") {
                $("#b_user").hide();
                
            } else {
                $("#b_user").show();
                
            }
        });
    });
</script>
