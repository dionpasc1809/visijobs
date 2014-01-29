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
            margin-top: 50px;
            min-width: 1500px;
        }
        .jobseeker-view-table table tr td   {
            color: #181818;
            border: 1px solid rgba(0,0,0,0.7);
            min-width: 100px;
            padding: 5px;
            background-color: rgba(0,0,0,0.2);
        }
        .jobseeker-view-table table tr:first-child td   {
            font-weight: bold;
            text-align: center;
            background: none;
        }
        .jobseeker-edit {
            width:20px;
            height:20px;
            line-height: 50px;
            background: url("<?php echo base_url(); ?>css/admin/edit-button.png");
            float: left;
            margin-right: 10px;
            cursor: hand;
            cursor: pointer;
            position: relative;
        }
        .jobseeker-insert {
            width:20px;
            height:20px;
            line-height: 50px;
            background: url("<?php echo base_url(); ?>css/admin/insert-button.png");
            float: left;
            margin-right: 10px;
            margin-left: 10px;
            cursor: hand;
            cursor: pointer;
            position: relative;
        }
        .jobseeker-delete {
            width:20px;
            height:20px;
            line-height: 50px;
            background: url("<?php echo base_url(); ?>css/admin/delete-button.png");
            float: left;
            margin-right: 10px;
            cursor: hand;
            cursor: pointer;
            position: relative;
        }
        .jobseeker-button-message   {
            min-width: 200px;
            height: 14px;
            background-color: rgba(255,255,255,0.5);
            color: #001d44;
            padding: 5px;
            position: absolute;
            left: 0;
            top: 100%;
            font-size: 14px;
            line-height: 14px;
            z-index: 10;
        }
        .jobseeker-table-scrollable {
            position: absolute;
            color: rgba(0,29,68,0.5);
            font-size: 24px;
            background-color: rgba(255,255,255,0.5);
            padding: 5px;
            cursor: hand;
            cursor: pointer;
        }
        .left    {
            top:10px;
            right:0;
        }
        .right    {
            top:10px;
            left:300px;
        }
        .jobseeker-view-search  {
            color: rgba(0,29,68,1);
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

        //function delete
        function deleteJS(i)
        {
            var r = confirm("Yakin anda mau delete ??");
            if (r == true)
            {
                window.open('<?php echo base_url() ?>admin/jobseeker/delete/'+i,'_self');
            }
            else
            {

            }
        }
        //delete end

        $(document).ready(function()    {
            $('.jobseeker-insert, .jobseeker-delete, .jobseeker-edit').hover(
                function(){
                    $(this).find('.jobseeker-button-message').show(200);
                },function(){
                    $(this).find('.jobseeker-button-message').hide(200);
                });
            //scrolling table
            $('.right').hide();
            $('#admin-inner-content').bind('scroll',function(){
                if($(this).scrollLeft()+$(this).innerWidth() >= $(this)[0].scrollWidth)
                {
                    $('.left').hide();
                }
                else if($(this).scrollLeft()+$(this).innerWidth() < $(this)[0].scrollWidth)
                {
                    $('.left').show();
                }
                if($(this).scrollLeft() > 0)
                {
                    $('.right').show();
                }
                else if($(this).scrollLeft() == 0)
                {
                    $('.right').hide();
                }
            });

            $('.left').click(function(){
                var width_con = $('#admin-inner-content')[0].scrollWidth;
                var width_scroll = $('#admin-inner-content').scrollLeft();
                var scroll_int = width_scroll+600;
                if(scroll_int>width_con)
                {
                    scroll_int = width_scroll+(width_con-width_scroll);
                }
                $('#admin-inner-content').animate({scrollLeft: scroll_int}, 200);
            });
            $('.right').click(function(){
                var width_con = $('#admin-inner-content')[0].scrollWidth;
                var width_scroll = $('#admin-inner-content').scrollLeft();
                var scroll_int = width_scroll-600;
                if(scroll_int<0)
                {
                    scroll_int = 0;
                }
                $('#admin-inner-content').animate({scrollLeft: scroll_int}, 200);
            });
            //end of scrolling table
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
            <div class="jobseeker-view-table">
                <div class="jobseeker-table-scrollable left"> > </div>
                <div class="jobseeker-table-scrollable right"> < </div>
                <div class="jobseeker-view-search">
                    <form action="<?php echo base_url(); ?>admin/searchJS" method="get">
                        Pencarian Jobseeker : <input type="text" id="jobseeker-search" name="jobseeker-search"/>
                        <select id="jobseeker-search-category" name="jobseeker-search-category">
                            <option value="id_jobseeker">ID Jobseeker</option>
                            <option value="nama">Nama</option>
                            <option value="email">Email</option>
                            <option value="no_telepon">No Telepon</option>
                            <option value="alamat">Alamat</option>
                        </select>
                        <input type="submit" value="Cari" />
                        <a href="<?php echo base_url(); ?>admin/jobseeker/view" >Reset</a>
                    </form>
                </div>
                <table>
                    <tr>
                        <td>Option</td>
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
                    </tr>
                    <?php
                    foreach($jobseeker as $js):
                        $id = $js->id_jobseeker;
                        ?>
                        <tr>
                            <td>
                                <div class="jobseeker-insert" onclick="window.open('<?php echo base_url(); ?>admin/jobseeker/insert','_self');">
                                    <div class="jobseeker-button-message" style="display: none;">Insert atau tambah data</div>
                                </div>
                                <div class="jobseeker-edit" onclick="window.open('<?php echo base_url(); ?>admin/jobseeker/edit/<?php echo $id; ?>','_self');">
                                    <div class="jobseeker-button-message" style="display: none;">Edit data jobseeker</div>
                                </div>
                                <div class="jobseeker-delete" onclick="deleteJS('<?php echo $id; ?>')">
                                    <div class="jobseeker-button-message" style="display: none;">Hapus data jobseeker</div>
                                </div>
                            </td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $js->nama; ?></td>
                            <td><?php echo $js->email; ?></td>
                            <td><?php echo $js->gender; ?></td>
                            <td><?php echo $js->tanggal_lahir; ?></td>
                            <td><?php echo $js->no_telepon; ?></td>
                            <td><?php echo $js->pendidikan_terakhir; ?></td>
                            <td><?php echo $js->minat_kerja; ?></td>
                            <td><?php echo $js->lama_pengalaman; ?></td>
                            <td><?php echo $js->gaji; ?></td>
                            <td><?php echo $js->alamat; ?></td>
                            <td><?php echo $js->kota; ?></td>
                            <td><?php echo $js->agama; ?></td>
                            <td><?php echo $js->status_profil; ?></td>
                            <td><?php echo $js->status_expnedu; ?></td>
                            <td><?php echo $js->status_cv; ?></td>
                            <td><?php echo $js->status_jobalert; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
                <br style="clear: both;"/>
            </div>
        </div>
        <br style="clear: both;"/>
    </div>
</div>
</body>
</html>