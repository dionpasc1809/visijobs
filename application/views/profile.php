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
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/home.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#popup_login-signupbtn').click(function(){
                var username = $('#txt_login_id').val();
                var password = $('#txt_login_pass').val();
                var login = $('#chk_login_remember').is(':checked');
                $.post("<?php echo base_url(); ?>login",{username:username, password:password, login:login})
                    .done(function(data){
                        alert(data);
                        location.reload();
                    });
            });
        });
    </script>
</head>

<body>
<?php /*include 'home/cover.php';*/ ?>
<div id="container" style="z-index:10;">
    <?php include 'home/header.php'; ?>

    <div class="logo">
        <div style="width:1200px; position:relative; margin:0 auto; height:120px;">
            <div id="thumb-logo"></div>
        </div>
    </div>
    <?php include 'home/searchmenu.php'; ?>

    <?php include 'home/category.php'; ?>

    <?php include 'profile/viewprofile.php'; ?>

    <?php include 'home/footer.php'; ?>
</div>
</body>
</html>
