<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_model extends CI_MODEL	{
	function getAllEmployer()
	{
		$query = "SELECT * FROM ms_employer";
		
		$result = $this->db->query($query);
		return $result->result();
	}
}
?>