<?php
if($this->session->userdata('username')==false)
{
    redirect(base_url().'admin');
}
?>
<html>
<head>
    <title>Admin Panel - Visijobs</title>
    <style>
        body    {
            margin:0;
            padding: 0;
            font-family: Calibri;
            color:#FFFFFF;
            background:url("<?php echo base_url(); ?>css/images/content-bg.png") repeat;
        }
        .inner-content-bg   {
            background-color: rgba(255,255,255,0.8);
            overflow-x: scroll;
            color:rgba(0,29,68,0.8);
        }
        .inner-content-bg table tr td {
            color:rgba(0,29,68,0.8);
            font-weight: bold;
            padding: 5px;
            position: relative;
        }
        .inner-content-bg table tr td:first-child   {
            min-width: 200px;
        }
        .inner-content-bg input[type='text'], .inner-content-bg input[type='password'], .inner-content-bg select, .inner-content-bg input[type='date'], .inner-content-bg textarea {
            padding: 5px;
            width: 200px;
        }
        .form-error-msg {
            position: absolute;
            z-index: 10;
            left: 100%;
            top: 5px;
            background-color: rgba(255,255,255,0.5);
            color: rgba(255,0,0,0.8);
            min-width: 200px;
            height: 34px;
            line-height: 34px;
            padding: 0px 5px 0px 5px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url();?>css/admin/style.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>

    <script type="text/javascript">
        var SHeight = screen.height;
        var SWidth = screen.width;

        //var inner_content_width = parseInt(SWidth)-300;

        $(window).load(function()    {
            $('.menu-nav-item').click(function(){
                $(this).next().toggle('slow');//css('display','block');
            });
            showClock();
            var intval = setInterval('showClock()',1000);
        });

        //javascript live clock
        function showClock()    {
            var now = new Date();
            var day = {
                0 : "Minggu",
                1 : "Senin",
                2 : "Selasa",
                3 : "Rabu",
                4 : "Kamis",
                5 : "Jumat",
                6 : "Sabtu"
            }
            var dayint = now.getDay();
            var month = {
                0 : "Januari",
                1 : "Februari",
                2 : "Maret",
                3 : "April",
                4 : "Mei",
                5 : "Juni",
                6 : "Juli",
                7 : "Agustus",
                8 : "September",
                9 : "Oktober",
                10 : "November",
                11 : "Desember"
            }
            var hours = now.getHours();
            if(hours<10)
            {
                hours = "0"+hours;
            }
            var min = now.getMinutes();
            if(min<10)
            {
                min = "0"+min;
            }
            var sec = now.getSeconds();
            if(sec<10)
            {
                sec = "0"+sec;
            }
            var ampm = "AM";
            if(hours>=12)
            {
                ampm = "PM";
            }
            var nowstr = day[dayint]+", "+now.getDate()+" "+month[now.getMonth()]+" "+now.getFullYear()+" "+hours+":"+min+":"+sec+" "+ampm;
            $('#clock').html(nowstr);
        }//end live clock

        //form validation
        function validateForm() {
            var x=document.forms["employer-form"];
            $('.form-error-msg').remove();
            var error_count = 0;
            var re_nama = /^[a-zA-Z\s]*[a-zA-Z]+[a-zA-Z]*$/;
            var re_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var file_type = ['jpeg','jpg','gif','png','bmp'];
            var re_telepon = /^\d+$/;
            if(x['employer-nama'].value==null || x['employer-nama'].value=="")
            {
                $('#employer-nama').after("<div class='form-error-msg'>Nama Perusahaan Harus Diisi</div>");
                error_count++;
            }
            if(x['employer-email'].value==null || x['employer-email'].value=="")
            {
                $('#employer-email').after("<div class='form-error-msg'>Email Perusahaan Harus Diisi</div>");
                error_count++;
            }
            else if(re_email.test(x['employer-email'].value)===false)
            {
                $('#employer-email').after("<div class='form-error-msg'>Email Perusahaan tidak Valid</div>");
                error_count++;
            }
            if($('#employer-password').prop('disabled')===false && (x['employer-password'].value==null || x['employer-password'].value==""))
            {
                $('#employer-password').after("<div class='form-error-msg'>Password Harus Diisi</div>");
                error_count++;
            }
            if(x['employer-npwp'].value==null || x['employer-npwp'].value=="")
            {
                $('#employer-npwp').after("<div class='form-error-msg'>NPWP Harus Diisi</div>");
                error_count++;
            }
            else if(re_telepon.test(x['employer-npwp'].value)===false)
            {
                $('#employer-npwp').after("<div class='form-error-msg'>NPWP tidak Valid</div>");
                error_count++;
            }
            if((x['employer-logo'].value!="") && (    $.inArray(x['employer-logo'].value.split('.').pop(),file_type)<=0 ))
            {
                $('#employer-logo').after("<div class='form-error-msg'>File Logo tidak sesuai, harus jpeg, gif, png, bmp</div>");
                error_count++;
            }
            if(x['employer-paket'].value==null || x['employer-paket'].value=="---")
            {
                $('#employer-paket').after("<div class='form-error-msg'>Paket Harus Diisi</div>");
                error_count++;
            }
            if(x['employer-tipe'].value==null || x['employer-tipe'].value=="---")
            {
                $('#employer-tipe').after("<div class='form-error-msg'>Tipe Harus Diisi</div>");
                error_count++;
            }
            if(error_count>0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        //end form validation


        $(document).ready(function()    {
            /*$('.employer-insert, .employer-delete, .employer-edit').hover(
             function(){
             $(this).find('.employer-button-message').show(200);
             },function(){
             $(this).find('.employer-button-message').hide(200);
             });*/
            $('#employer-kota-1').change(function(){
                $.post("<?php echo base_url(); ?>admin/getSubLokasi", { super:$(this).val() } ).done(function (sub) {
                    // update the textarea with the time
                    $("#employer-kota-2").html(sub);
                });
            });

        });
    </script>
</head>
<body>
<div class="admin-container">
    <div class="admin-header">
        <?php include('index_header.php'); ?>
    </div>
    <div class="admin-content">
        <div class="admin-menu-nav">
            <?php include("index_nav.php"); ?>
            <br style="clear: both;"/>
        </div>
        <div class="admin-inner-content inner-content-bg" id="admin-inner-content">
            <form name="employer-form" onsubmit="return validateForm()" action="<?php echo base_url(); ?>admin/editEMP" method="post" enctype="multipart/form-data">
                <h1 style="text-align: center;">Insert Employer Baru</h1>
                <hr/>
                <?php
                foreach($employer as $emp):
                    $id_emp = $emp->id_employer;

                    if($id_emp==$edit_id)
                    {
                ?>
                <table>
                    <tr>
                        <input type="hidden" id="employer-id" name="employer-id" value="<?php echo $edit_id; ?>"/>
                        <td>Nama Perusahaan</td>
                        <td><input type="text" id="employer-nama" name="employer-nama" placeholder="input nama perusahaan" value="<?php echo $emp->nama_perusahaan; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Email Perusahaan</td>
                        <td><input type="text" id="employer-email" name="employer-email" placeholder="input email perusahaan" value="<?php echo $emp->email_perusahaan; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="button" id="employer-pass-ok" name="employer-pass-ok" value="Ubah Password?" />
                            <input type="password" id="employer-password" name="employer-password" disabled/></td>
                    </tr>
                    <tr>
                        <td>NPWP</td>
                        <td>
                            <input type="text" id="employer-npwp" name="employer-npwp" placeholder="Input NPWP" value="<?php echo $emp->NPWP; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <textarea cols="20" rows="5" id="employer-alamat" name="employer-alamat"><?php echo $emp->alamat; ?></textarea>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>Kota</td>
                        <td>
                            <select id="employer-kota-1" name="employer-kota-1">
                                <option>---</option>
                                <?php
/*                                $i=0;
                                foreach($lokasi as $lok):
                                    $superlok = $lok->kategori;

                                    if($i==0)
                                    {
                                        */?><option><?php /*echo $superlok; */?></option><?php
/*                                    }
                                    else
                                    {
                                        if($last==$superlok)
                                        {

                                        }
                                        else if($last!=$superlok){
                                            */?><option><?php /*echo $superlok; */?></option><?php
/*                                        }
                                    }
                                    $last = $superlok;
                                    $i++;
                                    */?>
                                <?php
/*                                endforeach;
                                */?>
                            </select>
                            <select id="employer-kota-2" name="employer-kota-2">
                                <option>---</option>
                            </select>
                        </td>
                    </tr>-->
                    <tr>
                        <td>Industri</td>
                        <td>
                            <select id="employer-industri" name="employer-industri">
                                <option>---</option>
                                <?php
                                foreach($industri as $ind):
                                    ?>
                                    <option><?php echo $ind->kategori; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pilih Paket</td>
                        <td>
                            <select id="employer-paket" name="employer-paket">
                                <option>---</option>
                                <option>Paket Lowongan</option>
                                <option>Paket Search</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>
                            <input type="text" id="employer-telepon" name="employer-telepon" placeholder="Input Nomor Telepon" value="<?php echo $emp->no_telepon; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Tipe</td>
                        <td>
                            <select id="employer-tipe" name="employer-tipe">
                                <option>---</option>
                                <option value="real">Employer Nyata</option>
                                <option value="fake">Employer Palsu / Temporer</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type="button" id="employer-logo-ok" name="employer-logo-ok" value="Ubah File Logo?" />
                            <input type="file" id="employer-logo" name="employer-logo" disabled/>
                            <br/>
                            <img src="<?php echo base_url().$emp->logo; ?>" width="150px"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><input type="submit" value="Simpan Employer"/></td>
                    </tr>
                </table>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#employer-pass-ok').click(function(){
                            $('#employer-password').prop('disabled',false);
                            $(this).remove();
                        });
                        $('#employer-logo-ok').click(function(){
                            $('#employer-logo').prop('disabled',false);
                            $(this).remove();
                        });
                    });
                    $('#employer-industri').val('<?php echo $emp->industri; ?>');
                    $('#employer-paket').val('<?php echo $emp->jenis_paket; ?>');
                    $('#employer-tipe').val('<?php echo $emp->tipe; ?>');
                </script>
                <?php
                    }
                endforeach;
                ?>
            </form>
        </div>
        <br style="clear: both;"/>
    </div>
</div>
</body>
</html>