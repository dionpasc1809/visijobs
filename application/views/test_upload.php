<html>

<head>
    <title></title>
</head>

<body>
<form action="<?php echo base_url(); ?>test/testupload" method="post" enctype="multipart/form-data">
    <h1>Upload File</h1>
    File : <input type="file" name="testfile"/><br/>
    Directory : <input type="text" name="directory"/>
    <input type="submit" value="Upload Now"/>
</form>
</body>

</html>