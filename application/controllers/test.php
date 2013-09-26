<?php 
	class Test extends CI_CONTROLLER	{
		function index()	{
			$this->load->model('test_model','tm');
			$data['emp']=$this->tm->getAllEmployer();
			
			$this->load->view("test_view",$data);
		}
	}
?>