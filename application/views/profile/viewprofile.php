<style>
    .profile-info-table tr td:first-child {
        width:150px;
    }
    .profile-data-status-table  {
        width:300px;
        clear: both;
    }
    .profile-data-status-table tr td:first-child    {
        width:200px;
        text-align: right;
    }
    .profile-data-title {
        font-size: 24px;
    }
    .profile-data-hr    {
        border-color: rgba(0,0,0,0.1);
    }
    .profile-data-container {
        width:300px;
        left:0;
        right: 0;
        margin:0 auto;
        text-align: center;
    }
</style>
<div class="content">
    <div style="width:1200px; position:relative; margin:0 auto; min-height:1190px;">
        <div class="profile">
            <div class="profile-info">
                <div id="profile-picture">

                </div>
                <?php
                /**
                 * Created by JetBrains PhpStorm.
                 * User: godhepaer
                 * Date: 10/11/13
                 * Time: 2:00 PM
                 * To change this template use File | Settings | File Templates.
                 */
                foreach($user as $u)
                {
                ?>
                <div id="profile-info-nama">
                    <?php echo $u->nama; ?>
                </div>
                <div id="profile-info-email">
                    <?php echo $u->email; ?>
                </div>
                <hr/>
                <table class="profile-info-table">
                    <?php
                    echo "<br/>";
                    ?>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $u->gender;?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <?php
                        $old_tgl = $u->tanggal_lahir;
                        $tgl = explode('-',$old_tgl);
                        //tahun -- bulan -- tanggal
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
                        $new_tgl = array(
                            'tahun'=>$tgl[0],
                            'bulan'=>$bulan[$tgl[1]],
                            'tgl'=>$tgl[2]
                        );
                        ?>
                        <td><?php echo $new_tgl['tgl']." ".$new_tgl['bulan']." ".$new_tgl['tahun']; ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td><?php echo $u->no_telepon; ?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td><?php echo $u->pendidikan_terakhir; ?></td>
                    </tr>
                    <tr>
                        <td>Minat Kerja</td>
                        <td><?php echo $u->minat_kerja; ?></td>
                    </tr>
                    <tr>
                        <td>Pengalaman Kerja</td>
                        <td><?php echo $u->lama_pengalaman; ?> Tahun</td>
                    </tr>
                    <?php
                    $gaji = $u->gaji;
                    /*$chargaji = strlen((string)$gaji);
                    $jum_koma = floor($chargaji/3);*/
                    $gaji = number_format($gaji);
                    ?>
                    <tr>
                        <td>Gaji</td>
                        <td>Rp <?php echo $gaji; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $u->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><?php echo $u->kota; ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><?php echo $u->agama; ?></td>
                    </tr>
                    <?php
                    $data_profil = $u->status_profil;
                    $data_expnedu = $u->status_expnedu;
                    $data_cv = $u->status_cv;
                    $data_jobalert = $u->status_jobalert;
                    }   ?>
                </table>
                <hr class="profile-data-hr"/>
                <br/>
                <div class="profile-data-container">
                    <div class="profile-data-title">Kelengkapan Data</div>
                    <hr style="width:300px; float:left;"/>
                    <?php
                    if($data_profil=="yes")
                    {
                        $profil="css/images/icon_ok.gif";
                    }
                    else if($data_profil=="no")
                    {
                        $profil="css/images/icon_no.gif";
                    }

                    if($data_expnedu=="yes")
                    {
                        $expnedu="css/images/icon_ok.gif";
                    }
                    else if($data_expnedu=="no")
                    {
                        $expnedu="css/images/icon_no.gif";
                    }

                    if($data_cv=="yes")
                    {
                        $cv="css/images/icon_ok.gif";
                    }
                    else if($data_cv=="no")
                    {
                        $cv="css/images/icon_no.gif";
                    }

                    if($data_jobalert=="yes")
                    {
                        $jobalert="css/images/icon_ok.gif";
                    }
                    else if($data_jobalert=="no")
                    {
                        $jobalert="css/images/icon_no.gif";
                    }
                    ?>
                    <table class="profile-data-status-table">
                        <tr>
                            <td>Data Profil</td>
                            <td><img src="<?php echo base_url().$profil; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Data Pendidikan & Pengalaman Kerja</td>
                            <td><img src="<?php echo base_url().$expnedu; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Data CV</td>
                            <td><img src="<?php echo base_url().$cv; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Job Alert</td>
                            <td><img src="<?php echo base_url().$jobalert; ?>"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="profile-navi">
                <div class="profile-navi-edit" onclick="window.location='<?php echo base_url(); ?>site/editprofile';">Edit Data Profil</div>
                <div class="profile-navi-edit" onclick="window.location='<?php echo base_url(); ?>site/editexpnedu';">Edit Pendidikan & Pengalaman Kerja</div>
                <div class="profile-navi-edit" onclick="window.location='<?php echo base_url(); ?>site/editcv';">Tambah / Edit CV</div>
                <div class="profile-navi-edit">Edit Job Alert</div>
            </div>
        </div>
    </div>
</div>
