<?php
class TopicModel extends CI_Model	{
	public function getAllTopics()	{
		$result = $this->db->query('CALL getTopics()');
		
		return $result->result();
	}
	
	public function getTopic($id)	{
		// ...
	}
	
	public function updateTopic($id, $title)	{
		//...
	}
	
	public function addTopic($title)	{
		//...
	}
}
?>