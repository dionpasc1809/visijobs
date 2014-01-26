<?php
class Admin extends CI_CONTROLLER	{

    function index()	{
//            $array_items = array('password' => '', 'email' => '', 'login' => '');
//            $this->session->unset_userdata($array_items);
        $this->load->view('admin/home');
    }

    function login()    {
        $this->load->model('admin_model','am');
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $login = $this->am->loginAdmin($username,$password);

        if($login<=0)
        {
            $this->session->set_userdata('error','error_0');
            redirect($_SERVER['HTTP_REFERER']);
        }
        else if($login>=1)
        {
            $userdata = array(
                'username'=>$username,
                'login'=>'admin'
            );
            $this->session->set_userdata($userdata);
            redirect(base_url().'admin/home');
        }
    }

    function home()
    {
        if($this->session->userdata('username')==false)
        {
            redirect(base_url().'admin/index');
        }
        $data['session']=$this->session->all_userdata();
        $this->load->view('admin/index',$data);
    }
    function jobseeker($type)
    {
        $data['session']=$this->session->all_userdata();
        $this->load->model('admin_model','am');
        if($type=="view")
        {
            $data['jobseeker']=$this->am->getAllData('jobseeker');
            $this->load->view('admin/jobseeker_view',$data);
        }
    }
}

    ?>