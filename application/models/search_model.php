<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class search_model extends CI_Model	{
	
	function search_model()	{
		parent::__construct();
		
	}
	
	function getSearchQty($keyword, $kategori, $lokasi)	{
		$rkat = "";
		if($kategori!=NULL):
			$rkat = "AND (";
			/*$kategori= explode(',',$kategori);*/
			foreach($kategori as $k)
			{
				$rkat .="mk.subkategori = '$k' OR ";
			}
			$rkat = substr($rkat,0,strlen($rkat)-4);
			$rkat .= ") ";
		endif;
		
		$rlok = "";
		if($lokasi!=NULL):
			$rlok = "AND (";
			/*$lokasi = explode(',',$lokasi);*/
			foreach($lokasi as $l)
			{
				$rlok .="tj.kota LIKE '%$l%' OR ";
			}
			$rlok = substr($rlok,0,strlen($rlok)-4);
			$rlok .= ") ";
		endif;
		
		$results = $this->db->query("SELECT tj.id_jobs, tj.posisi, tj.kota, tj.keterangan, mk.kategori, mk.subkategori, me.nama_perusahaan AS employer, mfe.nama_perusahaan AS fake_employer, tdj.tanggal
		FROM tr_jobs tj
		INNER JOIN tr_detail_jobs tdj ON tj.id_jobs=tdj.id_jobs
		INNER JOIN ms_kategori mk ON tj.id_kategori=mk.id_kategori
		LEFT JOIN ms_employer me ON me.id_employer=tdj.id_employer
		LEFT JOIN ms_fake_employer mfe ON mfe.id_fake_employer=tdj.id_fake_employer
		WHERE (tj.posisi LIKE '%$keyword%' 
		OR tj.keterangan LIKE '%$keyword%'
		OR me.nama_perusahaan LIKE '%$keyword%'
		OR mfe.nama_perusahaan LIKE '%$keyword%')
		$rkat
		$rlok
		ORDER BY tj.id_jobs ");
		
		/*return $this->db->select('tj.id_jobs, tj.posisi, tj.kota, tj.keterangan, mk.kategori, mk.subkategori, me.nama_perusahaan AS employer, mfe.nama_perusahaan AS fake_employer, tdj.tanggal')
			->join('tr_detail_jobs tdj', 'tj.id_jobs=tdj.id_jobs')
			->join('ms_kategori mk', 'tj.id_kategori=mk.id_kategori')
			->join('ms_employer me', 'me.id_employer=tdj.id_employer')
			->join('ms_fake_employer mfe', 'mfe.id_fake_employer=tdj.id_fake_employer')
			->where("(tj.posisi LIKE '%$keyword%' 
			OR tj.keterangan LIKE '%$keyword%'
			OR me.nama_perusahaan LIKE '%$keyword%'
			OR mfe.nama_perusahaan LIKE '%$keyword%')
			$rlok
			$rkat
			")
			->order_by('tj.id_jobs')
		->get('tr_jobs tj');*/
		
		return $results->num_rows();
	}
	
	function getSearchResults($keyword, $kategori, $lokasi, $current_page)	{
		$rkat = "";
		if($kategori!=NULL):
		$rkat = "AND (";
			/*$kategori= explode(',',$kategori);*/
			foreach($kategori as $k)
			{
				if(strpos($k,'All ')===true)
				{
					$rkat .="mk.kategori = '$k' OR ";
				}
				else
				{
					$rkat .="mk.subkategori = '$k' OR ";
				}
			}
			$rkat = substr($rkat,0,strlen($rkat)-4);
			$rkat .= ") ";
		endif;
		
		$rlok = "";
		if($lokasi!=NULL):
		$rlok = "AND (";
			/*$lokasi = explode(',',$lokasi);*/
			foreach($lokasi as $l)
			{
				$rlok .="tj.kota LIKE '%$l%' OR ";
			}
			$rlok = substr($rlok,0,strlen($rlok)-4);
			$rlok .= ") ";
		endif;
		
		$page_result = 4;
		$curpage = ($current_page-1)*$page_result;
		$query_limit = "LIMIT ".$curpage.",".$page_result;
		
		$results = $this->db->query("SELECT tj.id_jobs, tj.posisi, tj.kota, tj.keterangan, mk.kategori, mk.subkategori, me.nama_perusahaan AS employer, mfe.nama_perusahaan AS fake_employer, tdj.tanggal
FROM tr_jobs tj
		INNER JOIN tr_detail_jobs tdj ON tj.id_jobs=tdj.id_jobs
		INNER JOIN ms_kategori mk ON tj.id_kategori=mk.id_kategori
		LEFT JOIN ms_employer me ON me.id_employer=tdj.id_employer
		LEFT JOIN ms_fake_employer mfe ON mfe.id_fake_employer=tdj.id_fake_employer
		WHERE (tj.posisi LIKE '%$keyword%' 
		OR tj.keterangan LIKE '%$keyword%'
		OR me.nama_perusahaan LIKE '%$keyword%'
		OR mfe.nama_perusahaan LIKE '%$keyword%')
		".$rkat."
		".$rlok."
		ORDER BY tj.id_jobs 
		".$query_limit);
		
		/*return $this->db->select('tj.id_jobs, tj.posisi, tj.kota, tj.keterangan, mk.kategori, mk.subkategori, me.nama_perusahaan AS employer, mfe.nama_perusahaan AS fake_employer, tdj.tanggal')
		->join('tr_detail_jobs tdj', 'tj.id_jobs=tdj.id_jobs')
		->join('ms_kategori mk', 'tj.id_kategori=mk.id_kategori')
		->join('ms_employer me', 'me.id_employer=tdj.id_employer')
		->join('ms_fake_employer mfe', 'mfe.id_fake_employer=tdj.id_fake_employer')
		->where("(tj.posisi LIKE '%$keyword%' 
		OR tj.keterangan LIKE '%$keyword%'
		OR me.nama_perusahaan LIKE '%$keyword%'
		OR mfe.nama_perusahaan LIKE '%$keyword%')
		$rlok
		$rkat
		")
		->order_by('tj.id_jobs')
		->get('tr_jobs tj');*/
		
		return $results->result();
	}
}




?>