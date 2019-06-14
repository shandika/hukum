<?php

class Model_staff extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_staff(){
        $hsl=$this->db->query("SELECT * FROM tbl_user ORDER BY nama_user ASC");
        return $hsl;
    }
    function get_staff_by_kode($kode){
        $hsl=$this->db->query("SELECT * FROM tbl_user where nipeg_user='$kode'");
        return $hsl;
    }
    function get_all_dokumen(){
        $hsl=$this->db->query("SELECT * FROM tbl_new_job");
        return $hsl;
    }
    function get_pending_dokumen(){
        $user=$this->session->userdata('nama_user');
        $hsl=$this->db->query("SELECT * FROM tbl_new_job where status_pending='0' AND nama_staff='$user'");
        return $hsl;
    }
    function get_finish_dokumen(){
        $user=$this->session->userdata('nama_user');
        $hsl=$this->db->query("SELECT * FROM tbl_new_job where status_pending='1' AND nama_staff='$user'");
        return $hsl;
    }
    function get_job_by_kode($kode){
        $hsl=$this->db->query("SELECT * FROM tbl_new_job where kode_voucher='$kode'");
        return $hsl;
    }
    function update_status_inbox($kd){
		$hsl=$this->db->query("UPDATE tbl_new_job SET status_inbox_staff='2' where kode_voucher='$kd'");
		return $hsl;
    }
    function hapus_job($kode){
		$hsl=$this->db->query("delete from tbl_new_job where kode_voucher='$kode'");
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
    function simpan_job($kode,$catatanstaff,$staff){
        $hsl=$this->db->query("update tbl_new_job set catatan_staff='$catatanstaff',status='3',status_pembaharuan_staff='2' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_staff) values ('$kode','$staff','$catatanstaff')");
		return $hsl;
    }
    function staff(){
        $this->db->order_by('nipeg_user','ASC');
        $staff= $this->db->get('tbl_user');
        return $staff->result_array();
        }

    //Model Untuk Chart Staff Job Finish
    //Chart MOHAMAD ADITYA bulan Januari
    function get_staff_ad_januari($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='1' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Februari
    function get_staff_ad_februari($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='2' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Maret
     function get_staff_ad_maret($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='3' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan April
     function get_staff_ad_april($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='4' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA bulan Mei
     function get_staff_ad_mei($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='5' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //Chart MOHAMAD ADITYA bulan Juni
    function get_staff_ad_juni($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='6' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Juli
    function get_staff_ad_juli($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='7' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Agustus
    function get_staff_ad_agustus($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='8' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan September
    function get_staff_ad_september($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='9' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Oktober
    function get_staff_ad_oktober($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='10' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan November
    function get_staff_ad_november($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='11' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA bulan Desember
    function get_staff_ad_desember($tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND MONTH(tgl_selesai_kerja)='12' AND YEAR(tanggal_buat)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //akhir chart Staff Finish

    //Model Untuk Chart Staff Bulan
    //Chart MOHAMAD ADITYA Hari Senin
    function get_staff_ad_senin($bulan,$tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND DAYNAME(tgl_mulai_kerja)='Monday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    //Chart MOHAMAD ADITYA Hari Selasa
    function get_staff_ad_selasa($bulan,$tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND DAYNAME(tgl_mulai_kerja)='Tuesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Rabu
     function get_staff_ad_rabu($bulan,$tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND DAYNAME(tgl_mulai_kerja)='Wednesday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Kamis
     function get_staff_ad_kamis($bulan,$tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND DAYNAME(tgl_mulai_kerja)='Thursday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
     //Chart MOHAMAD ADITYA Hari Jumat
     function get_staff_ad_jumat($bulan,$tahun,$nama){
        $query = $this->db->query("SELECT COUNT(nama_staff) AS jumlah FROM tbl_new_job WHERE nama_staff='$nama' AND DAYNAME(tgl_mulai_kerja)='Friday' AND MONTHNAME(tgl_mulai_kerja)='$bulan' AND YEAR(tgl_mulai_kerja)='$tahun' AND status_pending='1' GROUP BY nama_staff");
          
         if($query->num_rows() > 0){
             foreach($query->result() as $data){
                 $hasil[] = $data;
             }
             return $hasil;
         }
     }
    //akhir chart bulan
}
