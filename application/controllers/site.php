<?php
	class Site extends CI_CONTROLLER	{
		
		function index()	{
//            $array_items = array('password' => '', 'email' => '', 'login' => '');
//            $this->session->unset_userdata($array_items);
			$this->load->model('site_model','sm');
			$data['category']['kategori']=$this->sm->getAllCategory('kategori');
			$data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
			$data['category']['industri']=$this->sm->getAllCategory('industri');
			$this->load->view('home',$data);
		}
		
		function search()	{
			$this->load->model('search_model','sr');
			$this->load->model('site_model','sm');
			$data['category']['kategori']=$this->sm->getAllCategory('kategori');
			$data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
			$data['category']['industri']=$this->sm->getAllCategory('industri');
			if(isset($_GET['keyword'])):
				$data['keyword']=$_GET['keyword'];
					if(isset($_GET['kategori']) && $_GET['kategori']!=""){
						$kategori = explode(',',$_GET['kategori']);
						$data['cat_kategori']=$kategori;
					}else
						{
							$data['cat_kategori']=NULL;
						}
					if(isset($_GET['lokasi']) && $_GET['lokasi']!=""){
						$lokasi = explode(',',$_GET['lokasi']);
						$data['cat_lokasi']=$lokasi;
					}else
						{
							$data['cat_lokasi']=NULL;
						}
					if(isset($_GET['page'])){
						$data['current_page']=$_GET['page'];
					}else if(!isset($_GET['page'])){
						$data['current_page']=1;
					}
				$data['num_rows']=$this->sr->getSearchQty($data['keyword'],$data['cat_kategori'],$data['cat_lokasi']);
				$data['result']=$this->sr->getSearchResults($data['keyword'],$data['cat_kategori'],$data['cat_lokasi'],$data['current_page']);
				$data['query_compile'] = $this->db->last_query();
				$this->load->view('searchresult',$data);
			elseif(!isset($_GET['keyword'])):
				redirect('site');
			endif;
		}
		function test()
		{
			if(isset($_GET['inputan'])):
			$data['inputan']=$_GET['inputan'];
			$this->load->view('test',$data);
			else:
			$this->load->view('test');
			endif;
		}

        function profile()
        {
            $this->load->model('profile_model','pm');
            $this->load->model('site_model','sm');
            $data['category']['kategori']=$this->sm->getAllCategory('kategori');
            $data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
            $data['category']['industri']=$this->sm->getAllCategory('industri');
            if($this->session->userdata('login')==FALSE)
            {
                redirect(base_url()."site");
            }
            else if($this->session->userdata('login')!=FALSE)
            {
                $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));
                $this->load->view('profile',$data);
            }
        }

        function editprofile()
        {
            $this->load->model('profile_model','pm');
            $this->load->model('site_model','sm');
            $data['category']['kategori']=$this->sm->getAllCategory('kategori');
            $data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
            $data['category']['industri']=$this->sm->getAllCategory('industri');
            if($this->session->userdata('login')==FALSE)
            {
                redirect(base_url()."site");
            }
            else if($this->session->userdata('login')!=FALSE)
            {
                $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));
                $data['edittype']='editprofile';
                $this->load->view('edit',$data);
            }
        }

        function editexpnedu()
        {
            $this->load->model('profile_model','pm');
            $this->load->model('site_model','sm');
            $data['category']['kategori']=$this->sm->getAllCategory('kategori');
            $data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
            $data['category']['industri']=$this->sm->getAllCategory('industri');
            if($this->session->userdata('login')==FALSE)
            {
                redirect(base_url()."site");
            }
            else if($this->session->userdata('login')!=FALSE)
            {
                $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));
                $checkexpnedu = $this->pm->checkExpnEdu($this->session->userdata('email'));
                $eduis=$checkexpnedu['edu'];
                $expis=$checkexpnedu['exp'];

                    if($eduis=='TRUE')
                    {
                        $data['current_edu']=$this->pm->getEdu($this->session->userdata('email'));
                    }
                    if($expis=='TRUE')
                    {
                        $data['current_exp']=$this->pm->getExp($this->session->userdata('email'));
                    }

                $data['edittype']='editexpnedu';
                $this->load->view('edit',$data);
            }
        }

        function editcv($type=NULL)
        {
            $this->load->model('profile_model','pm');
            $this->load->model('site_model','sm');
            $data['category']['kategori']=$this->sm->getAllCategory('kategori');
            $data['category']['lokasi']=$this->sm->getAllCategory('lokasi');
            $data['category']['industri']=$this->sm->getAllCategory('industri');
            if($type==NULL || $type=="")
            {
                if($this->session->userdata('login')==FALSE)
                {
                    redirect(base_url()."site");
                }
                else if($this->session->userdata('login')!=FALSE)
                {
                    $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));
                    foreach($data['user'] as $d)
                    {
                        $user_get = $d->id_jobseeker;
                    }
                    $data['cvdata'] = $this->pm->getCVdata($user_get);
                    $data['edittype']='editcv';
                    $this->load->view('edit',$data);
                }
            }
            else if($type=="generate")
            {
                if($this->session->userdata('login')==FALSE)
                {
                    redirect(base_url()."site");
                }
                else if($this->session->userdata('login')!=FALSE)
                {
                    $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));


                    $data['edittype']='editcv';
                    $this->load->view('edit',$data);
                }
            }
            else if($type=="upload")
            {
                if($this->session->userdata('login')==FALSE)
                {
                    redirect(base_url()."site");
                }
                else if($this->session->userdata('login')!=FALSE)
                {
                    $data['user']=$this->pm->getProfileInfo($this->session->userdata('email'));

                    $data['edittype']='editcv_upload';
                    $this->load->view('edit',$data);
                }
            }

        }
	}
	
?>