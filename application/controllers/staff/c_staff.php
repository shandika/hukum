<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();

class C_staff extends CI_Controller {

    function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect('login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation'); 
        $this->load->model('Model_staff','m_staff');
        $this->load->model('Model_admin','m_admin');   
    }

	function index()
    {				
		        
    }

    function get_job_detail(){
		$data['staff']=$this->m_staff->staff();
        $kd=$this->uri->segment(4);
        $this->m_staff->update_status_inbox($kd);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_staff->get_job_by_kode($kode);
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Job Detail";
        $data['view_isi'] = "staff/detail_job";
        $this->load->view('layout/template',$data);
    }  
    
    function kirim_job(){
        
        $kodevoucher=strip_tags($this->input->post('kodevoucher'));
        $catatanstaff=strip_tags($this->input->post('catatanstaff'));
        $staff=$this->session->userdata('nama_user');

        $this->form_validation->set_rules('catatanstaff','Catatan Staff','required');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_staff->simpan_job($kode,$catatanstaff,$staff);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard/dokumenmonitoringstaff');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('dashboard/dokumenmonitoringstaff');
            }	
            
    }
    
    function get_status_detail(){
        $kode=$this->uri->segment(4);
        $data['catatan']=$this->m_admin->catatan($kode);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_staff->get_job_by_kode($kode);
        $data['title'] = "Dashboard";
        $data['subtitle'] = "Job Status Detail";
        $data['view_isi'] = "staff/detail_job_status";
        $this->load->view('layout/template',$data);
    }
}
?>