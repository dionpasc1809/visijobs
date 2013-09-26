<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST</title>
</head>

<body>
<input type="checkbox" value="abc" name="input" onchange="getchkvalue()"/>
<input type="checkbox" value="def" name="input" onchange="getchkvalue()"/>
<input type="checkbox" value="haha" name="input" onchange="getchkvalue()"/>

<form method="get" class="abc">
	<input type="hidden" name="inputan" />
    <input type="submit" value="TEST"/>
</form>
<?php if(isset($inputan)): 
	echo "<pre>";
	print_r($inputan);
	echo "</pre>";
endif; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	function getchkvalue(){
		var chk = document.getElementsByName('input');
		var chklen = chk.length;
		var arrdata = new Array();
		for(i=0;i<chklen;i++)
		{
			if(chk.item(i).checked==true)
			{
				arrdata.push(chk.item(i).value);
			}
		}
		var result = arrdata.join(',');
		document.getElementsByName('inputan').item(0).value=result;
		//alert(document.getElementsByName('inputan').item(0).value);
	}
	var testsubstr= "aahhahahahahahahaha*censored";
	var bintang = '*';
	var re = /censored$/;
	alert(testsubstr.replace(re, ""));
</script>
<br /><br />

<?php 
	date_default_timezone_set('Asia/Jakarta');
	$dateskrg = time();
	$datecompare = strtotime("4-9-2013");
	echo date('d-m-Y H:i',$dateskrg)." :: ".date('d-m-Y H:i',$datecompare);

?>

</body>
</html>