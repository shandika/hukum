<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();

class C_admin extends CI_Controller {

    function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation'); 
        $this->load->model('Model_admin','m_admin');
        $this->load->model('Model_user','m_user');
        $this->load->library('excel'); 
        $this->load->library('pdf'); 
        $this->load->library('upload'); 
    }

	
    function get_staff_detail(){
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_admin->get_staff_by_kode($kode);
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Staff Detail";
        $data['view_isi'] = "admin/detail_staff";
        $this->load->view('layout/template',$data);
    }

    //
    function filter_tahun_chart_staff(){
        $tahun=$this->input->get('tahun');
        $kdn=$this->input->get('kdn');
        $kode=$this->uri->segment(4);
        $data['chart']=$this->m_admin->get_chart_staff($kdn,$tahun);
        redirect('admin/c_admin/get_staff_detail/$kode');
    }

    function get_job_detail(){
		$data['staff']=$this->m_admin->staff();
        $kd=$this->uri->segment(4);
        $this->m_admin->update_status_inbox($kd);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_admin->get_job_by_kode($kode);
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Job Detail";
        $data['view_isi'] = "admin/detail_job";
        $this->load->view('layout/template',$data);
    }

    function get_status_detail(){
        $data['staff']=$this->m_admin->staff();
        $kode=$this->uri->segment(4);
        $data['catatan']=$this->m_admin->catatan($kode);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_admin->get_job_by_kode($kode);
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Job Status Detail";
        $data['view_isi'] = "admin/detail_job_status";
        $this->load->view('layout/template',$data);
    }
    
    function hapus_job(){
        $kode=$this->uri->segment(4);
		$this->m_admin->hapus_job($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('dashboard');
    }

    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->m_admin->GetRow($keyword);        
        echo json_encode($data);
    }

    public function filter_tahun_uk(){
        $tahun=$this->input->get('tahun');
        //unit kerja corporate finance
		$data['dc_januari'] = $this->m_admin->get_unit_dc_januari($tahun);
		$data['dc_februari'] = $this->m_admin->get_unit_dc_februari($tahun);
		$data['dc_maret'] = $this->m_admin->get_unit_dc_maret($tahun);
		$data['dc_april'] = $this->m_admin->get_unit_dc_april($tahun);
		$data['dc_mei'] = $this->m_admin->get_unit_dc_mei($tahun);
		$data['dc_juni'] = $this->m_admin->get_unit_dc_juni($tahun);
		$data['dc_juli'] = $this->m_admin->get_unit_dc_juli($tahun);
		$data['dc_agustus'] = $this->m_admin->get_unit_dc_agustus($tahun);
		$data['dc_september'] = $this->m_admin->get_unit_dc_september($tahun);
		$data['dc_oktober'] = $this->m_admin->get_unit_dc_oktober($tahun);
		$data['dc_november'] = $this->m_admin->get_unit_dc_november($tahun);
		$data['dc_desember'] = $this->m_admin->get_unit_dc_desember($tahun);
		//unit kerja HCMQ
		$data['hcmq_januari'] = $this->m_admin->get_unit_hcmq_januari($tahun);
		$data['hcmq_februari'] = $this->m_admin->get_unit_hcmq_februari($tahun);
		$data['hcmq_maret'] = $this->m_admin->get_unit_hcmq_maret($tahun);
		$data['hcmq_april'] = $this->m_admin->get_unit_hcmq_april($tahun);
		$data['hcmq_mei'] = $this->m_admin->get_unit_hcmq_mei($tahun);
		$data['hcmq_juni'] = $this->m_admin->get_unit_hcmq_juni($tahun);
		$data['hcmq_juli'] = $this->m_admin->get_unit_hcmq_juli($tahun);
		$data['hcmq_agustus'] = $this->m_admin->get_unit_hcmq_agustus($tahun);
		$data['hcmq_september'] = $this->m_admin->get_unit_hcmq_september($tahun);
		$data['hcmq_oktober'] = $this->m_admin->get_unit_hcmq_oktober($tahun);
		$data['hcmq_november'] = $this->m_admin->get_unit_hcmq_november($tahun);
        $data['hcmq_desember'] = $this->m_admin->get_unit_hcmq_desember($tahun);
        //unit kerja IT & Umum
		$data['it_januari'] = $this->m_admin->get_unit_it_januari($tahun);
		$data['it_februari'] = $this->m_admin->get_unit_it_februari($tahun);
		$data['it_maret'] = $this->m_admin->get_unit_it_maret($tahun);
		$data['it_april'] = $this->m_admin->get_unit_it_april($tahun);
		$data['it_mei'] = $this->m_admin->get_unit_it_mei($tahun);
		$data['it_juni'] = $this->m_admin->get_unit_it_juni($tahun);
		$data['it_juli'] = $this->m_admin->get_unit_it_juli($tahun);
		$data['it_agustus'] = $this->m_admin->get_unit_it_agustus($tahun);
		$data['it_september'] = $this->m_admin->get_unit_it_september($tahun);
		$data['it_oktober'] = $this->m_admin->get_unit_it_oktober($tahun);
		$data['it_november'] = $this->m_admin->get_unit_it_november($tahun);
		$data['it_desember'] = $this->m_admin->get_unit_it_desember($tahun);
        //Pengembangan Bisnis dan Produksi
        $data['pbp_januari'] = $this->m_admin->get_unit_pbp_januari($tahun);
        $data['pbp_februari'] = $this->m_admin->get_unit_pbp_februari($tahun);
        $data['pbp_maret'] = $this->m_admin->get_unit_pbp_maret($tahun);
        $data['pbp_april'] = $this->m_admin->get_unit_pbp_april($tahun);
        $data['pbp_mei'] = $this->m_admin->get_unit_pbp_mei($tahun);
        $data['pbp_juni'] = $this->m_admin->get_unit_pbp_juni($tahun);
        $data['pbp_juli'] = $this->m_admin->get_unit_pbp_juli($tahun);
        $data['pbp_agustus'] = $this->m_admin->get_unit_pbp_agustus($tahun);
        $data['pbp_september'] = $this->m_admin->get_unit_pbp_september($tahun);
        $data['pbp_oktober'] = $this->m_admin->get_unit_pbp_oktober($tahun);
        $data['pbp_november'] = $this->m_admin->get_unit_pbp_november($tahun);
        $data['pbp_desember'] = $this->m_admin->get_unit_pbp_desember($tahun);
        //Produksi
        $data['pd_januari'] = $this->m_admin->get_unit_pd_januari($tahun);
        $data['pd_februari'] = $this->m_admin->get_unit_pd_februari($tahun);
        $data['pd_maret'] = $this->m_admin->get_unit_pd_maret($tahun);
        $data['pd_april'] = $this->m_admin->get_unit_pd_april($tahun);
        $data['pd_mei'] = $this->m_admin->get_unit_pd_mei($tahun);
        $data['pd_juni'] = $this->m_admin->get_unit_pd_juni($tahun);
        $data['pd_juli'] = $this->m_admin->get_unit_pd_juli($tahun);
        $data['pd_agustus'] = $this->m_admin->get_unit_pd_agustus($tahun);
        $data['pd_september'] = $this->m_admin->get_unit_pd_september($tahun);
        $data['pd_oktober'] = $this->m_admin->get_unit_pd_oktober($tahun);
        $data['pd_november'] = $this->m_admin->get_unit_pd_november($tahun);
        $data['pd_desember'] = $this->m_admin->get_unit_pd_desember($tahun);
        //Satuan Pengawasan Intern
        $data['spi_januari'] = $this->m_admin->get_unit_spi_januari($tahun);
        $data['spi_februari'] = $this->m_admin->get_unit_spi_februari($tahun);
        $data['spi_maret'] = $this->m_admin->get_unit_spi_maret($tahun);
        $data['spi_april'] = $this->m_admin->get_unit_spi_april($tahun);
        $data['spi_mei'] = $this->m_admin->get_unit_spi_mei($tahun);
        $data['spi_juni'] = $this->m_admin->get_unit_spi_juni($tahun);
        $data['spi_juli'] = $this->m_admin->get_unit_spi_juli($tahun);
        $data['spi_agustus'] = $this->m_admin->get_unit_spi_agustus($tahun);
        $data['spi_september'] = $this->m_admin->get_unit_spi_september($tahun);
        $data['spi_oktober'] = $this->m_admin->get_unit_spi_oktober($tahun);
        $data['spi_november'] = $this->m_admin->get_unit_spi_november($tahun);
        $data['spi_desember'] = $this->m_admin->get_unit_spi_desember($tahun);
        //SBU Broadband
        $data['sbub_januari'] = $this->m_admin->get_unit_sbub_januari($tahun);
        $data['sbub_februari'] = $this->m_admin->get_unit_sbub_februari($tahun);
        $data['sbub_maret'] = $this->m_admin->get_unit_sbub_maret($tahun);
        $data['sbub_april'] = $this->m_admin->get_unit_sbub_april($tahun);
        $data['sbub_mei'] = $this->m_admin->get_unit_sbub_mei($tahun);
        $data['sbub_juni'] = $this->m_admin->get_unit_sbub_juni($tahun);
        $data['sbub_juli'] = $this->m_admin->get_unit_sbub_juli($tahun);
        $data['sbub_agustus'] = $this->m_admin->get_unit_sbub_agustus($tahun);
        $data['sbub_september'] = $this->m_admin->get_unit_sbub_september($tahun);
        $data['sbub_oktober'] = $this->m_admin->get_unit_sbub_oktober($tahun);
        $data['sbub_november'] = $this->m_admin->get_unit_sbub_november($tahun);
        $data['sbub_desember'] = $this->m_admin->get_unit_sbub_desember($tahun);
        //SBU Defense & Digital Service
        $data['sbud_januari'] = $this->m_admin->get_unit_sbud_januari($tahun);
        $data['sbud_februari'] = $this->m_admin->get_unit_sbud_februari($tahun);
        $data['sbud_maret'] = $this->m_admin->get_unit_sbud_maret($tahun);
        $data['sbud_april'] = $this->m_admin->get_unit_sbud_april($tahun);
        $data['sbud_mei'] = $this->m_admin->get_unit_sbud_mei($tahun);
        $data['sbud_juni'] = $this->m_admin->get_unit_sbud_juni($tahun);
        $data['sbud_juli'] = $this->m_admin->get_unit_sbud_juli($tahun);
        $data['sbud_agustus'] = $this->m_admin->get_unit_sbud_agustus($tahun);
        $data['sbud_september'] = $this->m_admin->get_unit_sbud_september($tahun);
        $data['sbud_oktober'] = $this->m_admin->get_unit_sbud_oktober($tahun);
        $data['sbud_november'] = $this->m_admin->get_unit_sbud_november($tahun);
        $data['sbud_desember'] = $this->m_admin->get_unit_sbud_desember($tahun);
        //SBU Smart Energy
        $data['sbus_januari'] = $this->m_admin->get_unit_sbus_januari($tahun);
        $data['sbus_februari'] = $this->m_admin->get_unit_sbus_februari($tahun);
        $data['sbus_maret'] = $this->m_admin->get_unit_sbus_maret($tahun);
        $data['sbus_april'] = $this->m_admin->get_unit_sbus_april($tahun);
        $data['sbus_mei'] = $this->m_admin->get_unit_sbus_mei($tahun);
        $data['sbus_juni'] = $this->m_admin->get_unit_sbus_juni($tahun);
        $data['sbus_juli'] = $this->m_admin->get_unit_sbus_juli($tahun);
        $data['sbus_agustus'] = $this->m_admin->get_unit_sbus_agustus($tahun);
        $data['sbus_september'] = $this->m_admin->get_unit_sbus_september($tahun);
        $data['sbus_oktober'] = $this->m_admin->get_unit_sbus_oktober($tahun);
        $data['sbus_november'] = $this->m_admin->get_unit_sbus_november($tahun);
        $data['sbus_desember'] = $this->m_admin->get_unit_sbus_desember($tahun);
        //Sekretaris Perusahaan
        $data['sp_januari'] = $this->m_admin->get_unit_sp_januari($tahun);
        $data['sp_februari'] = $this->m_admin->get_unit_sp_februari($tahun);
        $data['sp_maret'] = $this->m_admin->get_unit_sp_maret($tahun);
        $data['sp_april'] = $this->m_admin->get_unit_sp_april($tahun);
        $data['sp_mei'] = $this->m_admin->get_unit_sp_mei($tahun);
        $data['sp_juni'] = $this->m_admin->get_unit_sp_juni($tahun);
        $data['sp_juli'] = $this->m_admin->get_unit_sp_juli($tahun);
        $data['sp_agustus'] = $this->m_admin->get_unit_sp_agustus($tahun);
        $data['sp_september'] = $this->m_admin->get_unit_sp_september($tahun);
        $data['sp_oktober'] = $this->m_admin->get_unit_sp_oktober($tahun);
        $data['sp_november'] = $this->m_admin->get_unit_sp_november($tahun);
        $data['sp_desember'] = $this->m_admin->get_unit_sp_desember($tahun);

		$data['unit']=$this->m_user->get_unit_kerja();
		$data['data']=$this->m_admin->get_all_dokumen();
		$data['title'] = "Dashboard";
        $level = $this->session->userdata('level');
        if ($level == "admin") {
        	$data['subtitle'] = "Admin";
        } else{
        	$data['subtitle'] = "Staff";
    	}
        $data['view_isi'] = "back_end/dashboard";
        $this->load->view('layout/template', $data);
    }

    public function filter_tahun_staff(){
        $tahun=$this->input->get('tahun_staff');
        //MOHAMAD ADITYA
		$data['ad_januari'] = $this->m_admin->get_staff_ad_januari($tahun);
		$data['ad_februari'] = $this->m_admin->get_staff_ad_februari($tahun);
		$data['ad_maret'] = $this->m_admin->get_staff_ad_maret($tahun);
		$data['ad_april'] = $this->m_admin->get_staff_ad_april($tahun);
		$data['ad_mei'] = $this->m_admin->get_staff_ad_mei($tahun);
		$data['ad_juni'] = $this->m_admin->get_staff_ad_juni($tahun);
		$data['ad_juli'] = $this->m_admin->get_staff_ad_juli($tahun);
		$data['ad_agustus'] = $this->m_admin->get_staff_ad_agustus($tahun);
		$data['ad_september'] = $this->m_admin->get_staff_ad_september($tahun);
		$data['ad_oktober'] = $this->m_admin->get_staff_ad_oktober($tahun);
		$data['ad_november'] = $this->m_admin->get_staff_ad_november($tahun);
		$data['ad_desember'] = $this->m_admin->get_staff_ad_desember($tahun);
		//NADYA ARRIZKA HUTAMI
		$data['nd_januari'] = $this->m_admin->get_staff_nd_januari($tahun);
		$data['nd_februari'] = $this->m_admin->get_staff_nd_februari($tahun);
		$data['nd_maret'] = $this->m_admin->get_staff_nd_maret($tahun);
		$data['nd_april'] = $this->m_admin->get_staff_nd_april($tahun);
		$data['nd_mei'] = $this->m_admin->get_staff_nd_mei($tahun);
		$data['nd_juni'] = $this->m_admin->get_staff_nd_juni($tahun);
		$data['nd_juli'] = $this->m_admin->get_staff_nd_juli($tahun);
		$data['nd_agustus'] = $this->m_admin->get_staff_nd_agustus($tahun);
		$data['nd_september'] = $this->m_admin->get_staff_nd_september($tahun);
		$data['nd_oktober'] = $this->m_admin->get_staff_nd_oktober($tahun);
		$data['nd_november'] = $this->m_admin->get_staff_nd_november($tahun);
        $data['nd_desember'] = $this->m_admin->get_staff_nd_desember($tahun);
        //PUTTY OCTAVIANY PURWADIPUTRI
		$data['pt_januari'] = $this->m_admin->get_staff_pt_januari($tahun);
		$data['pt_februari'] = $this->m_admin->get_staff_pt_februari($tahun);
		$data['pt_maret'] = $this->m_admin->get_staff_pt_maret($tahun);
		$data['pt_april'] = $this->m_admin->get_staff_pt_april($tahun);
		$data['pt_mei'] = $this->m_admin->get_staff_pt_mei($tahun);
		$data['pt_juni'] = $this->m_admin->get_staff_pt_juni($tahun);
		$data['pt_juli'] = $this->m_admin->get_staff_pt_juli($tahun);
		$data['pt_agustus'] = $this->m_admin->get_staff_pt_agustus($tahun);
		$data['pt_september'] = $this->m_admin->get_staff_pt_september($tahun);
		$data['pt_oktober'] = $this->m_admin->get_staff_pt_oktober($tahun);
		$data['pt_november'] = $this->m_admin->get_staff_pt_november($tahun);
		$data['pt_desember'] = $this->m_admin->get_staff_pt_desember($tahun);
        //RADEN SITI SARI DEWI
        $data['rd_januari'] = $this->m_admin->get_staff_rd_januari($tahun);
        $data['rd_februari'] = $this->m_admin->get_staff_rd_februari($tahun);
        $data['rd_maret'] = $this->m_admin->get_staff_rd_maret($tahun);
        $data['rd_april'] = $this->m_admin->get_staff_rd_april($tahun);
        $data['rd_mei'] = $this->m_admin->get_staff_rd_mei($tahun);
        $data['rd_juni'] = $this->m_admin->get_staff_rd_juni($tahun);
        $data['rd_juli'] = $this->m_admin->get_staff_rd_juli($tahun);
        $data['rd_agustus'] = $this->m_admin->get_staff_rd_agustus($tahun);
        $data['rd_september'] = $this->m_admin->get_staff_rd_september($tahun);
        $data['rd_oktober'] = $this->m_admin->get_staff_rd_oktober($tahun);
        $data['rd_november'] = $this->m_admin->get_staff_rd_november($tahun);
        $data['rd_desember'] = $this->m_admin->get_staff_rd_desember($tahun);

		$data['unit']=$this->m_user->get_unit_kerja();
		$data['data']=$this->m_admin->get_all_dokumen();
		$data['title'] = "Dashboard";
        $level = $this->session->userdata('level');
        if ($level == "admin") {
        	$data['subtitle'] = "Admin";
        } else{
        	$data['subtitle'] = "Staff";
    	}
        $data['view_isi'] = "back_end/dashboard";
        $this->load->view('layout/template', $data);
    }

    public function filter_tahun_staff_job() {
        $tahun=$this->input->get('tahun_filter');
        //MOHAMAD ADITYA
        $data['ad_januari'] = $this->m_admin->get_staff_ad_januari_pending($tahun);
        $data['ad_februari'] = $this->m_admin->get_staff_ad_februari_pending($tahun);
        $data['ad_maret'] = $this->m_admin->get_staff_ad_maret_pending($tahun);
        $data['ad_april'] = $this->m_admin->get_staff_ad_april_pending($tahun);
        $data['ad_mei'] = $this->m_admin->get_staff_ad_mei_pending($tahun);
        $data['ad_juni'] = $this->m_admin->get_staff_ad_juni_pending($tahun);
        $data['ad_juli'] = $this->m_admin->get_staff_ad_juli_pending($tahun);
        $data['ad_agustus'] = $this->m_admin->get_staff_ad_agustus_pending($tahun);
        $data['ad_september'] = $this->m_admin->get_staff_ad_september_pending($tahun);
        $data['ad_oktober'] = $this->m_admin->get_staff_ad_oktober_pending($tahun);
        $data['ad_november'] = $this->m_admin->get_staff_ad_november_pending($tahun);
        $data['ad_desember'] = $this->m_admin->get_staff_ad_desember_pending($tahun);
        //NADYA ARRIZKA HUTAMI
        $data['nd_januari'] = $this->m_admin->get_staff_nd_januari_pending($tahun);
        $data['nd_februari'] = $this->m_admin->get_staff_nd_februari_pending($tahun);
        $data['nd_maret'] = $this->m_admin->get_staff_nd_maret_pending($tahun);
        $data['nd_april'] = $this->m_admin->get_staff_nd_april_pending($tahun);
        $data['nd_mei'] = $this->m_admin->get_staff_nd_mei_pending($tahun);
        $data['nd_juni'] = $this->m_admin->get_staff_nd_juni_pending($tahun);
        $data['nd_juli'] = $this->m_admin->get_staff_nd_juli_pending($tahun);
        $data['nd_agustus'] = $this->m_admin->get_staff_nd_agustus_pending($tahun);
        $data['nd_september'] = $this->m_admin->get_staff_nd_september_pending($tahun);
        $data['nd_oktober'] = $this->m_admin->get_staff_nd_oktober_pending($tahun);
        $data['nd_november'] = $this->m_admin->get_staff_nd_november_pending($tahun);
        $data['nd_desember'] = $this->m_admin->get_staff_nd_desember_pending($tahun);
        //PUTTY OCTAVIANY PURWADIPUTRI
        $data['pt_januari'] = $this->m_admin->get_staff_pt_januari_pending($tahun);
        $data['pt_februari'] = $this->m_admin->get_staff_pt_februari_pending($tahun);
        $data['pt_maret'] = $this->m_admin->get_staff_pt_maret_pending($tahun);
        $data['pt_april'] = $this->m_admin->get_staff_pt_april_pending($tahun);
        $data['pt_mei'] = $this->m_admin->get_staff_pt_mei_pending($tahun);
        $data['pt_juni'] = $this->m_admin->get_staff_pt_juni_pending($tahun);
        $data['pt_juli'] = $this->m_admin->get_staff_pt_juli_pending($tahun);
        $data['pt_agustus'] = $this->m_admin->get_staff_pt_agustus_pending($tahun);
        $data['pt_september'] = $this->m_admin->get_staff_pt_september_pending($tahun);
        $data['pt_oktober'] = $this->m_admin->get_staff_pt_oktober_pending($tahun);
        $data['pt_november'] = $this->m_admin->get_staff_pt_november_pending($tahun);
        $data['pt_desember'] = $this->m_admin->get_staff_pt_desember_pending($tahun);
        //RADEN SITI SARI DEWI
        $data['rd_januari'] = $this->m_admin->get_staff_rd_januari_pending($tahun);
        $data['rd_februari'] = $this->m_admin->get_staff_rd_februari_pending($tahun);
        $data['rd_maret'] = $this->m_admin->get_staff_rd_maret_pending($tahun);
        $data['rd_april'] = $this->m_admin->get_staff_rd_april_pending($tahun);
        $data['rd_mei'] = $this->m_admin->get_staff_rd_mei_pending($tahun);
        $data['rd_juni'] = $this->m_admin->get_staff_rd_juni_pending($tahun);
        $data['rd_juli'] = $this->m_admin->get_staff_rd_juli_pending($tahun);
        $data['rd_agustus'] = $this->m_admin->get_staff_rd_agustus_pending($tahun);
        $data['rd_september'] = $this->m_admin->get_staff_rd_september_pending($tahun);
        $data['rd_oktober'] = $this->m_admin->get_staff_rd_oktober_pending($tahun);
        $data['rd_november'] = $this->m_admin->get_staff_rd_november_pending($tahun);
        $data['rd_desember'] = $this->m_admin->get_staff_rd_desember_pending($tahun);

        $data['data']=$this->m_admin->get_all_staff();
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Staff Diagram";
        $data['view_isi'] = "admin/staff_diagram";
        $this->load->view('layout/template', $data);
    }
  
    function kirim_job(){
        $kodevoucher=strip_tags($this->input->post('kodevoucher'));
        $catatanadmin=strip_tags($this->input->post('catatanadmin'));
        $namastaff=strip_tags($this->input->post('country'));
        $user=strip_tags($this->input->post('user'));

        if($user=strip_tags($this->input->post('user'))=="admin"){
            $this->form_validation->set_rules('catatanadmin','Catatan Admin','required');
            $this->form_validation->set_rules('user','User','required');
            $admin=$this->session->userdata('nama_user');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_admin->simpan_job_admin($kode,$catatanadmin,$admin,$user);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('dashboard');
            }
        }elseif($user=strip_tags($this->input->post('user'))=="staff") {
            $this->form_validation->set_rules('catatanadmin','Catatan Admin','required');
            $this->form_validation->set_rules('country','Country','required');
            $this->form_validation->set_rules('user','User','required');
            $admin=$this->session->userdata('nama_user');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_admin->simpan_job($kode,$catatanadmin,$namastaff,$user,$admin);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('dashboard');
            }
        }elseif(isset($_POST['Pending'])) {
            $this->form_validation->set_rules('catatanadmin','Catatan Admin','required');
            $this->form_validation->set_rules('country','Country','required');
            $admin=$this->session->userdata('nama_user');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_admin->simpan_job_user($kode,$catatanadmin,$namastaff,$admin);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('dashboard');          
        }
    }elseif(isset($_POST['Finish'])) {
        $kode=$kodevoucher;
        $tglselesai=date('Y-m-d h:i:s');
        $catatanadmin=strip_tags($this->input->post('catatanadmin'));
        $admin=$this->session->userdata('nama_user');
        $this->m_admin->finish_dokumen($kode,$catatanadmin,$tglselesai,$admin);
        echo $this->session->set_flashdata('msg','success-finish');
        redirect('dashboard');
    }elseif (isset($_POST['Reset'])) {
        $kode=$kodevoucher;
        $tanggal_mulai = date('Y-m-d h:i:s');
        $tgl=date('Y-m-d h:i:s');
        $day = date('D');

            //Check hari
                if($day=="Wed") {
                    $tglselesaikerja=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                    $this->m_admin->reset_waktu($kode,$tgl,$tglselesaikerja);
                    echo $this->session->set_flashdata('msg','success-reset');
                    redirect('dashboard');
                        }elseif($day=="Thu"){
                          $tglselesaikerja2=date('Y-m-d h:i:s', strtotime("+6 day", strtotime(date("Y-m-d h:i:s"))));  
                          $this->m_admin->reset_waktu2($kode,$tgl,$tglselesaikerja2);
                          echo $this->session->set_flashdata('msg','success-reset');
                          redirect('dashboard');
                        }elseif ($day=="Fri") {
                            $tglselesaikerja3=date('Y-m-d h:i:s', strtotime("+7 day", strtotime(date("Y-m-d h:i:s"))));  
                            $this->m_admin->reset_waktu3($kode,$tgl,$tglselesaikerja3);
                            echo $this->session->set_flashdata('msg','success-reset');
                            redirect('dashboard');
                        }elseif($day=="Sun" || $day=="Sat") {
                            echo $this->session->set_flashdata('msg','error-reset');
                            redirect('dashboard');
                        }else{
                            $tglselesaikerja4=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));  
                            $this->m_admin->reset_waktu4($kode,$tgl,$tglselesaikerja4);
                            echo $this->session->set_flashdata('msg','success-reset');
                            redirect('dashboard');
                        }

            }	
            
    }

    function cetakPdfFinish() {
        $pdf = new FPDF('l','mm','A3');
        $pdf->AliasNbPages();
        // membuat halaman baru
        $pdf->AddPage();
        // Logo
        $pdf->Image('public/images/Logo-PT-INTI_237-design.png',10,6,30);
        // Arial bold 15
        $pdf->SetFont('Arial','B',15);
        // Move to the right
        $pdf->Cell(80);
        // mencetak string
        $pdf->Cell(240,7,'Laporan Pekerjaan Staff Divisi Hukum',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(390,7,'Data Finish',0,1,'C');
        // Line break
        $pdf->Ln(20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(6,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(26,6,'Kode Voucher',1,0);
        $pdf->Cell(45,6,'Email',1,0);
        $pdf->Cell(67,6,'Unit Kerja',1,0);
        $pdf->Cell(105,6,'Judul Dokumen',1,0);
        $pdf->Cell(59,6,'Penanggungjawab',1,0);
        $pdf->Cell(49,6,'Tanggal Mengirim Dokumen',1,0);
        $pdf->Cell(47,6,'Perkiraan Selesai',1,1);
        $pdf->SetFont('Arial','',10);
        $data=$this->db->get_where('tbl_new_job', array('status_pending' => '1'));
        foreach ($data->result() as $row){
            $pdf->Cell(26,6,$row->kode_voucher,1,0);
            $pdf->Cell(45,6,$row->email,1,0);
            $pdf->Cell(67,6,$row->unit_kerja,1,0);
            $pdf->Cell(105,6,$row->judul_dokumen,1,0);
            $pdf->Cell(59,6,$row->nama_staff,1,0);
            $pdf->Cell(49,6,$row->tanggal_buat,1,0);
            $pdf->Cell(47,6,$row->tgl_selesai_kerja,1,1);
        }
        //print date
        $pdf->Cell(750,7,'Printed'.' '.date('Y-m-d h:i:s'),0,1,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Output();
    }

    function cetakPdf() {
        $pdf = new FPDF('p','mm','A3');
        $pdf->AliasNbPages();
        // membuat halaman baru
        $pdf->AddPage();
        // Logo
        $pdf->Image('public/images/Logo-PT-INTI_237-design.png',10,6,30);
        // Arial bold 15
        $pdf->SetFont('Arial','B',15);
        // Move to the right
        $pdf->Cell(80);
        // mencetak string
        $pdf->Cell(110,7,'Laporan Pekerjaan Staff Divisi Hukum',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        // Line break
        $pdf->Ln(20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(6,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_admin->get_job_by_kode($kode);
        foreach ($data['data']->result() as $row){
            $pdf->Cell(26,6,'Kode Voucher                         : '.$row->kode_voucher,0,1);
            $pdf->Cell(45,6,'Email                                       : '.$row->email,0,1);
            $pdf->Cell(67,6,'Unit Kerja                                : '.$row->unit_kerja,0,1);
            $pdf->Cell(105,6,'Judul Dokumen                       : '.$row->judul_dokumen,0,1);
            $pdf->Cell(59,6,'Penanggungjawab                  : '.$row->nama_staff,0,1);
            $pdf->Cell(49,6,'Tanggal Mengirim Dokumen   : '.$row->tanggal_buat,0,1);
            $pdf->Cell(47,6,'Perkiraan Selesai                    : '.$row->tgl_selesai_kerja,0,1);
        }
        //print date
        $pdf->Cell(750,7,'Printed'.' '.date('Y-m-d h:i:s'),0,1,'C');
        $pdf->SetFont('Arial','',9);
        $fileName = 'laporan-' . $row->kode_voucher . '.pdf';
        $pdf->Output($fileName, 'I');
    }

    function simpan_user(){
                $config['upload_path'] = './public/images/staff/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->upload->initialize($config);
                if(!empty($_FILES['filefoto']['name']))
                {
                    if ($this->upload->do_upload('filefoto'))
                    {
                            $gbr = $this->upload->data();
                            //Compress Image
                            $config['image_library']='gd2';
                            $config['source_image']='./public/images/staff/'.$gbr['file_name'];
                            $config['create_thumb']= FALSE;
                            $config['maintain_ratio']= FALSE;
                            $config['quality']= '90%';
                            $config['width']= 1500;
                            $config['height']= 953;
                            $config['new_image']= './public/images/staff/'.$gbr['file_name'];
                            $this->load->library('image_lib', $config);
                            $this->image_lib->resize();

                            $gambar=$gbr['file_name'];
                            $nama=strip_tags($this->input->post('xnama'));
                            $nipeg=strip_tags($this->input->post('xnipeg'));
                            $divisi=strip_tags($this->input->post('uk'));
                            $bagian=strip_tags($this->input->post('xbagian'));
                            $level=strip_tags($this->input->post('level'));
                            $username=strip_tags($this->input->post('xusername'));
                            $password=strip_tags($this->input->post('xpassword'));
                            $repassword=strip_tags($this->input->post('xrepassword'));
                            $p = sha1($password);
                            
                            if($password != $repassword) {
                                echo $this->session->set_flashdata('msg','password-error');
                                redirect('dashboard/user');
                            } else {
                                $this->m_admin->simpan_user($nama,$nipeg,$divisi,$bagian,$level,$username,$p,$gambar);
                                echo $this->session->set_flashdata('msg','success');
                                redirect('dashboard/user');
                            }
                            
                    }else{
                        echo $this->session->set_flashdata('msg','warning');
                        redirect('dashboard/user');
                    }
                     
                }else{
                    redirect('dashboard/user');
                }
                
    }
    
    function update_user(){
                
                $config['upload_path'] = './public/images/staff/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->upload->initialize($config);
                if(!empty($_FILES['filefoto']['name']))
                {
                    if ($this->upload->do_upload('filefoto'))
                    {
                            $gbr = $this->upload->data();
                             //Compress Image
                            $config['image_library']='gd2';
                            $config['source_image']='./public/images/staff/'.$gbr['file_name'];
                            $config['create_thumb']= FALSE;
                            $config['maintain_ratio']= FALSE;
                            $config['quality']= '90%';
                            $config['width']= 1500;
                            $config['height']= 953;
                            $config['new_image']= './public/images/staff/'.$gbr['file_name'];
                            $this->load->library('image_lib', $config);
                            $this->image_lib->resize();

                            $gambar=$gbr['file_name'];
                            $nipeg_user=$this->input->post('kode');
                            $nama=strip_tags($this->input->post('xnama'));
                            $nipeg=strip_tags($this->input->post('xnipeg'));
                            $divisi=strip_tags($this->input->post('uk'));
                            $images=$this->input->post('gambar');
                            $path='./public/images/staff/'.$images;
                            unlink($path);
                            $bagian=strip_tags($this->input->post('xbagian'));
                            $level=strip_tags($this->input->post('level'));
                            $username=strip_tags($this->input->post('xusername'));
                            $password=strip_tags($this->input->post('xpassword'));
                            $repassword=strip_tags($this->input->post('xrepassword'));
                            
                            if($password != $repassword) {
                                echo $this->session->set_flashdata('msg','password-error');
                                redirect('dashboard/user');
                            } else {
                                $this->m_admin->update_user($nipeg_user,$nama,$nipeg,$divisi,$bagian,$level,$username,$password,$gambar);
                                echo $this->session->set_flashdata('msg','success-edit');
                                redirect('dashboard/user');
                            }
                        
                    }else{
                        echo $this->session->set_flashdata('msg','warning');
                        redirect('dashboard/user');
                    }
                    
                }else{
                            $nipeg_user=$this->input->post('kode');
                            $nama=strip_tags($this->input->post('xnama'));
                            $nipeg=strip_tags($this->input->post('xnipeg'));
                            $divisi=strip_tags($this->input->post('uk'));
                            $bagian=strip_tags($this->input->post('xbagian'));
                            $level=strip_tags($this->input->post('level'));
                            $username=strip_tags($this->input->post('xusername'));
                            $password=strip_tags($this->input->post('xpassword'));
                            $repassword=strip_tags($this->input->post('xrepassword'));
                            
                            if($password != $repassword) {
                                echo $this->session->set_flashdata('msg','password-error');
                                redirect('dashboard/user');
                            } else {
                                $this->m_admin->update_user_tanpa_gambar($nipeg_user,$nama,$nipeg,$divisi,$bagian,$level,$username,$password);
                                echo $this->session->set_flashdata('msg','success-edit');
                                redirect('dashboard/user');
                            }
                } 

    }

    function hapus_user(){
        $kode=$this->input->post('kode');
        $gambar=$this->input->post('gambar');
        $path='./public/images/staff/'.$gambar;
        unlink($path);
        $this->m_admin->hapus_user($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('dashboard/user');
    }
}
?>
