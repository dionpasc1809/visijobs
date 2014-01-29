<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_model extends CI_Model	{
    function admin_model()	{
        parent::__construct();
    }

    function loginAdmin($user,$pass)
    {
        $this->db->from('ms_admin')
            ->where('username',$user)
            ->where('password',$pass);

        $result = $this->db->get();

        return $result->num_rows();
    }

    function getAllData($jsoremp)
    {
        $this->db->from('ms_'.$jsoremp);
        $result = $this->db->get();

        return $result->result();
    }

    function getJSData($query1 , $query2)
    {
        $this->db->from('ms_jobseeker')
        ->where($query2." LIKE '%".$query1."%'");
        $result = $this->db->get();

        return $result->result();
    }

    function getEMPData($query1 , $query2)
    {
        $this->db->from('ms_employer')
            ->where($query2." LIKE '%".$query1."%'");
        $result = $this->db->get();

        return $result->result();
    }

    function getLokasi()
    {
        $this->db->distinct('kategori')
            ->where('tipe','lokasi');
        $result = $this->db->get('ms_kategori');

        return $result->result();
    }

    function getIndustri()
    {
        $this->db->where('tipe','industri');
        $result = $this->db->get('ms_kategori');

        return $result->result();
    }

    function getSubLokasi($super)
    {
        $this->db->select('subkategori')
            ->from('ms_kategori')
            ->where('tipe','lokasi')
            ->where('kategori',$super);
        $result = $this->db->get();

        return $result->result();
    }

    function insertJobseeker($data)
    {
        $nama = $data['jobseeker-nama'];
        $email = $data['jobseeker-email'];
        $password = $data['jobseeker-password'];
        $gender = $data['jobseeker-gender'];
        $tgllahir = $data['jobseeker-tgllahir'];
        $telepon = $data['jobseeker-telepon'];
        $pendidikan = $data['jobseeker-pendidikan'];
        $minat = $data['jobseeker-minat'];
        $pengalaman = $data['jobseeker-pengalaman'];
        $gaji = $data['jobseeker-gaji'];
        $alamat = $data['jobseeker-alamat'];
        $kota = $data['jobseeker-kota-1'];
        $kota .= ",".$data['jobseeker-kota-2'];
        $agama = $data['jobseeker-agama'];
        $status_profil = "no";
        $status_expnedu = "no";
        $status_cv = "no";
        $status_jobalert = "no";

        $data_batch = array(
            'nama' => $nama,
            'email' => $email,
            'password' => md5($password),
            'gender' => $gender,
            'tanggal_lahir' => $tgllahir,
            'no_telepon' => $telepon,
            'pendidikan_terakhir' => $pendidikan,
            'minat_kerja' => $minat,
            'lama_pengalaman' => $pengalaman,
            'gaji' => $gaji,
            'alamat' => $alamat,
            'kota' => $kota,
            'agama' => $agama,
            'status_profil' => $status_profil,
            'status_expnedu' => $status_expnedu,
            'status_cv' => $status_cv,
            'status_jobalert' => $status_jobalert
        );

        $this->db->insert('ms_jobseeker',$data_batch);
    }

    function updateJobseeker($data)
    {
        $id = $data['jobseeker-id'];
        $nama = $data['jobseeker-nama'];
        $email = $data['jobseeker-email'];
        $password = $data['jobseeker-password'];
        $gender = $data['jobseeker-gender'];
        $tgllahir = $data['jobseeker-tgllahir'];
        $telepon = $data['jobseeker-telepon'];
        $pendidikan = $data['jobseeker-pendidikan'];
        $minat = $data['jobseeker-minat'];
        $pengalaman = $data['jobseeker-pengalaman'];
        $gaji = $data['jobseeker-gaji'];
        $alamat = $data['jobseeker-alamat'];
        $kota = $data['jobseeker-kota-1'];
        $kota .= ",".$data['jobseeker-kota-2'];
        $agama = $data['jobseeker-agama'];
        $status_profil = $data['jobseeker-statusprofil'];
        $status_expnedu = $data['jobseeker-statusexpnedu'];
        $status_cv = $data['jobseeker-statuscv'];
        $status_jobalert = $data['jobseeker-statusjobalert'];

        $data_batch = array(
            'nama' => $nama,
            'email' => $email,
            'gender' => $gender,
            'tanggal_lahir' => $tgllahir,
            'no_telepon' => $telepon,
            'pendidikan_terakhir' => $pendidikan,
            'minat_kerja' => $minat,
            'lama_pengalaman' => $pengalaman,
            'gaji' => $gaji,
            'alamat' => $alamat,
            'kota' => $kota,
            'agama' => $agama,
            'status_profil' => $status_profil,
            'status_expnedu' => $status_expnedu,
            'status_cv' => $status_cv,
            'status_jobalert' => $status_jobalert
        );
        if($password!=null || $password!="")
        {
            $data_pass = array('password' => md5($password));
            $data_batch = array_merge($data_batch,$data_pass);
        }

        $this->db->where('id_jobseeker',$id);
        $this->db->update('ms_jobseeker',$data_batch);
    }
    function deleteJobseeker($id)
    {
        $this->db->where('id_jobseeker',$id);
        $this->db->delete('ms_jobseeker');
    }

    function getLastIDEmp()
    {
        $this->db->order_by('id_employer','desc')
            ->select('id_employer');
        $result = $this->db->get('ms_employer');
        $row = $result->row();
        return $row->id_employer;
    }

    function insertEmployer($data, $file=null)
    {
        $id = $data['employer-id'];
        $nama = $data['employer-nama'];
        $email = $data['employer-email'];
        $password = $data['employer-password'];
        $npwp = $data['employer-npwp'];
        $alamat = $data['employer-alamat'];
        $industri = $data['employer-industri'];
        $paket = $data['employer-paket'];
        $telepon = $data['employer-telepon'];
        $tipe = $data['employer-tipe'];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];

        $data_batch = array(
            'id_employer' => $id,
            'nama_perusahaan' => $nama,
            'email_perusahaan' => $email,
            'password_perusahaan' => md5($password),
            'NPWP' => $npwp,
            'alamat' => $alamat,
            'industri' => $industri,
            'jenis_paket' => $paket,
            'no_telepon' => $telepon,
            'tipe' => $tipe
        );

        if($file_name!="")
        {
            if (!file_exists("images/employer/".$id)) {
                mkdir("images/employer/".$id, 0777, true);
            }
            move_uploaded_file($file_tmp, "images/employer/".$id."/" . $file_name);
            $data_logo = array('logo' => "images/employer/".$id."/" . $file_name);
            $data_batch = array_merge($data_batch,$data_logo);
        }
        else
        {
            $data_logo = array('logo' => '');
            $data_batch = array_merge($data_batch,$data_logo);
        }

        $this->db->insert('ms_employer',$data_batch);
    }

    function updateEmployer($data, $file=null)
    {
        $id = $data['employer-id'];
        $nama = $data['employer-nama'];
        $email = $data['employer-email'];
        $password = $data['employer-password'];
        $npwp = $data['employer-npwp'];
        $alamat = $data['employer-alamat'];
        $industri = $data['employer-industri'];
        $paket = $data['employer-paket'];
        $telepon = $data['employer-telepon'];
        $tipe = $data['employer-tipe'];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];

        $data_batch = array(
            'id_employer' => $id,
            'nama_perusahaan' => $nama,
            'email_perusahaan' => $email,
            'NPWP' => $npwp,
            'alamat' => $alamat,
            'industri' => $industri,
            'jenis_paket' => $paket,
            'no_telepon' => $telepon,
            'tipe' => $tipe
        );

        if($file_name!="")
        {
            if (!file_exists("images/employer/".$id)) {
                mkdir("images/employer/".$id, 0777, true);
            }
            move_uploaded_file($file_tmp, "images/employer/".$id."/" . $file_name);
            $data_logo = array('logo' => "images/employer/".$id."/" . $file_name);
            $data_batch = array_merge($data_batch,$data_logo);
        }

        if($password!=null || $password!="")
        {
            $data_pass = array('password_perusahaan' => md5($password));
            $data_batch = array_merge($data_batch,$data_pass);
        }

        $this->db->where('id_employer',$id)
            ->update('ms_employer',$data_batch);
    }

    function deleteEmployer($id)
    {
        $this->db->where('id_employer',$id);
        $this->db->delete('ms_employer');
    }

}