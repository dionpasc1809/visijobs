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

    function search_jobseeker($data)
    {
        $keyword = $data['keyword'];
        $keyword = explode(' ',$keyword);
        $count_keyword = count($keyword);
        $this->db->from('ms_jobseeker');

        for($i=1;$i<=$count_keyword;$i++)
        {
            if($i==1)
            {
                $this->db->where("nama LIKE '%".$keyword[$i-1]."%'");
            }
            else{
                $this->db->or_where("nama LIKE '%".$keyword[$i-1]."%'");
            }
        }


        if($data['minat']!=''){
            for($i=1;$i<=$count_keyword;$i++)
            {
                $this->db->or_where($data['minat']." LIKE '%".$keyword[$i-1]."%'");
            }
        }
        if($data['pengalaman']!=''){
            for($i=1;$i<=$count_keyword;$i++)
            {
                $this->db->or_where($data['pengalaman']." LIKE '%".$keyword[$i-1]."%'");
            }
        }
        if($data['pendidikan']!=''){
            for($i=1;$i<=$count_keyword;$i++)
            {
                $this->db->or_where($data['pendidikan']." LIKE '%".$keyword[$i-1]."%'");
            }

        }
        if($data['kota']!=''){
            for($i=1;$i<=$count_keyword;$i++)
            {
                $this->db->or_where($data['kota']." LIKE '%".$keyword[$i-1]."%'");
            }

        }

        $result = $this->db->get();
        $hasil = array(
            $result->num_rows(),
            $result->result()
        );

        return $hasil;
    }
}
?>