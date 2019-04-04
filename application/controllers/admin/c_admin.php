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

    function set_finish(){
        $kode=$this->uri->segment(4);
		$this->m_admin->finish_dokumen($kode);
		echo $this->session->set_flashdata('msg','success-finish');
		redirect('dashboard');
    }

    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->m_admin->GetRow($keyword);        
        echo json_encode($data);
    }
  
    function kirim_job(){
        
        $kodevoucher=strip_tags($this->input->post('kodevoucher'));
        $catatanadmin=strip_tags($this->input->post('catatanadmin'));
        $namastaff=strip_tags($this->input->post('country'));
        $tglmulai=strip_tags($this->input->post('mulai'));
        $user=strip_tags($this->input->post('user'));
        $tglselesai=date('Y-m-d h:i:s', strtotime("+3 day", strtotime(date("Y-m-d h:i:s"))));

        if($user=strip_tags($this->input->post('user'))=="admin"){
            $this->form_validation->set_rules('catatanadmin','Catatan Admin','required');
            $this->form_validation->set_rules('user','User','required');
            $admin=$this->session->userdata('nama_user');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_admin->simpan_job_admin($kode,$catatanadmin,$admin,$tglselesai,$tglmulai,$user);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
                redirect('dashboard');
            }
        }else {
            $this->form_validation->set_rules('catatanadmin','Catatan Admin','required');
            $this->form_validation->set_rules('country','Country','required');
            $this->form_validation->set_rules('user','User','required');

            if($this->form_validation->run() != false){
                $kode=$kodevoucher;
                $this->m_admin->simpan_job($kode,$catatanadmin,$namastaff,$tglselesai,$tglmulai,$user);
                echo $this->session->set_flashdata('msg','success');
                redirect('dashboard');
            }else{
                echo $this->session->set_flashdata('msg','validasi');
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
