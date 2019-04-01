<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class C_user extends CI_Controller {

    function  __construct()
    {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user','m_user');
        $this->load->model('model_admin','m_admin');
    }

	function index()
    {				
		        
    }
    function order_job(){
        $email=strip_tags($this->input->post('email'));
        $uk=strip_tags($this->input->post('uk'));
        $job=strip_tags($this->input->post('job'));
        $kodevoucher=strip_tags($this->input->post('kodevoucher'));
        $kodevoucherpending=strip_tags($this->input->post('kodevoucherpending'));
        $juduldokumen=strip_tags($this->input->post('juduldokumen'));
        $catatan=strip_tags($this->input->post('catatan'));
        $tglselesai=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));

		if($job=strip_tags($this->input->post('job')) == "New Job"){
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('uk','Uk','required');
            $this->form_validation->set_rules('juduldokumen','Judul Dokumen','required');
            $this->form_validation->set_rules('catatan','Catatan','required');

            if($this->form_validation->run() != false){
                $this->load->model('model_user','m_user');
                $this->m_user->simpan_job($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai);
                echo $this->session->set_flashdata('msg','success');
                redirect('welcome');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('welcome');
            }
        }else {
        $kodevoucherpending=strip_tags($this->input->post('kodevoucherpending'));
        $sql = $this->db->query("SELECT kode_voucher FROM tbl_new_job where kode_voucher='$kodevoucherpending'");
        $cek_nik = $sql->num_rows();
            if($cek_nik > 0){
                $this->form_validation->set_rules('kodevoucherpending','Kode Voucher Pending','required');
                $this->form_validation->set_rules('catatan','Catatan','required');

                if($this->form_validation->run() != false){
                    $this->load->model('model_user','m_user');
                    $this->m_user->pending_job($kodevoucherpending,$catatan);
                    echo $this->session->set_flashdata('msg','success-pending');
                    redirect('welcome');
                } else{
                    echo $this->session->set_flashdata('msg','validasi');
                    redirect('welcome');
                }
                
            }else{
                echo $this->session->set_flashdata('msg','error');
                redirect('welcome');
            }
        }
	}

    function lihatData()
    {               
        $data['unit']=$this->m_user->get_unit_kerja();    
        $data['data']=$this->m_user->get_all_dokumen();
        $data['title'] = "Data";
        $data['subtitle'] = "Job";
        $data['view_isi'] = "data_job";
        $this->load->view('layout/template_user', $data);     
    } 

    function get_job_detail(){
        $data['staff']=$this->m_admin->staff();
        $kode=$this->uri->segment(4);
        $data['catatan']=$this->m_admin->catatan($kode);
        $kode=$this->uri->segment(4);
        $data['data']=$this->m_admin->get_job_by_kode($kode);
        $data['title'] = "Job";
        $data['subtitle'] = "Detail";
        $data['view_isi'] = "data_job_detail";
        $this->load->view('layout/template_user',$data);
    }   
}
?>
