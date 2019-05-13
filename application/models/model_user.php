<?php

class Model_user extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function simpan_job($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai4,$tglmulaikerja,$tglselesaikerja4){
        $hsl=$this->db->query("insert into tbl_new_job(kode_voucher,email,unit_kerja,judul_dokumen,catatan,tanggal_selesai,tgl_mulai_kerja,tgl_selesai_kerja) values ('$kodevoucher','$email','$uk','$juduldokumen','$catatan','$tglselesai4','$tglmulaikerja','$tglselesaikerja4')");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucher','$catatan')");
		return $hsl;
	}
    function simpan_job_rabu($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai1,$tglmulaikerja,$tglselesaikerja1){
        $hsl=$this->db->query("insert into tbl_new_job(kode_voucher,email,unit_kerja,judul_dokumen,catatan,tanggal_selesai,tgl_mulai_kerja,tgl_selesai_kerja) values ('$kodevoucher','$email','$uk','$juduldokumen','$catatan','$tglselesai1','$tglmulaikerja','$tglselesaikerja1')");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucher','$catatan')");
        return $hsl;
    }
    function simpan_job_kamis($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai2,$tglmulaikerja,$tglselesaikerja2){
        $hsl=$this->db->query("insert into tbl_new_job(kode_voucher,email,unit_kerja,judul_dokumen,catatan,tanggal_selesai,tgl_mulai_kerja,tgl_selesai_kerja) values ('$kodevoucher','$email','$uk','$juduldokumen','$catatan','$tglselesai2','$tglmulaikerja','$tglselesaikerja2')");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucher','$catatan')");
        return $hsl;
    }
    function simpan_job_jumat($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai3,$tglmulaikerja,$tglselesaikerja3){
        $hsl=$this->db->query("insert into tbl_new_job(kode_voucher,email,unit_kerja,judul_dokumen,catatan,tanggal_selesai,tgl_mulai_kerja,tgl_selesai_kerja) values ('$kodevoucher','$email','$uk','$juduldokumen','$catatan','$tglselesai3','$tglmulaikerja','$tglselesaikerja3')");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucher','$catatan')");
        return $hsl;
    }
    function pending_job($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja4){
        $hsl=$this->db->query("update tbl_new_job set catatan='$catatan', status='2', tgl_mulai_kerja='$tglmulaikerja', tgl_selesai_kerja='$tglselesaikerja4' where kode_voucher='$kodevoucherpending'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucherpending','$catatan')");
        return $hsl;
    }
    function pending_job_rabu($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja1){
        $hsl=$this->db->query("update tbl_new_job set catatan='$catatan', status='2', tgl_mulai_kerja='$tglmulaikerja', tgl_selesai_kerja='$tglselesaikerja1' where kode_voucher='$kodevoucherpending'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucherpending','$catatan')");
        return $hsl;
    }
    function pending_job_kamis($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja2){
        $hsl=$this->db->query("update tbl_new_job set catatan='$catatan', status='2', tgl_mulai_kerja='$tglmulaikerja', tgl_selesai_kerja='$tglselesaikerja2' where kode_voucher='$kodevoucherpending'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucherpending','$catatan')");
        return $hsl;
    }
    function pending_job_jumat($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja3){
        $hsl=$this->db->query("update tbl_new_job set catatan='$catatan', status='2', tgl_mulai_kerja='$tglmulaikerja', tgl_selesai_kerja='$tglselesaikerja3' where kode_voucher='$kodevoucherpending'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucherpending','$catatan')");
        return $hsl;
    }
    function get_unit_kerja(){
        $this->db->order_by('id_uk','ASC');
        $unit= $this->db->get('tbl_unit_kerja');
        return $unit->result_array();
    }
    function get_all_dokumen(){
        $hsl=$this->db->query("SELECT tbl_new_job.*,DATE_FORMAT(tanggal_buat,'%d %M %Y %h%:%i%:%s') AS tgl FROM tbl_new_job WHERE status_pending='0'");
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
}
