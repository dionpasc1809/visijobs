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

    function expnedu()
    {
        $this->load->model('profile_model','pm');

        $user=$this->session->userdata('email');
        $id = $this->pm->getProfileId($user);
        foreach($id as $userid)
        {
            $id_js = $userid->id_jobseeker;
        }

        $tingkat = $_POST['expnedu-record-tingkat'];
        $tahun_min = $_POST['expnedu-record-tahun-min'];
        $tahun_max = $_POST['expnedu-record-tahun-max'];
        $instansi = $_POST['expnedu-record-instansi'];
        $nilai = $_POST['expnedu-record-nilai'];

        $new_edu = array();
        $edu_count=0;
        foreach($tingkat as $t)
        {
            if($instansi[$edu_count]!='')
            {
                array_push($new_edu,array(
                    'id_jobseeker'=>$id_js,
                    'tingkat'=>$t,
                    'tahun_awal'=>$tahun_min[$edu_count],
                    'tahun_akhir'=>$tahun_max[$edu_count],
                    'instansi'=>$instansi[$edu_count],
                    'nilai'=>$nilai[$edu_count]
                ));
            }
            $edu_count++;
        }

        $exp_tahun_min = $_POST['expnedu-record-exp-tahun-min'];
        $exp_tahun_max = $_POST['expnedu-record-exp-tahun-max'];
        $exp_perusahaan = $_POST['expnedu-record-exp-perusahaan'];
        $exp_jabatan = $_POST['expnedu-record-exp-jabatan'];

        $new_exp = array();
        $exp_count = 0;

        foreach($exp_tahun_min as $etm)
        {
            if($exp_perusahaan[$exp_count]!='')
            {
                array_push($new_exp,array(
                    'id_jobseeker'=>$id_js,
                    'tahun_awal'=>$etm,
                    'tahun_akhir'=>$exp_tahun_max[$exp_count],
                    'perusahaan'=>$exp_perusahaan[$exp_count],
                    'jabatan'=>$exp_jabatan[$exp_count]
                ));
            }
            $exp_count++;
        }

        $result = $this->pm->setExpnedu($new_exp, $new_edu, $user);

        $referer = $_SERVER['HTTP_REFERER'];
        $data = array(
            'referer'=>$referer
        );
        $this->load->view('profile/editexpnedu_ok',$data);
    }

    function cvupload()
    {
        $this->load->model('profile_model','pm');

        $dir = $_POST['directory'];
        $allowedExts = array("pdf", "doc", "docx", "ppt", "pptx");
        $temp = explode(".", $_FILES["filecv"]["name"]);
        $extension = end($temp);
        if (($_FILES["filecv"]["size"] < 20000000)&& in_array($extension, $allowedExts))
        {
            if ($_FILES["filecv"]["error"] > 0)
            {
                $error =  "Error: " . $_FILES["filecv"]["error"] . "<br>";
                $errortitle = "Masalah Pada Upload";
            }
            else
            {
//                echo "Upload: " . $_FILES["filecv"]["name"] . "<br>";
//                echo "Type: " . $_FILES["filecv"]["type"] . "<br>";
//                echo "Size: " . ($_FILES["filecv"]["size"] / 1024) . " kB<br>";
//                echo "Stored in: " . $_FILES["filecv"]["tmp_name"]."<br/>";
                if (file_exists("upload/".$dir."/" . $_FILES["filecv"]["name"]))
                {
                    echo $_FILES["filecv"]["name"] . " already exists. ";
                    $error = "File " . $_FILES["filecv"]["name"] . " sudah pernah tersimpan sebelumnya !";
                    $errortitle = "File Sudah Pernah Tersimpan";
                }
                else
                {
                    $path = "upload/".$dir;
                    if ( ! is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($_FILES["filecv"]["tmp_name"],
                        "upload/".$dir."/". $_FILES["filecv"]["name"]);
                    //echo "Stored in: " . "upload/".$dir."/". $_FILES["filecv"]["name"];
                    $error = "Upload: " . $_FILES["filecv"]["name"] . "<br>"."Type: " . $_FILES["filecv"]["type"] . "<br>"."Size: " . ($_FILES["filecv"]["size"] / 1024) . " kB<br>";
                    $errortitle = "Sukses Menyimpan File";

                    $idprof=$this->pm->getProfileId($this->session->userdata('email'));
                    foreach($idprof as $i)
                    {
                        $datains['id_jobseeker']=$i->id_jobseeker;
                    }
                    $datains['tipe']="upload";
                    $datains['lokasi_file']="upload/".$dir."/". $_FILES["filecv"]["name"];
                    $result = $this->pm->saveCV($datains);
                    $error.="<br/>".$result." data yang diubah";
                }
            }
        }
        else
        {
            $error = "Masukkan file yang tepat untuk mengupload CV<br/>(doc,docx,ppt,pptx,pdf)";
            $errortitle = "File Tidak Tepat";
        }

        $data['error']=$error;
        $data['errortitle']=$errortitle;
        $data['referer']=$_SERVER['HTTP_REFERER'];
        $this->load->view('profile/editcv_upload_msg',$data);

    }
}
?>