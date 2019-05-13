<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 function __construct() {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
		 	echo $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
		 	redirect('login');
		 }
		 $this->load->model('model_user','m_user');
		 $this->load->model('model_admin','m_admin');
		 $this->load->model('model_staff','m_staff');
    }

    public function index()
	{
		$data['unit']=$this->m_user->get_unit_kerja();
		$data['data']=$this->m_admin->get_dokumen_belumdibaca();
		$data['sudah']=$this->m_admin->get_dokumen_sudahdibaca();
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

	function staffdiagram() {
		
		$data['data']=$this->m_admin->get_all_staff();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Staff Diagram";
        $data['view_isi'] = "admin/staff_diagram";
        $this->load->view('layout/template', $data);
	}

	function user() {
		
		$data['unit']=$this->m_admin->get_unit_kerja();
		$data['data']=$this->m_admin->get_all_users();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "User";
        $data['view_isi'] = "admin/user";
        $this->load->view('layout/template', $data);
	}

	function dokumenmonitoring() {
		
		$data['data']=$this->m_admin->get_pending_dokumen();
		$data['finish']=$this->m_admin->get_finish_dokumen();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Dokumen Monitoring";
        $data['view_isi'] = "admin/dokumen_monitoring";
        $this->load->view('layout/template', $data);
	}
	function dokumenmonitoringstaff() {
		
		$data['data']=$this->m_staff->get_pending_dokumen();
		$data['finish']=$this->m_staff->get_finish_dokumen();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Dokumen Monitoring";
        $data['view_isi'] = "staff/dokumen_monitoring";
        $this->load->view('layout/template', $data);
	}
	
}
