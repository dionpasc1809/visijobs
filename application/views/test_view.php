<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/first.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/first.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
    <script>
        $(window).load(function(){
            $('#test-1').css('display','block');
            $('.slider').click(function(){
                var valueslider = $(this).val();
                $('.test').each(function(){
                    var display = this.style.display;
                    if(display=="block")
                    {
                        this.style.display='none';
                    }
                });
                $('#test-'+valueslider).fadeIn(1000);
            });
        });

    </script>
</head>

<h1>Page Test pertama</h1>


<div class="test-slider">
    <div class="test" id="test-1">
        1
        <div class="slide1"></div>
        <div class="slide2"></div>
        <div class="slide3"></div>
        <div class="slide4"></div>
        <div class="slide5"></div>
        <div class="slide6"></div>
    </div>
    <div class="test" id="test-2">
        2
        <div class="slide1"></div>
        <div class="slide2"></div>
        <div class="slide3"></div>
        <div class="slide4"></div>
        <div class="slide5"></div>
        <div class="slide6"></div>
    </div>
    <div class="test" id="test-3">
        3
        <div class="slide1"></div>
        <div class="slide2"></div>
        <div class="slide3"></div>
        <div class="slide4"></div>
        <div class="slide5"></div>
        <div class="slide6"></div>
    </div>
    <div class="test" id="test-4">
        4
        <div class="slide1"></div>
        <div class="slide2"></div>
        <div class="slide3"></div>
        <div class="slide4"></div>
        <div class="slide5"></div>
        <div class="slide6"></div>
    </div>
</div>
<input type="button" class="slider" value="1"/>
<input type="button" class="slider" value="2"/>
<input type="button" class="slider" value="3"/>
<input type="button" class="slider" value="4"/>
</body>
</html>