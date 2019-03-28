<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_login');
        
    }
    function index() {
        $id_user = $this->session->userdata('id_user');
        if (!empty($id_user)) {
            redirect('dashboard');
        }
        else{
            $data['title'] = 'Login';
            $data['subtitle'] = 'Website PT INTI';
            $this->load->view('v_login', $data);
        }
    }

    function getlogin() {
       $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo $this->session->set_flashdata('msg','Silahkan Isi Seluruh Form !');
            $this->load->view('v_login');
        } else {

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = ($usr);
            $p = sha1($psw);
            
            $this->load->model('model_login','m_login');
            $cek = $this->m_login->cek($u,$p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $login) {
                    $sesi = array(
                    'nipeg_user'   => $login->nipeg_user,
                    'nama_user'    => $login->nama_user,
                    'username'     => $login->username,
                    'level'        => $login->level,
                    'foto_user'    => $login->foto_user,
                    'divisi_user'  => $login->divisi_user,
                );
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg','success-login');
                redirect('dashboard');
            } elseif($cek->num_rows() <= 0) {
                echo $this->session->set_flashdata('msg','Username atau Password Tidak Terdaftar !');
                redirect('login');
            } else {
                echo $this->session->set_flashdata('msg','Username atau Password Tidak Sesuai !');
                redirect('login');
            }
        }
    }
}
