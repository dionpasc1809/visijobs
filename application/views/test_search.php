<html>
<head>
    <title>TEST SEARCH</title>
</head>
<body>
    <form action="<?php echo base_url(); ?>test/searchjs" method="post">

    Keyword<input type="text" id="keyword" name="keyword" /><br/>
        <input type="checkbox" id="by_minat" name="by_minat" value="minat_kerja" />Minat
        <input type="checkbox" id="by_pendidikan" name="by_pendidikan" value="pendidikan_terakhir" />Pendidikan
        <input type="checkbox" id="by_pengalaman" name="by_pengalaman" value="lama_pengalaman" />Lama Pengalaman
        <input type="checkbox" id="by_kota" name="by_kota" value="kota" />Kota<br/>
    <input type="submit" value="Cari Jobseeker" />

    </form>
</body>
</html>