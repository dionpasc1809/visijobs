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
                    <?php
                    echo "<br/>";
                    echo "Jenis Kelamin : ".$u->gender;
                    echo "<br/>";
                    echo "Tanggal Lahir : ".$u->tanggal_lahir;
                    echo "<br/>";
                    echo "Telepon : ".$u->no_telepon;
                    echo "<br/>";
                    echo "Pendidikan Terakhir : ".$u->pendidikan_terakhir;
                    echo "<br/>";
                    echo "Minat Kerja : ".$u->minat_kerja;
                    echo "<br/>";
                    echo "Pengalaman Kerja : ".$u->lama_pengalaman;
                    echo "<br/>";
                    $gaji = $u->gaji;
                    /*$chargaji = strlen((string)$gaji);
                    $jum_koma = floor($chargaji/3);*/
                    $gaji = number_format($gaji);
                    echo "Gaji : ".$gaji;
                    echo "<br/>";
                    echo "Alamat : ".$u->alamat;
                    echo "<br/>";
                    echo "Kota : ".$u->kota;
                    echo "<br/>";
                    echo "Agama : ".$u->agama;
                    echo "<br/>";
                }
                ?>
            </div>
            <div class="profile-navi">
                <div class="profile-navi-edit" onclick="window.location='<?php echo base_url(); ?>site/editprofile';">Edit Data Profil</div>
                <div class="profile-navi-edit" onclick="window.location='<?php echo base_url(); ?>site/editexpnedu';">Edit Pendidikan & Pengalaman Kerja</div>
                <div class="profile-navi-edit">Tambah / Edit CV</div>
                <div class="profile-navi-edit">Edit Job Alert</div>
            </div>
        </div>
    </div>
</div>
