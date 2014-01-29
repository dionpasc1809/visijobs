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
            var x=document.forms["jobseeker-form"];
            $('.form-error-msg').remove();
            var error_count = 0;
            var re_nama = /^[a-zA-Z\s]*[a-zA-Z]+[a-zA-Z]*$/;
            var re_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var re_telepon = /^\d+$/;
            if(x['jobseeker-nama'].value==null || x['jobseeker-nama'].value=="")
            {
                $('#jobseeker-nama').after("<div class='form-error-msg'>Nama Harus Diisi</div>");
                error_count++;
            }
            else if(re_nama.test(x['jobseeker-nama'].value)===false)
            {
                $('#jobseeker-nama').after("<div class='form-error-msg'>Nama tidak sesuai aturan</div>");
                error_count++;
            }
            if(x['jobseeker-email'].value==null || x['jobseeker-email'].value=="")
            {
                $('#jobseeker-email').after("<div class='form-error-msg'>Email Harus Diisi</div>");
                error_count++;
            }
            else if(re_email.test(x['jobseeker-email'].value)===false)
            {
                $('#jobseeker-email').after("<div class='form-error-msg'>Email tidak sesuai aturan</div>");
                error_count++;
            }
            if(x['jobseeker-password'].value==null || x['jobseeker-password'].value=="")
            {
                $('#jobseeker-password').after("<div class='form-error-msg'>Password Harus Diisi</div>");
                error_count++;
            }
            if(x['jobseeker-tgllahir'].value==null || x['jobseeker-tgllahir'].value=="")
            {
                $('#jobseeker-tgllahir').after("<div class='form-error-msg'>Tanggal Lahir Harus Diisi</div>");
                error_count++;
            }
            if(x['jobseeker-telepon'].value==null || x['jobseeker-telepon'].value=="")
            {
                $('#jobseeker-telepon').after("<div class='form-error-msg'>No Telepon Harus Diisi</div>");
                error_count++;
            }
            else if(re_telepon.test(x['jobseeker-telepon'].value)===false)
            {
                $('#jobseeker-telepon').after("<div class='form-error-msg'>Telepon Harus berupa angka</div>");
                error_count++;
            }
            if(x['jobseeker-minat'].value==null || x['jobseeker-minat'].value=="")
            {
                $('#jobseeker-minat').after("<div class='form-error-msg'>Minat Kerja harus diisi</div>");
                error_count++;
            }
            if(x['jobseeker-pengalaman'].value==null || x['jobseeker-pengalaman'].value=="")
            {
                $('#jobseeker-pengalaman').after("<div class='form-error-msg'>Pengalaman harus diisi</div>");
                error_count++;
            }
            else if(re_telepon.test(x['jobseeker-pengalaman'].value)===false)
            {
                $('#jobseeker-pengalaman').after("<div class='form-error-msg'>Harus berupa angka</div>");
                error_count++;
            }
            if(x['jobseeker-gaji'].value==null || x['jobseeker-gaji'].value=="")
            {
                $('#jobseeker-gaji').after("<div class='form-error-msg'>Gaji harus diisi</div>");
                error_count++;
            }
            else if(re_telepon.test(x['jobseeker-gaji'].value)===false)
            {
                $('#jobseeker-gaji').after("<div class='form-error-msg'>Gaji harus berupa angka</div>");
                error_count++;
            }
            if(x['jobseeker-alamat'].value==null || x['jobseeker-alamat'].value=="")
            {
                $('#jobseeker-alamat').after("<div class='form-error-msg'>Alamat harus diisi</div>");
                error_count++;
            }
            if(x['jobseeker-agama'].value==null || x['jobseeker-agama'].value=="---")
            {
                $('#jobseeker-agama').after("<div class='form-error-msg'>Agama harus diisi</div>");
                error_count++;
            }
            if(x['jobseeker-kota-1'].value=="---")
            {
                $('#jobseeker-kota-2').after("<div class='form-error-msg'>Kota harus diisi</div>");
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
        /*$('.jobseeker-insert, .jobseeker-delete, .jobseeker-edit').hover(
            function(){
                $(this).find('.jobseeker-button-message').show(200);
            },function(){
                $(this).find('.jobseeker-button-message').hide(200);
            });*/
        $('#jobseeker-kota-1').change(function(){
            $.post("<?php echo base_url(); ?>admin/getSubLokasi", { super:$(this).val() } ).done(function (sub) {
                // update the textarea with the time
                $("#jobseeker-kota-2").html(sub);
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
            <form name="jobseeker-form" onsubmit="return validateForm()" action="<?php echo base_url(); ?>admin/insertJs" method="post">
                <h1 style="text-align: center;">Insert Jobseeker Baru</h1>
                <hr/>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" id="jobseeker-nama" name="jobseeker-nama" placeholder="input nama"/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" id="jobseeker-email" name="jobseeker-email" placeholder="input email"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" id="jobseeker-password" name="jobseeker-password"/></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="jobseeker-gender" value="pria" checked/>Pria
                            <input type="radio" name="jobseeker-gender" id="jobseeker-gender" value="wanita"/>Wanita
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" id="jobseeker-tgllahir" name="jobseeker-tgllahir" placeholder="input tanggal lahir"/></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td><input type="text" id="jobseeker-telepon" name="jobseeker-telepon" placeholder="input telepon"/></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td>
                            <select id="jobseeker-pendidikan" name="jobseeker-pendidikan">
                                <option>S3</option>
                                <option>S2</option>
                                <option>S1</option>
                                <option>D3</option>
                                <option>SMA</option>
                                <option>SMP</option>
                                <option>SD</option>
                                <option>Lain-Lain</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Minat Kerja</td>
                        <td>
                            <textarea cols="20" rows="5" id="jobseeker-minat" name="jobseeker-minat"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Lama Pengalaman</td>
                        <td><input type="text" id="jobseeker-pengalaman" name="jobseeker-pengalaman" placeholder="input lama pengalaman kerja"/></td>
                    </tr>
                    <tr>
                        <td>Gaji</td>
                        <td><input type="text" id="jobseeker-gaji" name="jobseeker-gaji" placeholder="input gaji yang diinginkan"/> </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <textarea cols="20" rows="5" id="jobseeker-alamat" name="jobseeker-alamat"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td>
                            <select id="jobseeker-kota-1" name="jobseeker-kota-1">
                                <option>---</option>
                                <?php
                                $i=0;
                                foreach($lokasi as $lok):
                                    $superlok = $lok->kategori;

                                    if($i==0)
                                    {
                                        ?><option><?php echo $superlok; ?></option><?php
                                    }
                                    else
                                    {
                                        if($last==$superlok)
                                        {

                                        }
                                        else if($last!=$superlok){
                                            ?><option><?php echo $superlok; ?></option><?php
                                        }
                                    }
                                    $last = $superlok;
                                    $i++;
                                ?>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <select id="jobseeker-kota-2" name="jobseeker-kota-2">
                                <option>---</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
                            <select id="jobseeker-agama" name="jobseeker-agama">
                                <option>---</option>
                                <option>Budha</option>
                                <option>Hindhu</option>
                                <option>Islam</option>
                                <option>Katolik</option>
                                <option>Kristen</option>
                                <option>Konghucu</option>
                                <option>Lain-Lain</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;"><input type="submit" value="Simpan Jobseeker"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <br style="clear: both;"/>
    </div>
</div>
</body>
</html>