<?php

class Topics extends CI_Controller	{
	public function view()	{
		$this->load->model('topicmodel');
		
		$data['name'] = 'XYZ';
		$data['topics'] = $this->topicmodel->getAllTopics();
		
		$this->load->view('topics_view', $data);
		}
	}

?>