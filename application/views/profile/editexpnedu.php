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
            <form class="profile-edit-form" action="<?php echo base_url(); ?>edit/expnedu" method="post">
                <h1>Edit Data Profile</h1>
                <hr/>
                <h2 class="expnedu-h2">Pendidikan</h2>
                <a href="#expnedu-start" id="expnedu-add-edu">+ Tambah Pendidikan Baru</a>
                <table class="expnedu-edit-table">
                    <!--<tr>
                        <td>Nama</td>
                        <td><input type="text" name="edit-expnedu-nama" id="edit-expnedu-nama" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Edit Data Pribadi"/></td>
                    </tr>-->
                    <input type="hidden" id="expnedu-start" />
                    <tr class="expnedu-label">
                        <td>Tingkat</td>
                        <td>Tahun</td>
                        <td>Nama Instansi</td>
                        <td>IPK / Rata-rata Nilai</td>
                    </tr>
                    <tr class="expnedu-record">
                        <td>
                            <select name="expnedu-record-tingkat" class="expnedu-record-tingkat">
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                                <option>D3</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Lainnya</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-tahun-min" class="expnedu-record-tahun-min" /> - <input type="text" name="expnedu-record-tahun-max" class="expnedu-record-tahun-max" />
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-instansi" class="expnedu-record-instansi" />
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-nilai" class="expnedu-record-nilai" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript">
            var expnedu_record = $('.expnedu-record').clone();
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

            /* tambah pendidikan baru */
            $('#expnedu-add-edu').click(function(){
                var new_record = expnedu_record.clone();
                new_record.appendTo('.expnedu-edit-table');
            });
        </script>
    </div>
</div>
