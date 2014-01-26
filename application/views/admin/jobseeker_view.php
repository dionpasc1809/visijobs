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
        }
        .jobseeker-view-table   {
            min-width: 1500px;
        }
        .jobseeker-view-table table tr td   {
            color: #181818;
            border: 1px solid rgba(0,0,0,0.7);
            min-width: 100px;
            padding: 5px;
        }
        .jobseeker-view-table table tr:first-child td   {
            font-weight: bold;
            text-align: center;
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
        }

        //end live clock
        $(document).ready(function()    {

        });
    </script>
</head>
<body>
<div class="admin-container">
    <div class="admin-header">
        <img src="<?php echo base_url(); ?>images/admin/visijobs-logo-admin.png" id="logo-img"/>
        <div class="header-right-nav">
            Welcome, <b><?php echo $this->session->userdata('username'); ?></b> | <a href="">Logout</a>
        </div>
        <div class="header-top-right-nav" id="clock">

        </div>
    </div>
    <div class="admin-content">
        <div class="admin-menu-nav">
            <?php include("index_nav.php"); ?>
            <br style="clear: both;"/>
        </div>
        <div class="admin-inner-content inner-content-bg" id="admin-inner-content">
            <div class="jobseeker-view-table">
                <table>
                    <tr>
                        <td>ID jobseeker</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Tanggal Lahir</td>
                        <td>No Telepon</td>
                        <td>Pendidikan Terakhir</td>
                        <td>Minat Kerja</td>
                        <td>Lama Pengalaman</td>
                        <td>Gaji</td>
                        <td>Alamat</td>
                        <td>Kota</td>
                        <td>Agama</td>
                        <td>Status Profil</td>
                        <td>Status Exp & Edu</td>
                        <td>Status CV</td>
                        <td>Status Jobalert</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ID jobseeker</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Tanggal Lahir</td>
                        <td>No Telepon</td>
                        <td>Pendidikan Terakhir</td>
                        <td>Minat Kerja</td>
                        <td>Lama Pengalaman</td>
                        <td>Gaji</td>
                        <td>Alamat</td>
                        <td>Kota</td>
                        <td>Agama</td>
                        <td>Status Profil</td>
                        <td>Status Exp & Edu</td>
                        <td>Status CV</td>
                        <td>Status Jobalert</td>
                        <td></td>
                    </tr>
                </table>
                <br style="clear: both;"/>
            </div>
        </div>
        <br style="clear: both;"/>
    </div>
</div>
</body>
</html>