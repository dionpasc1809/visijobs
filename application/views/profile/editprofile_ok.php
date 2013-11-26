<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Visijobs.com</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-header.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-logo.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-searchmenu.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-category.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-content.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style-footer.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/fonts.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>css/style-profile.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/home.js"></script>
    <style>
        .editprofile_success    {
            width: 400px;
            height: 300px;
            margin: 0 auto;
            left: 0;
            right: 0;
            margin-top: 50px;
            padding: 10px;
            font-family: Calibri;
            color: #001d44;
            font-size: 16px;
            border: 1px solid rgba(0,0,0,0.2);
        }
        .editprofile-s-title{
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php /*include 'home/cover.php';*/ ?>
<div id="container" style="z-index:10;">
    <div class="editprofile_success">
        <div class="editprofile-s-title">Data telah tersimpan</div>
        <hr/>
        Klik <b><a href="<?php echo $referer; ?>">disini</a></b> untuk balik ke page sebelumnya atau tunggu 3 detik untuk redirect
    </div>
    <script>
        var URL = "<?php echo $referer; ?>";
        var delay = 3000;
        setTimeout(function(){ window.location = URL; }, delay);
    </script>
</div>
</body>
</html>
