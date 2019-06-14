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

    public function filter_tahun_staff(){
        $nama = $this->session->userdata('nama_user');
        $tahun=$this->input->get('tahun_staff');
        //Staff per tahun
        $data['st_januari'] = $this->m_staff->get_staff_ad_januari($tahun,$nama);
        $data['st_februari'] = $this->m_staff->get_staff_ad_februari($tahun,$nama);
        $data['st_maret'] = $this->m_staff->get_staff_ad_maret($tahun,$nama);
        $data['st_april'] = $this->m_staff->get_staff_ad_april($tahun,$nama);
        $data['st_mei'] = $this->m_staff->get_staff_ad_mei($tahun,$nama);
        $data['st_juni'] = $this->m_staff->get_staff_ad_juni($tahun,$nama);
        $data['st_juli'] = $this->m_staff->get_staff_ad_juli($tahun,$nama);
        $data['st_agustus'] = $this->m_staff->get_staff_ad_agustus($tahun,$nama);
        $data['st_september'] = $this->m_staff->get_staff_ad_september($tahun,$nama);
        $data['st_oktober'] = $this->m_staff->get_staff_ad_oktober($tahun,$nama);
        $data['st_november'] = $this->m_staff->get_staff_ad_november($tahun,$nama);
        $data['st_desember'] = $this->m_staff->get_staff_ad_desember($tahun,$nama);

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

    public function filter_bulan_staff() {
        $nama = $this->session->userdata('nama_user');
        $bulan=$this->input->get('bulan_filter');
        $tahun=date('Y');
        //Staff
        $data['sth_senin'] = $this->m_staff->get_staff_ad_senin($bulan,$tahun,$nama);
        $data['sth_selasa'] = $this->m_staff->get_staff_ad_selasa($bulan,$tahun,$nama);
        $data['sth_rabu'] = $this->m_staff->get_staff_ad_rabu($bulan,$tahun,$nama);
        $data['sth_kamis'] = $this->m_staff->get_staff_ad_kamis($bulan,$tahun,$nama);
        $data['sth_jumat'] = $this->m_staff->get_staff_ad_jumat($bulan,$tahun,$nama);

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
}
?>
