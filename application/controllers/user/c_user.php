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
        $tglmulaikerja=date('Y-m-d h:i:s');
        $tgl=date('Y-m-d h:i:s');
        $day = date('D');

		if($job=strip_tags($this->input->post('job')) == "New Job"){
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('uk','Uk','required');
            $this->form_validation->set_rules('juduldokumen','Judul Dokumen','required');
            $this->form_validation->set_rules('catatan','Catatan','required');

            if($this->form_validation->run() != false){
                
                //Check hari
                if($day=="Wed") {
                    $tglselesaikerja1=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                    $tglselesai1=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                    $this->m_user->simpan_job_rabu($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai1,$tglmulaikerja,$tglselesaikerja1);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('welcome');
                        }elseif($day=="Thu"){
                          $tglselesaikerja2=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                          $tglselesai2=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));  
                          $this->m_user->simpan_job_kamis($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai2,$tglmulaikerja,$tglselesaikerja2);
                            echo $this->session->set_flashdata('msg','success');
                            redirect('welcome');
                        }elseif ($day=="Fri") {
                            $tglselesaikerja3=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));  
                            $tglselesai3=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                            $this->m_user->simpan_job_jumat($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai3,$tglmulaikerja,$tglselesaikerja3);
                            echo $this->session->set_flashdata('msg','success');
                            redirect('welcome');
                        }elseif($day=="Sun" || $day=="Sat") {
                            echo $this->session->set_flashdata('msg','error-job');
                            redirect('dashboard');
                        }else{
                            $tglselesaikerja4=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));  
                            $tglselesai4=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));
                            $this->m_user->simpan_job($email,$uk,$kodevoucher,$juduldokumen,$catatan,$tglselesai4,$tglmulaikerja,$tglselesaikerja4);
                                echo $this->session->set_flashdata('msg','success');
                                redirect('welcome');
                        }
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
                    
                    //Check hari
                if($day=="Wed") {
                    $tglselesaikerja1=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                    $this->m_user->pending_job_rabu($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja1);
                            echo $this->session->set_flashdata('msg','success-pending');
                            redirect('welcome');
                        }elseif($day=="Thu"){
                          $tglselesaikerja2=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));
                          $this->m_user->pending_job_kamis($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja4);
                            echo $this->session->set_flashdata('msg','success-pending');
                            redirect('welcome');
                        }elseif ($day=="Fri") {
                            $tglselesaikerja3=date('Y-m-d h:i:s', strtotime("+5 day", strtotime(date("Y-m-d h:i:s"))));  
                            $this->m_user->pending_job_jumat($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja3);
                            echo $this->session->set_flashdata('msg','success-pending');
                            redirect('welcome');
                        }elseif($day=="Sun" || $day=="Sat") {
                            echo $this->session->set_flashdata('msg','error-job');
                            redirect('dashboard');
                        }else{
                            $tglselesaikerja4=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));  
                            $this->m_user->pending_job($kodevoucherpending,$catatan,$tglmulaikerja,$tglselesaikerja4);
                            echo $this->session->set_flashdata('msg','success-pending');
                            redirect('welcome');
                        }
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
        $data['pending']=$this->m_user->get_pending_dokumen();
        $data['finish']=$this->m_user->get_finish_dokumen();
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
        $data['data']=$this->m_user->get_job_by_kode($kode);
        $data['title'] = "Job";
        $data['subtitle'] = "Detail";
        $data['view_isi'] = "data_job_detail";
        $this->load->view('layout/template_user',$data);
    }   
}
?>
