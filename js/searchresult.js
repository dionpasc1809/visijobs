// JavaScript Document

$(window).load(function()	{
		/*$('div.s-l-rc-kriteria').fadeIn(500);
		$('.s-l-rc-moreorless').next().html("show less&nbsp;&nbsp;&nbsp;");
		$('.s-l-rc-moreorless').css({
			"-webkit-transform": "rotate(180deg)", 
			"-moz-transform": "rotate(180deg)", 
			"-o-transform": "rotate(180deg)",
			"-ms-transform": "rotate(180deg)"
		});*/
	$('.s-l-rc-moreorless').click(function()	{
		if($(this).parent().find('div.s-l-rc-kriteria').css('display')=="block")	{
			$(this).parent().find('div.s-l-rc-kriteria').fadeOut(500);
			$(this).next().html("show more&nbsp;&nbsp;&nbsp;");
			$(this).css({
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
		}
		else if($(this).parent().find('div.s-l-rc-kriteria').css('display')=="none")	{
			$(this).parent().find('div.s-l-rc-kriteria').fadeIn(500);
			$(this).next().html("show less&nbsp;&nbsp;&nbsp;");
			$(this).css({
				"-webkit-transform": "rotate(180deg)", 
				"-moz-transform": "rotate(180deg)", 
				"-o-transform": "rotate(180deg)",
				"-ms-transform": "rotate(180deg)"
			});
		}
	});
	$(".span-moreorless").click(function()	{
		$(this).prev().click();
	});
	
	$(".search-list-results").click(function()	{
		$(".search-list-results").removeClass('search-list-results-picked');
		$(".search-list--punchhole").removeClass("search-list--punchhole-picked");
		$(this).addClass('search-list-results-picked');
		$(this).find(".search-list--punchhole").addClass("search-list--punchhole-picked");
	});
	
	/*var pll_lokasi_toggle = "buka";
	$('input[name="pll_lokasi"]').click(function(){
		if(pll_lokasi_toggle=="buka")
		{
			$(this).next().css({
				"transform":"rotate(-360deg)",
				"-webkit-transform": "rotate(-360deg)", 
				"-moz-transform": "rotate(-360deg)", 
				"-o-transform": "rotate(-360deg)",
				"-ms-transform": "rotate(-360deg)"
			});
			pll_lokasi_toggle="tutup";
		}
		else if(pll_lokasi_toggle=="tutup")
		{
			$(this).next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			pll_lokasi_toggle="buka";
		}
		if($('div[id="pll_popup_loc"]').css('display')=="block")
		{
			$('input[name="pll_kategori"]').next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			pll_kategori_toggle="buka";
		}
	});*/
	
	//var pll_kategori_toggle = "buka";
	/*$('input[name="pll_kategori"]').click(function(){
		if(pll_kategori_toggle=="buka")
		{
			$(this).next().css({
				"transform":"rotate(-360deg)",
				"-webkit-transform": "rotate(-360deg)", 
				"-moz-transform": "rotate(-360deg)", 
				"-o-transform": "rotate(-360deg)",
				"-ms-transform": "rotate(-360deg)"
			});
			pll_kategori_toggle="tutup";
		}
		else if(pll_kategori_toggle=="tutup")
		{
			$(this).next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			pll_kategori_toggle="buka";
		}
		if($('div[id="pll_popup_cat"]').css('display')=="block")
		{
			$('input[name="pll_lokasi"]').next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			pll_lokasi_toggle="buka";
		}
	});
	
	$('.s-l-p-pagenum-top, .s-l-p-pagenum-btm').click(function(){
		var page_value = $(this).html();
	});*/
	
	/*$(document).keyup(function(e) {
		if (e.keyCode == 27) { 
			$('input[name="pll_lokasi"]').next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			$('input[name="pll_kategori"]').next().css({
				"transform":"rotate(0deg)",
				"-webkit-transform": "rotate(0deg)", 
				"-moz-transform": "rotate(0deg)", 
				"-o-transform": "rotate(0deg)",
				"-ms-transform": "rotate(0deg)"
			});
			pll_lokasi_toggle="buka";
			pll_kategori_toggle="buka";
		}   // esc
	});*/
	
	$('.loc-sub-list input[type="checkbox"]:first-child').click(function()	{
		$(this).parent().find('input[type="checkbox"]').each(function()	{
			$(this).prop('disabled',true);
		});
		$(this).prop('disabled',false);
	});
	
	$('.cat-sub-list input[type="checkbox"]:first-child').click(function()	{
		$(this).parent().find('input[type="checkbox"]').each(function()	{
			$(this).prop('disabled',true);
		});
		$(this).prop('disabled',false);
	});
	
	initSub();
});

/* $(document).keyup(function(e) {
	  if (e.keyCode == 27) { 
		  $('input[name="pll_lokasi"]').next().css({
			  "transform":"rotate(0deg)",
			  "-webkit-transform": "rotate(0deg)", 
			  "-moz-transform": "rotate(0deg)", 
			  "-o-transform": "rotate(0deg)",
			  "-ms-transform": "rotate(0deg)"
		  });
		  $('input[name="pll_kategori"]').next().css({
			  "transform":"rotate(0deg)",
			  "-webkit-transform": "rotate(0deg)", 
			  "-moz-transform": "rotate(0deg)", 
			  "-o-transform": "rotate(0deg)",
			  "-ms-transform": "rotate(0deg)"
		  });
		  pll_lokasi_toggle="buka";
		  pll_kategori_toggle="buka";
	  }   // esc
	}); */

function showJob(idjob)	{
    if($('.search-result[id="'+idjob+'"]').css("display")=="none"){
        $('.search-result').fadeOut(100);
        $('.search-result-premiumemployers').fadeOut(100);
        $('.search-result[id="'+idjob+'"]').fadeIn(1000);
        $('.search-result-premiumemployers').fadeIn(1000);
    }
}


function showSub(type,id)
{
	var popsub = document.getElementsByName(type);
	var popsublength = popsub.length;
	for(var i=0; i<popsublength; i++)
	{
		popsub.item(i).style.display="none";
	}
	document.getElementById("popup_"+type+"-"+id).style.display="block";
}
function initSub()
{
	var popsubloc = document.getElementsByName("ppl_loc-sub");
	var popsubloclength = popsubloc.length;
	for(var i=0; i<popsubloclength; i++)
	{
		popsubloc.item(i).style.display="none";
	}
	
	var popsubcat = document.getElementsByName("ppl_cat-sub");
	var popsubcatlength = popsubcat.length;
	for(var j=0; j<popsubcatlength; j++)
	{
		popsubcat.item(j).style.display="none";
	}
}