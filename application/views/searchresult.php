<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visijobs.com -- Datfarkan Diri Anda Sekarang</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style-header.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/style-logo.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/style-searchmenu.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/style-category.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/style-searchresult.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/style-footer.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/fonts.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/home.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/searchresult.js"></script>
	<script type="text/javascript">
		function goPage(page){
			var current_url = document.URL;
			var get_url = "";
			if(current_url.indexOf('page')!=-1)
			{
				get_url=current_url.replace(/&page=[0-9]{1,}/,"&page="+page);
			}
			else
			{
				get_url=current_url+"&page="+page;
			}
			window.open(get_url,"_self");
		}
		function goPageNum(page, currentpage){
			if(page==currentpage)
			{
				return false;
			}
			else
			{
				var current_url = document.URL;
				var get_url = "";
				if(current_url.indexOf('page')!=-1)
				{
					get_url=current_url.replace(/&page=[0-9]{1,}/,"&page="+page);
				}
				else
				{
					get_url=current_url+"&page="+page;
				}
				window.open(get_url,"_self");
			}
		}
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
    
    <?php include 'searchresult/content.php'; ?>
    
    <?php include 'home/footer.php'; ?> 
</div>
</body>
</html>