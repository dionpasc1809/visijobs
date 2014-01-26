<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godhepaer
 * Date: 10/10/13
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class profile_model extends CI_Model	{
    function profile_model()	{
        parent::__construct();
    }

    function getProfileInfo($email)
    {
        $query = "SELECT * FROM ms_jobseeker WHERE email = '$email'";
        $result = $this->db->query($query);
        $resultset = $result->result();
        return $resultset;
    }

    function setProfileInfo($dataprofile, $user)
    {
        $this->db->where('email', $user);
        $result = $this->db->update('ms_jobseeker',$dataprofile);
        $affrows = $this->db->affected_rows();
        return $result."<br/>".$affrows;
    }

    function checkExpnEdu($user){
        $this->db->start_cache();

            $this->db->select('id_jobseeker');
            $this->db->where('email',$user);
            $idjs = $this->db->get('ms_jobseeker');
            foreach($idjs->result() as $id_js)
            {
                $id = $id_js->id_jobseeker;
            }

        $this->db->stop_cache();
        $this->db->flush_cache();

        $this->db->start_cache();

            $this->db->from('tr_pendidikan');
            $this->db->where('id_jobseeker',$id);
            $eduresult = $this->db->count_all_results();

        $this->db->stop_cache();
        $this->db->flush_cache();

        $this->db->start_cache();

            $this->db->from('tr_pengalaman');
            $this->db->where('id_jobseeker',$id);
            $expresult = $this->db->count_all_results();

        $this->db->stop_cache();
        $this->db->flush_cache();

        $expis = 'TRUE';
        $eduis = 'TRUE';

        if($eduresult<=0)
        {
            $eduis = 'FALSE';
        }
        if($expresult<=0)
        {
            $expis = 'FALSE';
        }

        $result = array(
            'exp'=>$expis,
            'edu'=>$eduis
        );

        return $result;
    }

    function getExp($user)///lanjut dari sini
    {
        $id_user = $this->getProfileId($user);
        foreach($id_user as $i)
        {
            $id = $i->id_jobseeker;
        }
        $this->db->where('id_jobseeker',$id);
        $resultexp = $this->db->get('tr_pengalaman');

        $j=0;

        foreach($resultexp->result() as $re)
        {
            $result[$j]['id_pengalaman']=$re->id_pengalaman;
            $result[$j]['tahun_awal']=$re->tahun_awal;
            $result[$j]['tahun_akhir']=$re->tahun_akhir;
            $result[$j]['perusahaan']=$re->perusahaan;
            $result[$j]['jabatan']=$re->jabatan;

            $j++;
        }

        return $result;
    }

    function getEdu($user)///lanjut dari sini
    {
        $id_user = $this->getProfileId($user);
        foreach($id_user as $i)
        {
            $id = $i->id_jobseeker;
        }
        $this->db->where('id_jobseeker',$id);
        $resultexp = $this->db->get('tr_pendidikan');

        $j=0;

        foreach($resultexp->result() as $re)
        {
            $result[$j]['id_pendidikan']=$re->id_pendidikan;
            $result[$j]['tingkat']=$re->tingkat;
            $result[$j]['tahun_awal']=$re->tahun_awal;
            $result[$j]['tahun_akhir']=$re->tahun_akhir;
            $result[$j]['instansi']=$re->instansi;
            $result[$j]['nilai']=$re->nilai;

            $j++;
        }

        return $result;
    }

    function getProfileId($user)
    {
        $this->db->select('id_jobseeker');
        $this->db->where('email',$user);
        $result = $this->db->get('ms_jobseeker');
        return $result->result();
    }

    function setExpnedu($exp, $edu, $check)
    {
        $check_result = $this->checkExpnEdu($check);
        $id_user = $this->getProfileId($check);
        foreach($id_user as $iu)
        {
            $id = $iu->id_jobseeker;
        }

        if($check_result['exp']=="TRUE")
        {
            $this->db->where('id_jobseeker',$id)
                ->delete('tr_pengalaman');
            $expresult = $this->db->insert_batch('tr_pengalaman',$exp);
        }
        else
        {
            $expresult = $this->db->insert_batch('tr_pengalaman',$exp);
        }

        if($check_result['edu']=="TRUE")
        {
            $this->db->where('id_jobseeker',$id)
                ->delete('tr_pendidikan');
            $eduresult = $this->db->insert_batch('tr_pendidikan',$edu);
        }
        else
        {
            $eduresult = $this->db->insert_batch('tr_pendidikan',$edu);
        }

        return "Edu : ".$eduresult."<br/>Exp : ".$expresult;
    }

    function saveCV($data)
    {
        $table_data=array(
            'id_jobseeker'=>$data['id_jobseeker'],
            'tanggal_buat'=>date('Y-m-d H:i:s'),
            'tanggal_update'=>date('Y-m-d H:i:s'),
            'tipe'=>$data['tipe'],
            'lokasi_file'=>$data['lokasi_file']
        );
        $this->db->insert("tr_cv",$table_data);
        return $this->db->affected_rows();
    }

    function getCVdata($data)
    {
        $this->db->from('tr_cv')
            ->where('id_jobseeker',$data);
        $result = $this->db->get();
        $output = array(
            'result' => $result->result(),
            'record_data' => $result->num_rows()
        );
        return $output;
    }
}
?>