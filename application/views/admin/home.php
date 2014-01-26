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
        .admin-container    {
            width:1200px;
            left: 0;
            right:0;
            margin:0 auto;
            background-color: rgba(0,0,0,0.2);
        }
        .admin-header   {
            background-color: rgba(0,41,102,0.8);
            width: 100%;
            height: 100px;
            color: #FFFFFF;
            position: relative;
        }
        .header-title   {
            margin-left: 10px;
            font-size: 74px;
            font-weight: bold;
        }
        .admin-content  {
            width: 100%;
            height: 100%;
            background-color: rgba(0,63,129,0.5);
            position: relative;
        }
        .admin-login-form   {
            position: relative;
            width:300px;
            left:0;
            right:0;
            margin:0 auto;
            padding-top: 100px;
        }
    </style>
</head>
<body>
<div class="admin-container">
    <div class="admin-header">
        <div class="header-title">Admin</div>
    </div>
    <div class="admin-content">
        <div class="admin-login-form">
            <form action="<?php echo base_url(); ?>admin/login" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" value="Login"/></td>
                    </tr>
                    <?php
                    if($this->session->userdata('error'))
                    {
                        $error = $this->session->userdata('error');
                        if($error == 'error_0')
                        {
                            ?>
                            <tr>
                                <td colspan="2">
                                    Username atau Password tidak cocok!!
                                </td>
                            </tr>
                        <?php
                        }
                        $this->session->unset_userdata('error');
                    }
                    ?>
                </table>



            </form>
        </div>
    </div>
</div>
</body>
</html>