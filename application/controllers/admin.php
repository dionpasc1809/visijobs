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

    function logout()
    {
        $this->load->model('admin_model','am');
        $this->session->sess_destroy();
        redirect(base_url().'admin/home');
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
    function jobseeker($type, $query1=null, $query2=null)
    {
        $data['session']=$this->session->all_userdata();
        $this->load->model('admin_model','am');
        if($type=="view")
        {
            if($query1==null || $query2==null)
            {
                $data['jobseeker']=$this->am->getAllData('jobseeker');
                $this->load->view('admin/jobseeker_view',$data);
            }
            else if($query1!=null && $query2!=null)
            {
                $data['jobseeker']=$this->am->getJSData($query1, $query2);
                $this->load->view('admin/jobseeker_view',$data);
                //echo $query2." -> ".$query1;
            }

        }
        else if($type=="insert")
        {
            $data['jobseeker']=$this->am->getAllData('jobseeker');
            $data['lokasi']=$this->am->getLokasi();
            $this->load->view('admin/jobseeker_insert',$data);
        }
        else if($type=="edit")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/jobseeker/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['jobseeker']=$this->am->getAllData('jobseeker');
                $data['lokasi']=$this->am->getLokasi();
                $this->load->view('admin/jobseeker_edit',$data);
            }
        }
        else if($type=="delete")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/jobseeker/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['jobseeker']=$this->am->deleteJobseeker($data['edit_id']);
                redirect(base_url().'admin/jobseeker/view');
            }
        }
    }

    function employer($type, $query1=null, $query2=null)
    {
        $data['session']=$this->session->all_userdata();
        $this->load->model('admin_model','am');
        if($type=="view")
        {
            if($query1==null || $query2==null)
            {
                $data['employer']=$this->am->getAllData('employer');
                $this->load->view('admin/employer_view',$data);
            }
            else if($query1!=null && $query2!=null)
            {
                $data['employer']=$this->am->getEMPData($query1, $query2);
                $this->load->view('admin/employer_view',$data);
                //echo $query2." -> ".$query1;
            }

        }
        else if($type=="insert")
        {
            $data['employer']=$this->am->getAllData('employer');
            $data['industri']=$this->am->getIndustri();
            $id_emp = $this->am->getLastIDEmp();
            $re_id = '/(?:EM([0-9]+))?$/';
            $match = array();
            preg_match($re_id,$id_emp,$match);
            $generate_id_emp = intval($match[1]);
            $generate_id_emp = $generate_id_emp+1;
            $int_length = strlen((string)$generate_id_emp);
            $new_id_zero = "";
            for($f=0;$f<8-$int_length;$f++)
            {
                $new_id_zero .= '0';
            }
            $generate_id_emp = "EM".$new_id_zero.(string)$generate_id_emp;
            $data['id_employer']=$generate_id_emp;
            $this->load->view('admin/employer_insert',$data);
        }
        else if($type=="edit")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/employer/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['employer']=$this->am->getAllData('employer');
                $data['industri']=$this->am->getIndustri();
                $this->load->view('admin/employer_edit',$data);
            }
        }
        else if($type=="delete")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/employer/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['employer']=$this->am->deleteEmployer($data['edit_id']);
                redirect(base_url().'admin/employer/view');
            }
        }
    }

    function kategori($type, $query1=null, $query2=null)
    {
        $data['session']=$this->session->all_userdata();
        $this->load->model('admin_model','am');
        if($type=="view")
        {
            if($query1==null || $query2==null)
            {
                $data['kategori']=$this->am->getAllData('kategori');
                $this->load->view('admin/kategori_view',$data);
            }
            else if($query1!=null && $query2!=null)
            {
                $data['kategori']=$this->am->getJSData($query1, $query2);
                $this->load->view('admin/kategori_view',$data);
                //echo $query2." -> ".$query1;
            }
        }
        /*else if($type=="insert")
        {
            $data['jobseeker']=$this->am->getAllData('jobseeker');
            $data['lokasi']=$this->am->getLokasi();
            $this->load->view('admin/jobseeker_insert',$data);
        }
        else if($type=="edit")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/jobseeker/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['jobseeker']=$this->am->getAllData('jobseeker');
                $data['lokasi']=$this->am->getLokasi();
                $this->load->view('admin/jobseeker_edit',$data);
            }
        }
        else if($type=="delete")
        {
            if($query1==null)
            {
                redirect(base_url().'admin/jobseeker/view');
            }
            else if($query1!=null)
            {
                $data['edit_id']=$query1;
                $data['jobseeker']=$this->am->deleteJobseeker($data['edit_id']);
                redirect(base_url().'admin/jobseeker/view');
            }
        }*/
    }

        function getSubLokasi()
        {
            $this->load->model('admin_model','am');
            $super = $_POST['super'];
            $datasub = $this->am->getSubLokasi($super);
            $datahtml = "<option>---</option>";
            foreach($datasub as $ds)
            {
                $datahtml .="<option>".$ds->subkategori."</option>";
            }
            echo $datahtml;
        }
        function insertJs()
        {
            $datapost = $_POST;
            echo "<pre>";
            print_r($datapost);
            echo "</pre>";
            $this->load->model('admin_model','am');
            $this->am->insertJobseeker($datapost);
            redirect(base_url()."admin/jobseeker/view");
        }
        function editJs()
        {
            $datapost = $_POST;
            echo "<pre>";
            print_r($datapost);
            echo "</pre>";
            $this->load->model('admin_model','am');
            $this->am->updateJobseeker($datapost);
            redirect(base_url()."admin/jobseeker/view");
        }
        function searchJS()
        {
            $js_search = $_GET;
            $keyword = $js_search['jobseeker-search'];
            $kategori = $js_search['jobseeker-search-category'];
            redirect(base_url()."admin/jobseeker/view/".$keyword."/".$kategori);
        }

        function searchEMP()
        {
            $emp_search = $_GET;
            $keyword = $emp_search['employer-search'];
            $kategori = $emp_search['employer-search-category'];
            redirect(base_url()."admin/employer/view/".$keyword."/".$kategori);
        }
        function insertEMP()
        {
            $datapost = $_POST;
            $file = $_FILES['employer-logo'];
            echo "<pre>";
            print_r($datapost);
            echo "</pre>";
            $this->load->model('admin_model','am');
            $this->am->insertEmployer($datapost, $file);
            redirect(base_url()."admin/employer/view");
        }
        function editEMP()
        {
            $datapost = $_POST;
            $file = $_FILES['employer-logo'];
            echo "<pre>";
            print_r($datapost);
            echo "</pre>";
            $this->load->model('admin_model','am');
            $this->am->updateEmployer($datapost, $file);
            redirect(base_url()."admin/employer/view");
        }
}

    ?>