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

class profile_model extends CI_Model	{
    function profile_model()	{
        parent::__construct();
    }

    function getProfileInfo($email)
    {
        $query = "SELECT * FROM ms_jobseeker WHERE email = '$email'";
        $result = $this->db->query($query);
        $resultset = $result->result();
        return $resultset;
    }

    function setProfileInfo($dataprofile, $user)
    {
        $this->db->where('email', $user);
        $result = $this->db->update('ms_jobseeker',$dataprofile);
        $affrows = $this->db->affected_rows();
        return $result."<br/>".$affrows;
    }
}
?>