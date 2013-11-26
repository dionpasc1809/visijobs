<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class site_model extends CI_Model	{
	
	function site_model()	{
		parent::__construct();
		
	}
	
	function getAllCategory($tipe)	{
		$distkategori = $this->db->query("SELECT DISTINCT(kategori) FROM ms_kategori WHERE tipe='$tipe'");
		
		$category = array();
		foreach($distkategori->result() as $row)
		{
			$kat = $row->kategori;

			$query = $this->db->query("SELECT subkategori, id_kategori FROM ms_kategori WHERE kategori='$kat' AND tipe='$tipe'");
			$sub = array();
			foreach($query->result() as $q):
                $newsub = array($q->subkategori,$q->id_kategori);
				array_push($sub, $newsub);
			endforeach;
			$category += array(
				$kat => $sub
			);
		}
		return $category;
	}
}




?>