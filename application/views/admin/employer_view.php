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
    .employer-view-table   {
        margin-top: 50px;
        min-width: 1500px;
    }
    .employer-view-table table tr td   {
        color: #181818;
        border: 1px solid rgba(0,0,0,0.7);
        min-width: 100px;
        padding: 5px;
        background-color: rgba(0,0,0,0.2);
    }
    .employer-view-table table tr:first-child td   {
        font-weight: bold;
        text-align: center;
        background: none;
    }
    .employer-edit {
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
    .employer-insert {
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
    .employer-delete {
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
    .employer-button-message   {
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
    .employer-table-scrollable {
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
    .employer-view-search  {
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
    function deleteEMP(i)
    {
        var r = confirm("Yakin anda mau delete ??");
        if (r == true)
        {
            window.open('<?php echo base_url() ?>admin/employer/delete/'+i,'_self');
        }
        else
        {

        }
    }
    //delete end

    $(document).ready(function()    {
        $('.employer-insert, .employer-delete, .employer-edit').hover(
            function(){
                $(this).find('.employer-button-message').show(200);
            },function(){
                $(this).find('.employer-button-message').hide(200);
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
            <div class="employer-view-table">
                <div class="employer-table-scrollable left"> > </div>
                <div class="employer-table-scrollable right"> < </div>
                <div class="employer-view-search">
                    <form action="<?php echo base_url(); ?>admin/searchEMP" method="get">
                        Pencarian Employer : <input type="text" id="employer-search" name="employer-search"/>
                        <select id="employer-search-category" name="employer-search-category">
                            <option value="id_employer">ID Employer</option>
                            <option value="nama_perusahaan">Nama Perusahaan</option>
                            <option value="email_perusahaan">Email Perusahaan</option>
                            <option value="alamat">Alamat</option>
                        </select>
                        <input type="submit" value="Cari" />
                        <a href="<?php echo base_url(); ?>admin/employer/view" >Reset</a>
                    </form>
                </div>
                <table>
                    <tr>
                        <td>Option</td>
                        <td>ID Employer</td>
                        <td>Logo</td>
                        <td>Nama Perusahaan</td>
                        <td>Email Perusahaan</td>
                        <td>NPWP</td>
                        <td>Alamat</td>
                        <td>Industri</td>
                        <td>Jenis Paket</td>
                        <td>No Telepon</td>
                        <td>Tipe</td>
                    </tr>
                    <?php
                    foreach($employer as $emp):
                        $id = $emp->id_employer;
                        $logo = $emp->logo;
                        ?>
                        <tr>
                            <td>
                                <div class="employer-insert" onclick="window.open('<?php echo base_url(); ?>admin/employer/insert','_self');">
                                    <div class="employer-button-message" style="display: none;">Insert atau tambah data</div>
                                </div>
                                <div class="employer-edit" onclick="window.open('<?php echo base_url(); ?>admin/employer/edit/<?php echo $id; ?>','_self');">
                                    <div class="employer-button-message" style="display: none;">Edit data employer</div>
                                </div>
                                <div class="employer-delete" onclick="deleteEMP('<?php echo $id; ?>')">
                                    <div class="employer-button-message" style="display: none;">Hapus data employer</div>
                                </div>
                            </td>
                            <td><?php echo $id; ?></td>
                            <td><img src="<?php
                                if($logo!="")
                                {
                                    echo base_url().$logo;
                                }?>" width="100px"/> </td>
                            <td><?php echo $emp->nama_perusahaan; ?></td>
                            <td><?php echo $emp->email_perusahaan; ?></td>
                            <td><?php echo $emp->NPWP; ?></td>
                            <td><?php echo $emp->alamat; ?></td>
                            <td><?php echo $emp->industri; ?></td>
                            <td><?php echo $emp->jenis_paket; ?></td>
                            <td><?php echo $emp->no_telepon; ?></td>
                            <td><?php echo $emp->tipe; ?></td>
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