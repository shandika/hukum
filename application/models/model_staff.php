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
}
