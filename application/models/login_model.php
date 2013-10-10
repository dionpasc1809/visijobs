<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godhepaer
 * Date: 10/10/13
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_model extends CI_Model	{
    function login_model()	{
        parent::__construct();

    }

    function verifyLogin($username, $password)
    {
        $query = "SELECT * FROM ms_jobseeker WHERE email = '$username' AND password = '".md5($password)."'";
        $result = $this->db->query($query);
        $resultnum = $result->num_rows();
        if($resultnum==0)
        {
            return false;
        }
        else if($resultnum>=1)
        {
            return true;
        }
    }
}
?>