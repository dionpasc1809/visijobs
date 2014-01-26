<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_model extends CI_Model	{
    function admin_model()	{
        parent::__construct();
    }

    function loginAdmin($user,$pass)
    {
        $this->db->from('ms_admin')
            ->where('username',$user)
            ->where('password',$pass);

        $result = $this->db->get();

        return $result->num_rows();
    }

    function getAllData($jsoremp)
    {
        $this->db->from('ms_'.$jsoremp);
        $result = $this->db->get();

        return $result->result();
    }

}