
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Staff Hukum<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					         <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah</a>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Foto</th>
                          <th>NIPEG</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $nipeg_user=$i['nipeg_user'];
                       $nama_user=$i['nama_user'];
                       $divisi_user=$i['divisi_user'];
                       $bagian_user=$i['bagian_user'];
                       $foto_user=$i['foto_user'];
                       $username=$i['username'];
                       $job_title=$i['job_title'];
                                    
                    ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><img src="<?php echo base_url().'public/images/staff/'.$foto_user;?>" style="width:90px;"></td>
                      <td><?php echo $nipeg_user;?></td>
                      <td><?php echo $nama_user;?></td>
                      <td style="text-align:right;">
                      <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $nipeg_user;?>"><span class="fa fa-pencil"></span></a>
                      <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $nipeg_user;?>"><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
            <?php endforeach;?>
                      </tbody>
                    </table>
					       
					
                  </div>
                </div>

        <!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add User</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/c_admin/simpan_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="inpuName" placeholder="NAMA" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputNipeg" class="col-sm-4 control-label">NIPEG</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnipeg" class="form-control" id="inputNipeg" placeholder="NIPEG" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDivisi" class="col-sm-4 control-label">Divisi</label>
                                        <div class="col-sm-7">
                                            
                                          <select class="form-control" name="uk" id="uk" />
                                            <option disabled selected name="cb" value="">Pilih Unit Kerja</option>
                                            <?php 
                                            foreach ($unit as $u) {
                                            echo "<option value='$u[nama_unit_kerja]'>$u[nama_unit_kerja]</option>";
                                            }
                                            ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputBagian" class="col-sm-4 control-label">Bagian</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xbagian" class="form-control" id="inputBagian" placeholder="Bagian" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputLevel" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="level" id="level" />
                                            <option disabled selected name="cb" value="">Pilih Level</option>
                                            <option name="admin" value="admin">Admin</option>
                                            <option name="staff" value="staff">Staff</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="inputUsername" placeholder="Username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-4 control-label">Paswword</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputRePassword" class="col-sm-4 control-label">Masukan Ulang Paswword</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xrepassword" class="form-control" id="inputRePassword" placeholder="Password" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" required/>
                                        </div>
                                    </div>
                               

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($data->result_array() as $i) :
                       $no++;
                       $nipeg_user=$i['nipeg_user'];
                       $nama_user=$i['nama_user'];
                       $divisi_user=$i['divisi_user'];
                       $bagian_user=$i['bagian_user'];
                       $foto_user=$i['foto_user'];
                       $username=$i['username'];
                       $password=$i['password'];
                       $level=$i['level'];
                                    
                    ?>
        <div class="modal fade" id="ModalEdit<?php echo $nipeg_user;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/c_admin/update_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                <input type="hidden" name="kode" value="<?php echo $nipeg_user;?>"/> 
                                <input type="hidden" value="<?php echo $foto_user;?>" name="gambar">

                                  <div class="form-group">
                                        <label for="inputName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $nama_user; ?>" type="text" name="xnama" class="form-control" id="inpuName" placeholder="NAMA" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputNipeg" class="col-sm-4 control-label">NIPEG</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $nipeg_user; ?>" type="text" name="xnipeg" class="form-control" id="inputNipeg" placeholder="NIPEG" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDivisi" class="col-sm-4 control-label">Divisi</label>
                                        <div class="col-sm-7">
                                            
                                          <select class="form-control" name="uk" id="uk" />
                                            <option value='' disabled selected <?php if($divisi_user == '0'){ echo 'selected';} ?>>--Pilih--</option>
                                            <?php foreach($unit as $row) { ?>
                                                <option value="<?=$row['nama_unit_kerja']?>" <?php if($row['nama_unit_kerja'] == $divisi_user){ echo 'selected';} ?>><?=$row['nama_unit_kerja']?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputBagian" class="col-sm-4 control-label">Bagian</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $bagian_user; ?>" type="text" name="xbagian" class="form-control" id="inputBagian" placeholder="Bagian" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputLevel" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="level" id="level" />
                                            <option disabled selected name="cb" value='' <?php if($level == '0'){ echo 'selected';} ?>>Pilih Level</option>
                                            <option name="admin" value="admin" <?php if($level == 'admin'){ echo 'selected';} ?>>Admin</option>
                                            <option name="staff" value="staff" <?php if($level == 'staff'){ echo 'selected';} ?>>Staff</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $username; ?>" type="text" name="xusername" class="form-control" id="inputUsername" placeholder="Username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-4 control-label">Paswword</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $password; ?>" type="password" name="xpassword" class="form-control" id="inputPassword" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputRePassword" class="col-sm-4 control-label">Masukan Ulang Paswword</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $password; ?>" type="password" name="xrepassword" class="form-control" id="inputRePassword" placeholder="Password" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $foto_user; ?>" type="file" name="filefoto">
                                        </div>
                                    </div>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
  <!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i) :
                       $no++;
                       $nipeg_user=$i['nipeg_user'];
                       $nama_user=$i['nama_user'];
                       $divisi_user=$i['divisi_user'];
                       $bagian_user=$i['bagian_user'];
                       $foto_user=$i['foto_user'];
                       $username=$i['username'];
                       $password=$i['password'];
                       $level=$i['level'];
                                    
                    ?>
<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $nipeg_user;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/c_admin/hapus_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $nipeg_user;?>"/> 
                     <input type="hidden" value="<?php echo $foto_user;?>" name="gambar">
                  
                            <p>Apakah Anda yakin mau menghapus user <b><?php echo $nama_user;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>

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
    <?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
            Swal.fire({
              title: 'Terimakasih',
              text: 'Data Berhasil Ditambahkan',
              type: 'success'
          });
    </script>
    <?php elseif($this->session->flashdata('msg')=='success-edit'):?>
    <script type="text/javascript">
            Swal.fire({
              title: 'Terimakasih',
              text: 'Data Berhasil Dirubah',
              type: 'success'
          });
    </script>
    <?php elseif($this->session->flashdata('msg')=='password-error'):?>
        <script type="text/javascript">
                Swal.fire({
                  title: 'Perhatian !',
                  text: 'Password Tidak Sama !',
                  type: 'warning'
              });
        </script>
    <?php else:?>

    <?php endif;?>
