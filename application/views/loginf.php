<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="refresh" content="3;url=<?php echo $url; ?>">
<html>
<head>
    <title>Visijobs.com | Login Failed</title>
    <style>
        body{
            background-color: #262b33;
        }
        #loginf {
            background-color: #FFFFFF;
            width:100%;
            height:80px;
            margin-top: 100px;
            font-family: Calibri;
            font-color:#003173;
            padding-top: 5px;
            border:none;
            border-top:2px solid #262b33;
            border-bottom:2px solid #262b33;
            box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.5);
            -webkit-box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.5);
            -moz-box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.5);
            -ms-box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.5);
            -o-box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.5);
        }
        #loginf-head    {
            width:100%;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        #loginf-1    {
            width:100%;
            text-align: center;
            font-size: 14px;
        }
        #loginf-2    {
            width:100%;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="loginf">
        <div id="loginf-head">Login Gagal</div>
        <div id="loginf-1">Cek Kembali Email / Password anda dan login kembali</div>
        <div id="loginf-2">Tunggu 3 detik untuk redirect... atau <a href="<?php echo $url; ?>">klik disini</a></div>
    </div>
</body>
</html>