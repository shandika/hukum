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
    function finish_dokumen($kode){
        $hsl=$this->db->query("UPDATE tbl_new_job SET status_pending='1' where kode_voucher='$kode'");
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
    function simpan_job($kode,$catatanadmin,$namastaff,$tglselesai,$tglmulai,$job){
        $hsl=$this->db->query("update tbl_new_job set tgl_mulai_kerja='$tglmulai',tgl_selesai_kerja='$tglselesai',catatan_admin='$catatanadmin',nama_staff='$namastaff',status_job='2',status_inbox_staff='1',status_pembaharuan_staff='1' where kode_voucher='$kode'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,nama,catatan_admin) values ('$kode','$namastaff','$catatanadmin')");
		return $hsl;
    }
    function simpan_job_admin($kode,$catatanadmin,$admin,$tglselesai,$tglmulai,$job){
        $hsl=$this->db->query("update tbl_new_job set tgl_mulai_kerja='$tglmulai',tgl_selesai_kerja='$tglselesai',catatan_admin='$catatanadmin',nama_staff='$admin',status_job='3' where kode_voucher='$kode'");
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
}
