<?php

class Model_login extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function cek($username,$password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("tbl_user");
    }
    
}
