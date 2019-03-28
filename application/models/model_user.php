<?php

class Model_user extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function simpan_job($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai){
        $hsl=$this->db->query("insert into tbl_new_job(kode_voucher,email,unit_kerja,judul_dokumen,catatan,tanggal_selesai) values ('$kodevoucher','$email','$uk','$juduldokumen','$catatan','$tglselesai')");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucher','$catatan')");
		return $hsl;
	}
    function pending_job($kodevoucherpending,$catatan){
        $hsl=$this->db->query("update tbl_new_job set catatan='$catatan', status='2' where kode_voucher='$kodevoucherpending'");
        $hsl.=$this->db->query("insert into tbl_catatan(kode_voucher,catatan_user) values ('$kodevoucherpending','$catatan')");
        return $hsl;
    }
    function get_unit_kerja(){
        $this->db->order_by('id_uk','ASC');
        $unit= $this->db->get('tbl_unit_kerja');
        return $unit->result_array();
    }
    
}
