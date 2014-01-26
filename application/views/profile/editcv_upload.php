<style>
.cv-edit form{
    font-size: 14px;
}
.cv-edit input  {
    cursor:hand;
    cursor:pointer;
}
.cv-edit input[type="submit"] {
    font-family: Calibri;
    font-size: 14px;
    color:#FFFFFF;
    border: 1px solid #2a7ef0;
    border-radius:5px 5px;
    padding: 5px;
    background-color: rgba(0,49,115,1);
}
    .cv-edit input[type="submit"]:hover {
        background-color: rgba(0,49,115,0.5);
    }
    .cv-edit input[type="submit"]:active    {
        background-color: #d6d6f2;
        color : rgba(0,49,115,1);
    }

.cv-edit-table  {
    width: 600px;
    border-collapse: collapse;
    margin-bottom: 20px;
}
    .cv-edit-table-td1  {
        width: 180px;
        padding: 5px;
        border:1px solid rgba(0,0,0,0.2);
        font-weight: bold;
    }
    .cv-edit-table-td2  {
        padding: 5px;
        border:1px solid rgba(0,0,0,0.2);
    }
    .cv-edit-filedata   {
        padding-left: 150px;
    }
    .cv-edit-cvfile {
        font-size: 14px;
        font-weight: bold;
    }
    .cv-edit-file-container {
        padding: 10px;
        margin-bottom: 20px;
        border:1px solid rgba(0,49,115,0.4);
    }
    .cv-edit-upload-submit  {
        text-align: center;
    }
</style>
<div class="content">
    <?php
    foreach($user as $u):
        $nama = $u->nama;
        $email = $u->email;
        $password = $u->password;
        $gender = $u->gender;
        $tanggal_lahir = $u->tanggal_lahir;
        $no_telepon = $u->no_telepon;
        $pendidikan_terakhir = $u->pendidikan_terakhir;
        $minat_kerja = $u->minat_kerja;
        $lama_pengalaman = $u->lama_pengalaman;
        $gaji = $u->gaji;
        $alamat = $u->alamat;
        $kota = $u->kota;
        $agama = $u->agama;
    endforeach;
    ?>
    <div style="width:1200px; position:relative; margin:0 auto; min-height:1190px;">
        <div class="cv-edit">
            <h1>Upload CV</h1>
            <form action="<?php echo base_url(); ?>edit/cvupload" method="post" enctype="multipart/form-data">
                <table class="cv-edit-table">
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Nama</td>
                        <td class="cv-edit-table-td2"><?php echo $nama; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Email</td>
                        <td class="cv-edit-table-td2"><?php echo $email; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Jenis Kelamin</td>
                        <td class="cv-edit-table-td2"><?php echo $gender; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Tanggal Lahir</td>
                        <?php
                        $new_tgl = explode("-",$tanggal_lahir);
                        $bulan = array(
                            '01'=>"Januari",
                            '02'=>"Februari",
                            '03'=>"Maret",
                            '04'=>"April",
                            '05'=>"Mei",
                            '06'=>"Juni",
                            '07'=>"Juli",
                            '08'=>"Agustus",
                            '09'=>"September",
                            '10'=>"Oktober",
                            '11'=>"November",
                            '12'=>"Desember"
                        );
                        $tgl_lahir = array(
                            'tgl'=>$new_tgl[2],
                            'bulan'=>$bulan[$new_tgl[1]],
                            'tahun'=>$new_tgl[0]
                        );
                        ?>
                        <td class="cv-edit-table-td2"><?php echo $tgl_lahir['tgl']." ".$tgl_lahir['bulan']." ".$tgl_lahir['tahun'] ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">No Telepon</td>
                        <td class="cv-edit-table-td2"><?php echo $no_telepon; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Pendidikan Terakhir</td>
                        <td class="cv-edit-table-td2"><?php echo $pendidikan_terakhir; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Minat Kerja</td>
                        <td class="cv-edit-table-td2"><?php echo $minat_kerja; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Pengalaman Kerja</td>
                        <td class="cv-edit-table-td2"><?php echo $lama_pengalaman; ?> Tahun</td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Gaji yang Diharapkan</td>
                        <td class="cv-edit-table-td2"><?php echo $gaji; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Alamat</td>
                        <td class="cv-edit-table-td2"><?php echo $alamat; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Kota</td>
                        <td class="cv-edit-table-td2"><?php echo $kota; ?></td>
                    </tr>
                    <tr class="cv-edit-table-row">
                        <td class="cv-edit-table-td1">Agama</td>
                        <td class="cv-edit-table-td2"><?php echo $agama; ?></td>
                    </tr>
                </table>
                <div class="cv-edit-file-container">
                    <span class="cv-edit-cvfile">CV Anda : </span><input type="file" name="filecv"/>
                    <div class="cv-edit-filedata">
                    </div>
                </div>

                <input type="hidden" name="directory" value="<?php echo $this->session->userdata('email'); ?>"/>
                <div class="cv-edit-upload-submit"><input type="submit" value="Upload CV"/></div>
            </form>
            <!--<form class="cv-edit-form" action="<?php /*echo base_url(); */?>edit/cv" method="post">
            </form>-->
        </div>
        <script type="text/javascript">
            $("input[name='filecv']").change(function(){
                var file = this.files[0];
                var name = file.name;
                var size = file.size;
                size = Math.round(size/1024)+" kB";
                var type = file.type;
                //Your validation
                var appendtohtml = "Nama File : "+name+"<br/>Ukuran File : "+size+"<br/>Bentuk File : "+type;
                $('.cv-edit-filedata').html(appendtohtml);
            });
        </script>
    </div>
</div>
