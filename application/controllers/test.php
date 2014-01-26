<?php 
	class Test extends CI_CONTROLLER	{
		function index()	{
			$this->load->model('test_model','tm');
			$data['emp']=$this->tm->getAllEmployer();
			
			$this->load->view("test_search",$data);
		}
        function searchjs() {
            $this->load->model('test_model','tm');

            $keyword = $this->input->post('keyword');
            $nama = $this->input->post('by_nama');
            $minat = $this->input->post('by_minat');
            $by_pengalaman = $this->input->post('by_pengalaman');
            $by_pendidikan = $this->input->post('by_pendidikan');
            $by_kota = $this->input->post('by_kota');

            echo $keyword."<br/>";
            echo $nama."<br/>";
            echo $minat."<br/>";
            echo $by_pengalaman."<br/>";
            echo $by_pendidikan."<br/>";
            echo $by_kota."<br/><br/><br/><br/><br/>";

            $datasearch = array(
                'keyword' => $keyword,
                'nama' => $nama,
                'minat' => $minat,
                'pengalaman' => $by_pengalaman,
                'pendidikan' => $by_pendidikan,
                'kota' => $by_kota
            );

            $result_js = $this->tm->search_jobseeker($datasearch);

            if($result_js[0]<=0)
            {
                echo "Hasil Tidak Ditemukan !!";
            }
            else{
                foreach($result_js[1] as $rj)
                {
                    echo $rj->nama."<br/>";
                    echo $rj->email."<br/>";
                    echo $rj->kota."<br/>";
                    echo $rj->id_jobseeker."<br/>";
                }
            }


            //$this->load->view("test_search_result",$data);
        }
        function upload()
        {
            $this->load->model('test_model','tm');
            $data['test']="test";

            $this->load->view("test_upload",$data);
        }
        function testupload()
        {
            $dir = $_POST['directory'];
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["testfile"]["name"]);
            $extension = end($temp);
            if (    (($_FILES["testfile"]["type"] == "image/gif")|| ($_FILES["testfile"]["type"] == "image/jpeg")|| ($_FILES["testfile"]["type"] == "image/jpg")|| ($_FILES["testfile"]["type"] == "image/pjpeg")|| ($_FILES["testfile"]["type"] == "image/x-png")|| ($_FILES["testfile"]["type"] == "image/png"))   && ($_FILES["testfile"]["size"] < 20000000)&& in_array($extension, $allowedExts))
            {
                if ($_FILES["testfile"]["error"] > 0)
                {
                    echo "Error: " . $_FILES["testfile"]["error"] . "<br>";
                }
                else
                {
                    echo "Upload: " . $_FILES["testfile"]["name"] . "<br>";
                    echo "Type: " . $_FILES["testfile"]["type"] . "<br>";
                    echo "Size: " . ($_FILES["testfile"]["size"] / 1024) . " kB<br>";
                    echo "Stored in: " . $_FILES["testfile"]["tmp_name"]."<br/>";
                    if (file_exists("upload/".$dir."/" . $_FILES["testfile"]["name"]))
                    {
                        echo $_FILES["testfile"]["name"] . " already exists. ";
                    }
                    else
                    {
                        $path = "upload/".$dir;
                        if ( ! is_dir($path)) {
                            mkdir($path);
                        }
                        move_uploaded_file($_FILES["testfile"]["tmp_name"],
                            "upload/".$dir."/". $_FILES["testfile"]["name"]);
                        echo "Stored in: " . "upload/".$dir."/". $_FILES["testfile"]["name"];
                    }
                }
            }
            else
            {
                echo "Invalid file";
            }
        }
	}
?>