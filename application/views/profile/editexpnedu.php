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
                <table class="edu-edit-table">
                    <!--<tr>
                        <td>Nama</td>
                        <td><input type="text" name="edit-expnedu-nama" id="edit-expnedu-nama" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Edit Data Pribadi"/></td>
                    </tr>-->
                    <input type="hidden" id="expnedu-start" />
                    <tr class="expnedu-edu-label">
                        <td>Tingkat</td>
                        <td>Tahun</td>
                        <td>Nama Instansi</td>
                        <td>IPK / Rata-rata Nilai</td>
                    </tr>

                    <?php
                    if(isset($current_edu))
                    {
                        $settingkat=0;
                        foreach($current_edu as $ce)
                        {
                            ?>
                            <tr class="expnedu-edu-record">
                                <td>
                                    <select name="expnedu-record-tingkat[]" class="expnedu-record-tingkat">
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
                                    <select name="expnedu-record-tahun-min[]" class="expnedu-record-tahun-min">
                                        <?php
                                        $i = date('Y');
                                        for($i;$i>=1900;$i--):
                                            if($i==$ce['tahun_awal'])
                                            {
                                                ?>
                                                <option selected><?php echo $i; ?></option>
                                            <?php
                                            }
                                            else
                                            {?>
                                                <option><?php echo $i; ?></option>
                                            <?php }
                                        endfor; ?>
                                    </select> - <select name="expnedu-record-tahun-max[]" class="expnedu-record-tahun-max">
                                        <?php
                                        $i = date('Y');
                                        for($i;$i>=1900;$i--):
                                            if($i==$ce['tahun_akhir'])
                                            {
                                                ?>
                                                <option selected><?php echo $i; ?></option>
                                            <?php
                                            }
                                            else
                                            {?>
                                                <option><?php echo $i; ?></option>
                                            <?php }
                                        endfor; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="expnedu-record-instansi[]" class="expnedu-record-instansi" value="<?php echo $ce['instansi']; ?>"/>
                                </td>
                                <td>
                                    <input type="text" name="expnedu-record-nilai[]" class="expnedu-record-nilai" value="<?php echo $ce['nilai']; ?>" />
                                </td>
                                <td>
                                    <input type="button" value="X" class="expnedu-record-delete"/>
                                </td>
                            </tr>
                            <script>
                                var tingkat = document.getElementsByName('expnedu-record-tingkat[]')[<?php echo $settingkat; ?>];
                                var tingkat_opt="<?php echo $ce['tingkat']; ?>";
                                for(var i = 0, j = tingkat.options.length; i < j; ++i) {
                                    if(tingkat.options[i].innerHTML === tingkat_opt) {
                                        tingkat.selectedIndex = i;
                                        break;
                                    }
                                }
                            </script>
                            <?php $settingkat++;
                        }
                    }
                    else
                    {
                    ?>

                    <tr class="expnedu-edu-record">
                        <td>
                            <select name="expnedu-record-tingkat[]" class="expnedu-record-tingkat">
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
                            <select name="expnedu-record-tahun-min[]" class="expnedu-record-tahun-min">
                                <?php
                                $i = date('Y');
                                for($i;$i>=1900;$i--): ?>
                                <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select> - <select name="expnedu-record-tahun-max[]" class="expnedu-record-tahun-max">
                                <?php
                                $i = date('Y');
                                for($i;$i>=1900;$i--): ?>
                                    <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-instansi[]" class="expnedu-record-instansi" />
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-nilai[]" class="expnedu-record-nilai" />
                        </td>
                        <td>
                            <input type="button" value="X" class="expnedu-record-delete"/>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <br/><br/>

                <h2 class="expnedu-h2">Pengalaman Kerja</h2>
                <a href="#expnedu-start" id="expnedu-add-exp">+ Tambah Pengalaman Kerja Baru</a>
                <table class="exp-edit-table">
                    <!--<tr>
                        <td>Nama</td>
                        <td><input type="text" name="edit-expnedu-nama" id="edit-expnedu-nama" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Edit Data Pribadi"/></td>
                    </tr>-->
                    <input type="hidden" id="expnedu-start" />
                    <tr class="expnedu-exp-label">
                        <td>Tahun</td>
                        <td>Perusahaan</td>
                        <td>Jabatan</td>
                    </tr>

                    <?php
                    if(isset($current_exp))
                    {
                        foreach($current_exp as $ce)
                        {
                            ?>
                            <tr class="expnedu-exp-record">
                                <td>
                                    <select name="expnedu-record-exp-tahun-min[]" class="expnedu-record-exp-tahun-min">
                                        <?php
                                        $i = date('Y');
                                        for($i;$i>=1900;$i--):
                                            if($i==$ce['tahun_awal'])
                                            {
                                                ?>
                                                <option selected><?php echo $i; ?></option>
                                                <?php
                                            }
                                            else
                                            {?>
                                            <option><?php echo $i; ?></option>
                                        <?php }
                                            endfor; ?>
                                    </select> - <select name="expnedu-record-exp-tahun-max[]" class="expnedu-record-exp-tahun-max">
                                        <?php
                                        $i = date('Y');
                                        for($i;$i>=1900;$i--):
                                            if($i==$ce['tahun_akhir'])
                                            {
                                                ?>
                                                <option selected><?php echo $i; ?></option>
                                            <?php
                                            }
                                            else
                                            {?>
                                                <option><?php echo $i; ?></option>
                                            <?php }
                                        endfor; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="expnedu-record-exp-perusahaan[]" class="expnedu-record-exp-perusahaan" value="<?php echo $ce['perusahaan']; ?>"/>
                                </td>
                                <td>
                                    <input type="text" name="expnedu-record-exp-jabatan[]" class="expnedu-record-exp-jabatan" value="<?php echo $ce['jabatan']; ?>" />
                                </td>
                                <td>
                                    <input type="button" value="X" class="expnedu-record-exp-delete"/>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr class="expnedu-exp-record">
                        <td>
                            <select name="expnedu-record-exp-tahun-min[]" class="expnedu-record-exp-tahun-min">
                                <?php
                                $i = date('Y');
                                for($i;$i>=1900;$i--): ?>
                                    <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select> - <select name="expnedu-record-exp-tahun-max[]" class="expnedu-record-exp-tahun-max">
                                <?php
                                $i = date('Y');
                                for($i;$i>=1900;$i--): ?>
                                    <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-exp-perusahaan[]" class="expnedu-record-exp-perusahaan" />
                        </td>
                        <td>
                            <input type="text" name="expnedu-record-exp-jabatan[]" class="expnedu-record-exp-jabatan" />
                        </td>
                        <td>
                            <input type="button" value="X" class="expnedu-record-exp-delete"/>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <br/>
                <br/>
                <div class="expnedu-submit"><input type="submit" value="Simpan Perubahan"/></div>
            </form>
        </div>
        <script type="text/javascript">
            var edu_record = $('.expnedu-edu-record:first').clone(false);
            var exp_record = $('.expnedu-exp-record:first').clone(false);


            /* tambah pendidikan baru */
            $(document).ready(function(){
                $('#expnedu-add-edu').click(function(){
                    var new_record = edu_record.clone();
                    new_record.appendTo('.edu-edit-table');
                });
                $('#expnedu-add-exp').click(function(){
                    var new_record = exp_record.clone();
                    new_record.appendTo('.exp-edit-table');
                });
                $('.edu-edit-table').on('click', '.expnedu-record-delete', function () {
                    $(this).closest('tr').remove();
                });
                $('.exp-edit-table').on('click', '.expnedu-record-exp-delete', function () {
                    $(this).closest('tr').remove();
                });
            });

        </script>
    </div>
</div>
