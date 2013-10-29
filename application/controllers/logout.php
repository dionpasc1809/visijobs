<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godhepaer
 * Date: 10/10/13
 * Time: 10:39 PM
 * To change this template use File | Settings | File Templates.
 */

class logout extends CI_Controller{
    function index()  {
        $this->load->model('login_model','lm');
        if($this->session->userdata('login')==FALSE){
            redirect(base_url()."site");
        }
        else{
            $datauser = array(
                'email'=>'',
                'password'=>'',
                'login'=>''
            );
            $this->session->unset_userdata($datauser);
            redirect(base_url()."site");
        }
    }
}
?>