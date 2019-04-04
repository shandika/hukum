
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Staff Hukum<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
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
                      <a title="Lihat Detail Staff" href="<?php echo base_url().'admin/c_admin/get_staff_detail/'.$nipeg_user;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square-o"></i> Lihat </a>
                      </td>
                    </tr>
            <?php endforeach;?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
     
