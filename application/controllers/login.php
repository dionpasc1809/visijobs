<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godhepaer
 * Date: 10/10/13
 * Time: 10:39 PM
 * To change this template use File | Settings | File Templates.
 */

class login extends CI_Controller{
    function index()  {
        $this->load->model('login_model','lm');
        $username = $_POST['txt_login_id'];
        $password = $_POST['txt_login_pass'];
        $remember = "no";
        if(isset($_POST['chk_login_remember'])&&$_POST['chk_login_remember']!="")
        {
            $remember = "yes";
        }
        $verify = $this->lm->verifyLogin($username,$password);
        if($verify===true)
        {
            $datauser = array(
                'email'=>$username,
                'password'=>$password,
                'login'=>$remember
            );
            $this->session->set_userdata($datauser);
            redirect($_SERVER['HTTP_REFERER']);
        }
        else if($verify!==false){

        }
    }
}
?>