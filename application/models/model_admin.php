<?php

class Model_admin extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_staff(){
        $hsl=$this->db->query("SELECT * FROM tbl_user WHERE level='staff' ORDER BY nama_user ASC");
        return $hsl;
    }
    function get_all_users(){
        $hsl=$this->db->query("SELECT * FROM tbl_user ORDER BY nama_user ASC");
        return $hsl;
    }
    function get_staff_by_kode($kode){
        $hsl=$this->db->query("SELECT * FROM tbl_user where nipeg_user='$kode'");
        return $hsl;
    }
    function get_all_dokumen(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='0'");
        return $hsl;
    }
    function get_dokumen_belumdibaca(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='0' AND status='0' OR status='2' OR status='3'");
        return $hsl;
    }
    function get_dokumen_sudahdibaca(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='0' AND status='1'");
        return $hsl;
    }
    function finish_dokumen($kode,$catatanadmin,$tglselesai,$admin){
        $hsl=$this->db->query("update tbl_new_job set catatan_admin='$catatanadmin',tgl_selesai_kerja='$tglselesai',status_pending='1' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_admin) values ('$kode','$admin','$catatanadmin')");
        return $hsl;
    }
    function get_pending_dokumen(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='0'");
        return $hsl;
    }
    function get_finish_dokumen(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='1'");
        return $hsl;
    }
    function get_job_by_kode($kode){
        $hsl=$this->db->query("SELECT * FROM tbl_new_job where kode_voucher='$kode'");
        return $hsl;
    }
    function update_status_inbox($kd){
		$hsl=$this->db->query("UPDATE tbl_new_job SET status='1' where kode_voucher='$kd'");
		return $hsl;
    }
    function hapus_job($kode){
        $hsl=$this->db->query("delete from tbl_catatan where kode_voucher='$kode'");
        $hsl.=$this->db->query("delete from tbl_new_job where kode_voucher='$kode'");
        
		return $hsl;
    }
    function reset_waktu($kode,$tgl,$tglselesaikerja){
        $hsl=$this->db->query("UPDATE tbl_new_job SET tgl_mulai_kerja='$tgl', tgl_selesai_kerja='$tglselesaikerja' where kode_voucher='$kode'");
        
        return $hsl;
    }
    function reset_waktu2($kode,$tgl,$tglselesaikerja2){
        $hsl=$this->db->query("UPDATE tbl_new_job SET tgl_mulai_kerja='$tgl', tgl_selesai_kerja='$tglselesaikerja2' where kode_voucher='$kode'");
        
        return $hsl;
    }
    function reset_waktu3($kode,$tgl,$tglselesaikerja3){
        $hsl=$this->db->query("UPDATE tbl_new_job SET tgl_mulai_kerja='$tgl', tgl_selesai_kerja='$tglselesaikerja3' where kode_voucher='$kode'");
        
        return $hsl;
    }
    function reset_waktu4($kode,$tgl,$tglselesaikerja4){
        $hsl=$this->db->query("UPDATE tbl_new_job SET tgl_mulai_kerja='$tgl', tgl_selesai_kerja='$tglselesaikerja4' where kode_voucher='$kode'");
        
        return $hsl;
    }
    function kirim_job($kode,$staff_nipeg,$staff_nama,$tglselesai,$job,$tglmulai){
        $hsl=$this->db->query("update tbl_new_job set status_pengerjaan='0',nipeg='$staff_nipeg',nama='$staff_nama',level_user='$job',tgl_mulai_kerja='$tglmulai',tgl_selesai_kerja='$tglselesai' where kode_voucher='$kode'");
		return $hsl;
    }
    public function GetRow($keyword) {        
        $this->db->order_by('nipeg_user', 'DESC');
        $this->db->like("nama_user", $keyword);
        $this->db->where('level','staff');
        return $this->db->get('tbl_user')->result_array();
    }
    public function tampil_data()
	{
		$query = $this->db->get('tbl_user');
		return $query;
    }
    function simpan_job($kode,$catatanadmin,$namastaff,$job,$admin){
        $hsl=$this->db->query("update tbl_new_job set catatan_admin='$catatanadmin',nama_staff='$namastaff',status_job='2',status_inbox_staff='1',status_pembaharuan_staff='1' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_admin) values ('$kode','$admin','$catatanadmin')");
		return $hsl;
    }
    function simpan_job_admin($kode,$catatanadmin,$admin,$job){
        $hsl=$this->db->query("update tbl_new_job set catatan_admin='$catatanadmin',nama_staff='$admin',status_job='3' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_admin) values ('$kode','$admin','$catatanadmin')");
        return $hsl;
    }
    function simpan_job_user($kode,$catatanadmin,$namastaff,$admin){
        $hsl=$this->db->query("update tbl_new_job set catatan_admin='$catatanadmin',nama_staff='$namastaff',status_job='2',status_inbox_staff='1',status_pembaharuan_staff='1' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_admin) values ('$kode','$admin','$catatanadmin')");
        return $hsl;
    }
    function simpan_user($nama,$nipeg,$divisi,$bagian,$level,$username,$p,$gambar){
        $hsl=$this->db->query("insert into tbl_user(nama_user,nipeg_user,divisi_user,bagian_user,foto_user,level,username,password) values ('$nama','$nipeg','$divisi','$bagian','$gambar','$level','$username','$p')");
        return $hsl;
    }
    function update_user($nipeg_user,$nama,$nipeg,$divisi,$bagian,$level,$username,$password,$gambar){
        $hsl=$this->db->query("update tbl_user set nama_user='$nama',nipeg_user='$nipeg',divisi_user='$divisi',bagian_user='$bagian',foto_user='$gambar',level='$level',username='$username',password='$password' where nipeg_user='$nipeg_user'");
        return $hsl;
    }
    function update_user_tanpa_gambar($nipeg_user,$nama,$nipeg,$divisi,$bagian,$level,$username,$password){
        $hsl=$this->db->query("update tbl_user set nama_user='$nama',nipeg_user='$nipeg',divisi_user='$divisi',bagian_user='$bagian',level='$level',username='$username',password='$password' where nipeg_user='$nipeg_user'");
        return $hsl;
    }
    function hapus_user($kode){
       $hsl=$this->db->query("delete from tbl_user where nipeg_user='$kode'");
        return $hsl;
    }
    function staff(){
        $this->db->order_by('nipeg_user','ASC');
        $this->db->where('level','staff');
        $staff= $this->db->get('tbl_user');
        return $staff->result_array();
    }
    function catatan($kode){
        $hsl=$this->db->query("SELECT tbl_catatan.*,DATE_FORMAT(tgl_masuk,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_catatan WHERE kode_voucher='$kode' ORDER BY tgl_masuk ASC");
        return $hsl;
    }
    function get_unit_kerja(){
        $this->db->order_by('id_uk','ASC');
        $unit= $this->db->get('tbl_unit_kerja');
        return $unit->result_array();
    }

    //Model Untuk Chart Unit Kerja
    //Chart Divisi Corporate Finance bulan Januari
    function get_unit_dc_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)=date('Y') GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan Februari
    function get_unit_dc_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Corporate Finance bulan Maret
     function get_unit_dc_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Corporate Finance bulan April
     function get_unit_dc_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Corporate Finance bulan Mei
     function get_unit_dc_mei($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi Corporate Finance bulan Juni
    function get_unit_dc_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan Juli
    function get_unit_dc_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan Agustus
    function get_unit_dc_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan September
    function get_unit_dc_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan Oktober
    function get_unit_dc_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan November
    function get_unit_dc_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Corporate Finance bulan Desember
    function get_unit_dc_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Corporate Finance' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //akhir divisi Corporate Finance

    //Chart Divisi HCMQ bulan Januari
    function get_unit_hcmq_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan Februari
    function get_unit_hcmq_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi HCMQ bulan Maret
     function get_unit_hcmq_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi HCMQ bulan April
     function get_unit_hcmq_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi HCMQ bulan Mei
     function get_unit_hcmq_mei($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi HCMQ bulan Juni
    function get_unit_hcmq_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan Juli
    function get_unit_hcmq_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan Agustus
    function get_unit_hcmq_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan September
    function get_unit_hcmq_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan Oktober
    function get_unit_hcmq_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan November
    function get_unit_hcmq_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi HCMQ bulan Desember
    function get_unit_hcmq_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Human Capital Management & Quality' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi HCMQ

    //Chart Divisi IT & Umum bulan Januari
    function get_unit_it_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan Februari
    function get_unit_it_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi IT & Umum bulan Maret
     function get_unit_it_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi IT & Umum bulan April
     function get_unit_it_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi IT & Umum bulan Mei
     function get_unit_it_mei($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi IT & Umum bulan Juni
    function get_unit_it_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan Juli
    function get_unit_it_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan Agustus
    function get_unit_it_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan September
    function get_unit_it_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan Oktober
    function get_unit_it_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan November
    function get_unit_it_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi IT & Umum bulan Desember
    function get_unit_it_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Information Technology & Umum' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi It & Umum

    //Chart Divisi Pengembangan Bisnis & Produksi bulan Januari
    function get_unit_pbp_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Februari
    function get_unit_pbp_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Pengembangan Bisnis & Produksi bulan Maret
     function get_unit_pbp_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Pengembangan Bisnis & Produksi bulan April
     function get_unit_pbp_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Pengembangan Bisnis & Produksi bulan Mei
     function get_unit_pbp_mei($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Juni
    function get_unit_pbp_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Juli
    function get_unit_pbp_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Agustus
    function get_unit_pbp_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan September
    function get_unit_pbp_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Oktober
    function get_unit_pbp_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan November
    function get_unit_pbp_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Pengembangan Bisnis & Produksi bulan Desember
    function get_unit_pbp_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Pengembangan Bisnis dan Produksi' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi Pengembangan Bisnis & Produksi

    //Chart Divisi Produksi bulan Januari
    function get_unit_pd_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Februari
    function get_unit_pd_februari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Maret
    function get_unit_pd_maret($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan April
    function get_unit_pd_april($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Mei
    function get_unit_pd_mei($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
         }
     }
    //Chart Divisi Produksi bulan Juni
    function get_unit_pd_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Juli
    function get_unit_pd_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Agustus
    function get_unit_pd_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan September
    function get_unit_pd_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Oktober
    function get_unit_pd_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan November
    function get_unit_pd_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Produksi bulan Desember
    function get_unit_pd_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Produksi' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi Produksi

    //Chart Divisi Satuan Pengawasaan Intern bulan Januari
    function get_unit_spi_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan Februari
    function get_unit_spi_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Satuan Pengawasaan Intern bulan Maret
     function get_unit_spi_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Satuan Pengawasaan Intern bulan April
     function get_unit_spi_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi Satuan Pengawasaan Intern bulan Mei
     function get_unit_spi_mei($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi Satuan Pengawasaan Intern bulan Juni
    function get_unit_spi_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan Juli
    function get_unit_spi_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan Agustus
    function get_unit_spi_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan September
    function get_unit_spi_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan Oktober
    function get_unit_spi_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan November
    function get_unit_spi_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Satuan Pengawasaan Intern bulan Desember
    function get_unit_spi_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Satuan Pengawasan Intern' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi Satuan Pengawasaan Intern

    //Chart Divisi SBU Broadband bulan Januari
    function get_unit_sbub_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan Februari
    function get_unit_sbub_februari($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi SBU Broadband bulan Maret
     function get_unit_sbub_maret($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi SBU Broadband bulan April
     function get_unit_sbub_april($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart Divisi SBU Broadband bulan Mei
     function get_unit_sbub_mei($tahun){
         $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart Divisi SBU Broadband bulan Juni
    function get_unit_sbub_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan Juli
    function get_unit_sbub_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SSBU Broadband bulan Agustus
    function get_unit_sbub_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan September
    function get_unit_sbub_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan Oktober
    function get_unit_sbub_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan November
    function get_unit_sbub_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Broadband bulan Desember
    function get_unit_sbub_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Broadband' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi SBU Broadband

    //Chart Divisi SBU Defense & Digital Service bulan Januari
    function get_unit_sbud_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Februari
    function get_unit_sbud_februari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Maret
    function get_unit_sbud_maret($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan April
    function get_unit_sbud_april($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Mei
    function get_unit_sbud_mei($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Juni
    function get_unit_sbud_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Juli
    function get_unit_sbud_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Agustus
    function get_unit_sbud_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan September
    function get_unit_sbud_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Oktober
    function get_unit_sbud_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan November
    function get_unit_sbud_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Defense & Digital Service bulan Desember
    function get_unit_sbud_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Defense & Digital Service' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi SBU Defense & Digital Service

    //Chart Divisi SBU Smart Energy bulan Januari
    function get_unit_sbus_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Februari
    function get_unit_sbus_februari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Maret
    function get_unit_sbus_maret($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan April
    function get_unit_sbus_april($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Mei
    function get_unit_sbus_mei($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Juni
    function get_unit_sbus_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Juli
    function get_unit_sbus_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Agustus
    function get_unit_sbus_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan September
    function get_unit_sbus_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Oktober
    function get_unit_sbus_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan November
    function get_unit_sbus_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi SBU Smart Energy bulan Desember
    function get_unit_sbus_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='SBU Smart Energy' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi SBU Smart Energy

    //Chart Divisi Sekretaris Perusahaan bulan Januari
    function get_unit_sp_januari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='1' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Februari
    function get_unit_sp_februari($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='2' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Maret
    function get_unit_sp_maret($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='3' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan April
    function get_unit_sp_april($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='4' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Mei
    function get_unit_sp_mei($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='5' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Juni
    function get_unit_sp_juni($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='6' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Juli
    function get_unit_sp_juli($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='7' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Agustus
    function get_unit_sp_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='8' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan September
    function get_unit_sp_september($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='9' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Oktober
    function get_unit_sp_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='10' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan November
    function get_unit_sp_november($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='11' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart Divisi Sekretaris Perusahaan bulan Desember
    function get_unit_sp_desember($tahun){
        $query = $this->db->query("SELECT COUNT(unit_kerja) AS jumlah FROM tbl_new_job WHERE unit_kerja='Sekretaris Perusahaan' AND MONTH(tanggal_buat)='12' AND YEAR(tanggal_buat)='$tahun' GROUP BY unit_kerja");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir divisi Sekretaris Perusahaan
    //Akhir Chart Unit Kerja

    //Model Untuk Chart Staff Job Finish
    //Chart MOHAMAD ADITYA bulan Januari
    function get_staff_ad_januari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Februari
    function get_staff_ad_februari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Maret
     function get_staff_ad_maret($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan April
     function get_staff_ad_april($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Mei
     function get_staff_ad_mei($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart MOHAMAD ADITYA bulan Juni
    function get_staff_ad_juni($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Juli
    function get_staff_ad_juli($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Agustus
    function get_staff_ad_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan September
    function get_staff_ad_september($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Oktober
    function get_staff_ad_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan November
    function get_staff_ad_november($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Desember
    function get_staff_ad_desember($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //akhir chart MOHAMAD ADITYA

    //Chart NADYA ARRIZKA HUTAMI bulan Januari
    function get_staff_nd_januari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Februari
    function get_staff_nd_februari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart NADYA ARRIZKA HUTAMI bulan Maret
    function get_staff_nd_maret($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan April
    function get_staff_nd_april($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Mei
    function get_staff_nd_mei($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Juni
    function get_staff_nd_juni($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Juli
    function get_staff_nd_juli($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Agustus
    function get_staff_nd_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan September
    function get_staff_nd_september($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Oktober
    function get_staff_nd_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan November
    function get_staff_nd_november($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Desember
    function get_staff_nd_desember($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart NADYA ARRIZKA HUTAMI

    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Januari
    function get_staff_pt_januari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Februari
    function get_staff_pt_februari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Maret
    function get_staff_pt_maret($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan April
    function get_staff_pt_april($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Mei
    function get_staff_pt_mei($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Juni
    function get_staff_pt_juni($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Juli
    function get_staff_pt_juli($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Agustus
    function get_staff_pt_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan September
    function get_staff_pt_september($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Oktober
    function get_staff_pt_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan November
    function get_staff_pt_november($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Desember
    function get_staff_pt_desember($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart PUTTY OCTAVIANY PURWADIPUTRI

    //Chart RADEN SITI SARI DEWI bulan Januari
    function get_staff_rd_januari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Februari
    function get_staff_rd_februari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart RADEN SITI SARI DEWI bulan Maret
    function get_staff_rd_maret($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan April
    function get_staff_rd_april($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Mei
    function get_staff_rd_mei($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Juni
    function get_staff_rd_juni($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Juli
    function get_staff_rd_juli($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Agustus
    function get_staff_rd_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan September
    function get_staff_rd_september($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Oktober
    function get_staff_rd_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan November
    function get_staff_rd_november($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Desember
    function get_staff_rd_desember($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart RADEN SITI SARI DEWI

    //Chart EZRA LONTOH bulan Januari
    function get_staff_ez_januari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan Februari
    function get_staff_ez_februari($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart EZRA LONTOH bulan Maret
     function get_staff_ez_maret($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart EZRA LONTOH bulan April
     function get_staff_ez_april($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart EZRA LONTOH bulan Mei
     function get_staff_ez_mei($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart EZRA LONTOH bulan Juni
    function get_staff_ez_juni($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan Juli
    function get_staff_ez_juli($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan Agustus
    function get_staff_ez_agustus($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan September
    function get_staff_ez_september($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan Oktober
    function get_staff_ez_oktober($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan November
    function get_staff_ez_november($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart EZRA LONTOH bulan Desember
    function get_staff_ez_desember($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='EZRA LONTOH' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //akhir chart MOHAMAD ADITYA
    //Akhir chart Staff

    //Model Untuk Chart Staff Job Pending
    //Chart MOHAMAD ADITYA bulan Januari
    function get_staff_ad_januari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Februari
    function get_staff_ad_februari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Maret
     function get_staff_ad_maret_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan April
     function get_staff_ad_april_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Mei
     function get_staff_ad_mei_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart MOHAMAD ADITYA bulan Juni
    function get_staff_ad_juni_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Juli
    function get_staff_ad_juli_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Agustus
    function get_staff_ad_agustus_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan September
    function get_staff_ad_september_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Oktober
    function get_staff_ad_oktober_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan November
    function get_staff_ad_november_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Desember
    function get_staff_ad_desember_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //akhir chart MOHAMAD ADITYA

    //Chart NADYA ARRIZKA HUTAMI bulan Januari
    function get_staff_nd_januari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Februari
    function get_staff_nd_februari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart NADYA ARRIZKA HUTAMI bulan Maret
    function get_staff_nd_maret_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan April
    function get_staff_nd_april_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Mei
    function get_staff_nd_mei_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Juni
    function get_staff_nd_juni_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Juli
    function get_staff_nd_juli_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Agustus
    function get_staff_nd_agustus_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan September
    function get_staff_nd_september_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Oktober
    function get_staff_nd_oktober_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan November
    function get_staff_nd_november_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI bulan Desember
    function get_staff_nd_desember_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart NADYA ARRIZKA HUTAMI

    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Januari
    function get_staff_pt_januari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Februari
    function get_staff_pt_februari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Maret
    function get_staff_pt_maret_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan April
    function get_staff_pt_april_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Mei
    function get_staff_pt_mei_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Juni
    function get_staff_pt_juni_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Juli
    function get_staff_pt_juli_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Agustus
    function get_staff_pt_agustus_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan September
    function get_staff_pt_september_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Oktober
    function get_staff_pt_oktober_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan November
    function get_staff_pt_november_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI bulan Desember
    function get_staff_pt_desember_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart PUTTY OCTAVIANY PURWADIPUTRI

    //Chart RADEN SITI SARI DEWI bulan Januari
    function get_staff_rd_januari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Februari
    function get_staff_rd_februari_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
        }
    }
     //Chart RADEN SITI SARI DEWI bulan Maret
    function get_staff_rd_maret_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan April
    function get_staff_rd_april_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                 $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Mei
    function get_staff_rd_mei_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Juni
    function get_staff_rd_juni_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Juli
    function get_staff_rd_juli_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Agustus
    function get_staff_rd_agustus_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan September
    function get_staff_rd_september_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Oktober
    function get_staff_rd_oktober_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan November
    function get_staff_rd_november_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI bulan Desember
    function get_staff_rd_desember_pending($tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Akhir chart RADEN SITI SARI DEWI
    //Akhir chart Staff Pending

    //Model Untuk Chart Staff Job Pending
    //Chart MOHAMAD ADITYA Hari Senin
    function get_staff_ad_senin_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND DAYNAME(tgl_mulai_kerja)='Monday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA Hari Selasa
    function get_staff_ad_selasa_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND DAYNAME(tgl_mulai_kerja)='Tuesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Rabu
     function get_staff_ad_rabu_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND DAYNAME(tgl_mulai_kerja)='Wednesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Kamis
     function get_staff_ad_kamis_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND DAYNAME(tgl_mulai_kerja)='Thursday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Jumat
     function get_staff_ad_jumat_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='MOHAMAD ADITYA' AND DAYNAME(tgl_mulai_kerja)='Friday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //akhir chart MOHAMAD ADITYA

    //Chart NADYA ARRIZKA HUTAMI Hari Senin
    function get_staff_nd_senin_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND DAYNAME(tgl_mulai_kerja)='Monday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart NADYA ARRIZKA HUTAMI Hari Selasa
    function get_staff_nd_selasa_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND DAYNAME(tgl_mulai_kerja)='Tuesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart NADYA ARRIZKA HUTAMI Hari Rabu
     function get_staff_nd_rabu_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND DAYNAME(tgl_mulai_kerja)='Wednesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart NADYA ARRIZKA HUTAMI Hari Kamis
     function get_staff_nd_kamis_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND DAYNAME(tgl_mulai_kerja)='Thursday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart NADYA ARRIZKA HUTAMI Hari Jumat
     function get_staff_nd_jumat_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='NADYA ARRIZKA HUTAMI' AND DAYNAME(tgl_mulai_kerja)='Friday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //akhir chart NADYA ARRIZKA HUTAMI

    //Chart PUTTY OCTAVIANY PURWADIPUTRI Hari Senin
    function get_staff_pt_senin_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND DAYNAME(tgl_mulai_kerja)='Monday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart PUTTY OCTAVIANY PURWADIPUTRI Hari Selasa
    function get_staff_pt_selasa_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND DAYNAME(tgl_mulai_kerja)='Tuesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart PUTTY OCTAVIANY PURWADIPUTRI Hari Rabu
     function get_staff_pt_rabu_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND DAYNAME(tgl_mulai_kerja)='Wednesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart PUTTY OCTAVIANY PURWADIPUTRI Hari Kamis
     function get_staff_pt_kamis_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND DAYNAME(tgl_mulai_kerja)='Thursday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart PUTTY OCTAVIANY PURWADIPUTRI Hari Jumat
     function get_staff_pt_jumat_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='PUTTY OCTAVIANY PURWADIPUTRI' AND DAYNAME(tgl_mulai_kerja)='Friday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //akhir chart PUTTY OCTAVIANY PURWADIPUTRI

    //Chart RADEN SITI SARI DEWI Hari Senin
    function get_staff_rd_senin_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND DAYNAME(tgl_mulai_kerja)='Monday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart RADEN SITI SARI DEWI Hari Selasa
    function get_staff_rd_selasa_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND DAYNAME(tgl_mulai_kerja)='Tuesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart RADEN SITI SARI DEWI Hari Rabu
     function get_staff_rd_rabu_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND DAYNAME(tgl_mulai_kerja)='Wednesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart RADEN SITI SARI DEWI Hari Kamis
     function get_staff_rd_kamis_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND DAYNAME(tgl_mulai_kerja)='Thursday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart RADEN SITI SARI DEWI Hari Jumat
     function get_staff_rd_jumat_pending($bulan,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='RADEN SITI SARI DEWI' AND DAYNAME(tgl_mulai_kerja)='Friday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='0' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //akhir chart RADEN SITI SARI DEWI
    //Akhir chart Staff Pending

    function get_chart_staff($kdn,$tahun){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$kdn' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

}
