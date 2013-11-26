<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godhepaer
 * Date: 10/10/13
 * Time: 10:39 PM
 * To change this template use File | Settings | File Templates.
 */

class edit extends CI_Controller{
    function index()  {
        $this->load->model('login_model','lm');
    }

    function profile()  {
        $this->load->model('profile_model','pm');
        if(!isset($_POST['edit-profile-nama']))  {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $nama = $_POST["edit-profile-nama"];
        $email = $_POST["edit-profile-email"];
        $gender = $_POST["edit-profile-gender"];
        $tanggal_lahir = $_POST["edit-profile-tgllahir"];
        $no_telepon = $_POST["edit-profile-telepon"];
        $pendidikan_terakhir = $_POST["edit-profile-pendidikan"];
        $minat_kerja = $_POST["edit-profile-minat"];
        $lama_pengalaman = $_POST["edit-profile-pengalaman"];
        $gaji = $_POST["edit-profile-gaji"];
        $alamat = $_POST["edit-profile-alamat"];
        $kota = $_POST["edit-profile-kota"];
        $agama = $_POST["edit-profile-agama"];

        $dataprofile = array(
            'nama'=>$nama,
            'gender'=>$gender,
            'tanggal_lahir'=>$tanggal_lahir,
            'no_telepon'=>$no_telepon,
            'pendidikan_terakhir'=>$pendidikan_terakhir,
            'minat_kerja'=>$minat_kerja,
            'lama_pengalaman'=>$lama_pengalaman,
            'gaji'=>$gaji,
            'alamat'=>$alamat,
            'kota'=>$kota,
            'agama'=>$agama
        );
        $user=$this->session->userdata('email');
        $result = $this->pm->setProfileInfo($dataprofile, $user);
        $referer = $_SERVER['HTTP_REFERER'];
        $data = array(
            'result'=>$result,
            'referer'=>$referer
        );
        $this->load->view('profile/editprofile_ok',$data);
    }
}
?>