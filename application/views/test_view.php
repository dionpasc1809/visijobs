<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/first.js"></script>
</head>

<h1>Page Test pertama</h1>
	<div id="first" onclick="alertTest()">
	Div Pertama
	</div>
	<pre>
		<?php 
			foreach($emp as $e):
			echo $e->id_employer;
			echo "<br/>";
			endforeach;
		?>
	</pre>
</body>
</html>