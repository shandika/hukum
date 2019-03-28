<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 function __construct() {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
		 	echo $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
		 	redirect('login');
		 }
		 $this->load->model('model_user','m_user');
    }

    public function index()
	{
		$series_data[] = array('name' => 'Shandika', 'data' => array(8,7,9));
		$series_data[] = array('name' => 'Eka', 'data' => array(7,5,9));
		$data['series_data'] = json_encode($series_data);

		$data['unit']=$this->m_user->get_unit_kerja();
		$this->load->model('model_admin','m_admin');
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

	function staffdiagram() {
		$this->load->model('model_admin','m_admin');
		$data['data']=$this->m_admin->get_all_staff();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Staff Diagram";
        $data['view_isi'] = "admin/staff_diagram";
        $this->load->view('layout/template', $data);
	}

	function dokumenmonitoring() {
		$this->load->model('model_admin','m_admin');
		$data['data']=$this->m_admin->get_pending_dokumen();
		$data['finish']=$this->m_admin->get_finish_dokumen();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Dokumen Monitoring";
        $data['view_isi'] = "admin/dokumen_monitoring";
        $this->load->view('layout/template', $data);
	}
	function dokumenmonitoringstaff() {
		$this->load->model('model_staff','m_staff');
		$data['data']=$this->m_staff->get_pending_dokumen();
		$data['finish']=$this->m_staff->get_finish_dokumen();
		$data['title'] = "Dashboard";
        $data['subtitle'] = "Dokumen Monitoring";
        $data['view_isi'] = "staff/dokumen_monitoring";
        $this->load->view('layout/template', $data);
	}
	
}
