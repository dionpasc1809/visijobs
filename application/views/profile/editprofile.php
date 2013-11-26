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
        <div class="profile-edit">
            <form class="profile-edit-form" action="<?php echo base_url(); ?>edit/profile" method="post">
                <h1>Edit Data Profile</h1>
                <table class="profile-edit-table">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="edit-profile-nama" id="edit-profile-nama" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="edit-profile-email" id="edit-profile-email" /></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="radio" name="edit-profile-gender" id="edit-profile-gender-male" value="Laki-Laki"/><span class="profile-edit-span">Laki-Laki</span><input type="radio" name="edit-profile-gender" name="edit-profile-gender-female" value="Perempuan"/><span class="profile-edit-span">Perempuan</span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" name="edit-profile-tgllahir" id="edit-profile-tgllahir" /></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td><input type="text" name="edit-profile-telepon" id="edit-profile-telepon" /></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td><select name="edit-profile-pendidikan" id="edit-profile-pendidikan">
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                                <option>D3</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Lain-Lain</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Minat Kerja</td>
                        <td><textarea cols="20" rows="10" name="edit-profile-minat" id="edit-profile-minat"></textarea></td>
                    </tr>
                    <tr>
                        <td>Lama Pengalaman</td>
                        <td><input type="text" name="edit-profile-pengalaman" id="edit-profile-pengalaman" /><span class="profile-edit-span">Tahun</span></td>
                    </tr>
                    <tr>
                        <td>Gaji yang Diharapkan</td>
                        <td><input type="text" name="edit-profile-gaji" id="edit-profile-gaji" /></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea cols="20" rows="10" name="edit-profile-alamat" id="edit-profile-alamat"></textarea></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><input type="text" name="edit-profile-kota" id="edit-profile-kota" /></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><input type="text" name="edit-profile-agama" id="edit-profile-agama" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Edit Data Pribadi"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript">
            $('#edit-profile-nama').val("<?php echo $nama; ?>");
            $('#edit-profile-email').val("<?php echo $email; ?>");
            var gender = "<?php echo $gender; ?>";
            var gender_picked = "";
            if(gender=="Laki-Laki"){
                gender_picked="male";
            }
            else if(gender=="Perempuan"){
                gender_picked="female";
            }
            $('#edit-profile-gender-'+gender_picked).prop('checked',true);
            //untuk gender
            var old_tgl_lahir = "<?php echo $tanggal_lahir; ?>";
            var tgl_lahir = old_tgl_lahir.split("-");
            var new_tgl_lahir = tgl_lahir[1]+"/"+tgl_lahir[2]+"/"+tgl_lahir[0];
            $('#edit-profile-tgllahir').val(old_tgl_lahir);
            $('#edit-profile-telepon').val("<?php echo $no_telepon; ?>");
            $('#edit-profile-pendidikan').val("<?php echo $pendidikan_terakhir; ?>");
            $('#edit-profile-minat').val("<?php echo $minat_kerja; ?>");
            $('#edit-profile-pengalaman').val("<?php echo $lama_pengalaman; ?>");
            $('#edit-profile-gaji').val("<?php echo $gaji; ?>");
            $('#edit-profile-alamat').val("<?php echo $alamat; ?>");
            $('#edit-profile-kota').val("<?php echo $kota; ?>");
            $('#edit-profile-agama').val("<?php echo $agama; ?>");
        </script>
    </div>
</div>
