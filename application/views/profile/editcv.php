<style>
    .cv-edit-generate, .cv-edit-upload   {
        float:left;
        width:440px;
        padding: 10px;
        min-height: 100px;
        background-color: rgba(0,49,115,0.7);
        color:#FFFFFF;
    }
    .cv-edit-generate   {
        margin-right: 20px;
    }
        .cv-edit-generate h2, .cv-edit-upload h2    {
            -webkit-margin-before: 0em !important;
            -webkit-margin-after: 0em !important;
        }
    .cv-edit-inner  {
        position: relative;
        background-color: #FFFFFF;
        color: #001d44;
        width:420px;
        padding: 10px;
        min-height: 200px;
        margin-top: 10px;
        font-size: 14px;
    }
    .cv-edit-button {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        bottom: 10px;
        text-align: center;
    }
        .cv-edit-button input   {
            border: none;
            border-radius: 5px 5px;
            background-color: rgba(0,49,115,0.7);
            border:1px solid #2a7ef0;
            color: #FFFFFF;
            padding: 5px;
            cursor: hand;
            cursor: pointer;
        }
            .cv-edit-button input:hover {
                background-color: rgba(0,49,115,1);
            }
            .cv-edit-button input:active {
                background-color: #d6d6f2;
                color: #003173;
            }
    .cv-edit-data   {
        width:100%;
        position: relative;
        margin: 20px 0px 20px 0px;
        padding-bottom: 50px;
    }
        .cv-edit-data-table {
            width: 100%;
            border-collapse: collapse;
        }
            .cv-edit-data-table tr:last-child   {
                border-bottom: 1px solid rgba(0,0,0,0.5);
            }
            .cv-edit-data-table tr td:first-child{
                border-left: 1px solid rgba(0,0,0,0.2);
            }
            .cv-edit-data-table tr td:last-child{
                border-right: 1px solid rgba(0,0,0,0.2);
            }
            .cv-edit-data-table-tr-judul td    {
                border:1px solid rgba(0,0,0,0.2);
            }
            .cv-edit-data-table tr td   {
                padding: 5px;
                text-align: center;
                font-weight: bold;
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
            <h1>Tambah / Edit CV</h1>

            <div class="cv-edit-data">
                <table class="cv-edit-data-table">
                    <tr class="cv-edit-data-table-tr-judul">
                        <td>ID CV</td>
                        <td>Tanggal Buat</td>
                        <td>Tanggal Update</td>
                        <td>Setelan Privasi</td>
                        <td>Tipe CV</td>
                        <td>Download</td>
                        <td>Option</td>
                    </tr>
                    <?php
                    if($cvdata['record_data']<=0)
                    {
                    ?>
                    <tr>
                        <td colspan="7">No Data</td>
                    </tr>
                    <?php
                    }
                    else
                    {
                        foreach($cvdata['result'] as $cv):
                            //reformat tgl_buat
                            $tgl_buat = explode(' ',$cv->tanggal_buat);
                            $tgl_buat_exp = explode('-',$tgl_buat[0]);
                            $jam_buat = explode(':',$tgl_buat[1]);
                            $jam_buat_new = $jam_buat[0].':'.$jam_buat[1].' AM';
                            if($jam_buat[0]>12)
                            {
                                $jam_buat_new = ($jam_buat[0]-12).':'.$jam_buat[1].' PM';
                            }
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
                            $tgl_buat_new = $tgl_buat_exp[2].' '.$bulan[$tgl_buat_exp[1]].' '.$tgl_buat_exp[0].'<br/>'.$jam_buat_new;

                            //reformat tgl_update
                            $tgl_update = explode(' ',$cv->tanggal_update);
                            $tgl_update_exp = explode('-',$tgl_update[0]);
                            $jam_update = explode(':',$tgl_update[1]);
                            $jam_update_new = $jam_update[0].':'.$jam_update[1].' AM';
                            if($jam_update[0]>12)
                            {
                                $jam_update_new = ($jam_update[0]-12).':'.$jam_update[1].' PM';
                            }
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
                            $tgl_update_new = $tgl_update_exp[2].' '.$bulan[$tgl_update_exp[1]].' '.$tgl_update_exp[0].'<br/>'.$jam_update_new;
                    ?>
                    <tr>
                        <td><?php echo $cv->id_cv; ?></td>
                        <td><?php echo $tgl_buat_new; ?></td>
                        <td><?php echo $tgl_update_new; ?></td>
                        <td></td>
                        <td><?php echo $cv->tipe; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                            endforeach;
                    }
                    ?>
                </table>
            </div>

            <div class="cv-edit-generate">
                <h2>Generate CV Anda Online</h2>
                <div class="cv-edit-inner">
                    <b>Belum punya CV?</b><br/><br/>
                    Ingin membuat CV, namun bingung akan pengaturan isi dan layout dari CV Anda? Maka, gunakanlah sistem CV Online kami untuk membuat CV Online Anda sekarang.
                    <div class="cv-edit-button"><input type="button" value="Buat CV Online"/> </div>
                </div>
            </div>
            <div class="cv-edit-upload">
                <h2>Upload CV Anda</h2>
                <div class="cv-edit-inner">
                    <b>Punya format CV sendiri?</b><br/><br/>
                    Upload CV Anda sendiri dengan format berikut :<br/>
                    <ul>
                        <li>Microsoft Word (.doc, .docx)</li>
                        <li>Microsoft Powerpoint (.ppt, .pptx)</li>
                        <li>PDF (.pdf)</li>
                    </ul>
                    <br/>
                    Upload CV Anda sekarang !
                    <div class="cv-edit-button"><input type="button" value="Upload CV" onclick="window.location.href = '<?php echo base_url(); ?>site/editcv/upload';"/></div>
                </div>
            </div>
            <!--<form class="cv-edit-form" action="<?php /*echo base_url(); */?>edit/cv" method="post">
            </form>-->
        </div>
        <script type="text/javascript">

        </script>
    </div>
</div>
