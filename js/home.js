// JavaScript Document
$(window).ready(function()	{
	var popupqty = document.getElementsByName("popup");
	for(var i=0;i<popupqty.length;i++)
	{
		popupqty.item(i).style.display="none";
	}
	initCatSub();
	initLocSub();
	switchKategori("kategori");
	
	$('input[name|="cat-sub"], input[name|="loc-sub"]').on("click",function()	{
		if($(this).is(':checked')){
			$('input[name="'+$(this).prop('name')+'"][value="'+$(this).val()+'"]').prop('checked',true);
			$('input[name="'+$(this).prop('name')+'"][value="'+$(this).val()+'"]').next().css("font-weight","bold");
		}
		else{
			$('input[name="'+$(this).prop('name')+'"][value="'+$(this).val()+'"]').prop('checked',false);
			$('input[name="'+$(this).prop('name')+'"][value="'+$(this).val()+'"]').next().css("font-weight","normal");
		}
		setLokasi();
		setKategori();
	});
	
	$('.news-thumb-img').hover(
		function()	{
			$(this).find('div.news-thumb-dim').removeClass("news-thumb-dim");
			$(this).next().addClass("news-thumb-titlehover");
		},
		function(){
			$(this).find('div').addClass("news-thumb-dim");
			$(this).next().removeClass("news-thumb-titlehover");
	});
	
	$('.news-thumb-title').hover(
		function(){
		$(this).prev().mouseenter();
		$(this).addClass("news-thumb-titlehover");
		},
		function(){
		$(this).prev().mouseleave();
		$(this).removeClass("news-thumb-titlehover");
		}
	);
});



//run saat tombol esc ditekan, untuk menutup semua popup
	$(document).keyup(function(e) {
	  if (e.keyCode == 27) { 
		$('[name="popup"]').each(function()	{
			$(this).fadeOut(300);
		});
		$('.sm1-menu').removeClass("sm1-hover");
	  }   // esc
	});
//end

//Popup Kategori di searchmenu
	function openPopupCat(x,y)	{
		popupOpen(x);
		$(y).addClass("sm1-hover");
	}

	function closePopupCat(x,y)	{
		popupClose(x);
		$(y).removeClass("sm1-hover");
	}

	function togglePopupCat(x,y)	{
		var ele = document.getElementById(x);
		if(ele.style.display=="none")
		{
			openPopupCat(x,y);
		}
		else if(ele.style.display!="none")
		{
			closePopupCat(x,y);
		}
	}
//end


//Popup di header, popup_login & popup_signup
	function popupOpen(x,thisvar){
		$('[name="popup"]').each(function()	{
			$(this).fadeOut(300);
		});
		$('.sm1-menu').removeClass("sm1-hover");
		$('#'+x).fadeIn(300);
		if(thisvar!==undefined)
		{
			var position = $(thisvar).position();
		}
	document.getElementById(x).style.display="block";
}
function popupClose(x){
	/*document.getElementById(x).style.display="none";*/
	$('#'+x).fadeOut(300);
	$('.sm1-menu').removeClass("sm1-hover");
}

function popupToggle(x,thisvar){
	var element = document.getElementById(x);
	if(element.style.display=="none")
	{
		popupOpen(x,thisvar);
		
	}
	else
	{
		popupClose(x,thisvar);
	}
	
}
//end

//popup_cat
	//fungsi untuk memilih sub-kategori pada popup_cat
	
	/*function hideCatSub(id)
	{
		document.getElementById(id).style.display="none";
	}*/
	function showCatSub(id)
	{
		var popsub = document.getElementsByName("cat-sub");
		var popsublength = popsub.length;
		for(var i=0; i<popsublength; i++)
		{
			popsub.item(i).style.display="none";
		}
		document.getElementById("popup_cat-sub-"+id).style.display="block";
	}
	function initCatSub()
	{
		var popsub = document.getElementsByName("cat-sub");
		var popsublength = popsub.length;
		for(var i=0; i<popsublength; i++)
		{
			popsub.item(i).style.display="none";
		}
	}
	
	//end
	
	//fungsi centang semua / uncheck semua buat popup_cat-sub
	function checkAll(name)
	{
		var chk = document.getElementsByName(name);
		var chklength = chk.length;
			for(var i=0; i<chklength; i++)
			{
				chk.item(i).checked=false;
			}
			$('[name="'+name+'"]').each(function()	{
				$('[name="'+name+'"][value="'+$(this).val()+'"]').next().css("font-weight","normal");
			});
		chk.item(0).checked=true;
		$('[name="'+name+'"]:first').next().css("font-weight","bold");
		disableRest('[name="'+name+'"]:first');
		disableRest('[name="'+name+'"]:first');
		alert(chklength);
		setLokasi();
		setKategori();
		
	}
	
	function uncheckAll(name)
	{
		
		var chk = document.getElementsByName(name);
		var chklength = document.getElementsByName(name).length;
		for(var i=0; i<chklength; i++)
		{
			chk.item(i).checked=false;
		}
		$('[name="'+name+'"]').each(function()	{
			$('[name="'+name+'"][value="'+$(this).val()+'"]').next().css("font-weight","normal");
		});
		disableRest('[name="'+name+'"]:first');
		setLokasi();
		setKategori();
		
	}
	
	
	//end
//end

//popup_loc
	//fungsi untuk memilih sub-kategori pada popup_loc
	
	/*function hideLocSub(id)
	{
		document.getElementById(id).style.display="none";
	}*/
	function showLocSub(id)
	{
		var popsub = document.getElementsByName("loc-sub");
		var popsublength = popsub.length;
		for(var i=0; i<popsublength; i++)
		{
			popsub.item(i).style.display="none";
		}
		document.getElementById("popup_loc-sub-"+id).style.display="block";
	}
	function initLocSub()
	{
		var popsub = document.getElementsByName("loc-sub");
		var popsublength = popsub.length;
		for(var i=0; i<popsublength; i++)
		{
			popsub.item(i).style.display="none";
		}
	}
	
	//end
//end

//.category
	//.category = buat  switch tiap kategori
		function switchKategori(kategori)
		{
			var allkat = $('.category-2-content');
			var curkat = $('#category-content-'+kategori);
			allkat.css('display','none');
			categoryIcon(kategori);
			curkat.fadeIn('slow');
		}
	//end
	
	//.category = buat setel hover di icon kategori
		function categoryIcon(kategori)
		{
			var kateg = "";
			if(kategori=="kategori")
			{
				kateg = "category-1-cat";
			}
			else if(kategori=="lokasi")
			{
				kateg = "category-1-loc";
			}
			else if(kategori=="industri")
			{
				kateg = "category-1-ind";
			}
				$('#category-1-cat').removeClass(function(index,currentclass){
					if(currentclass==="category-1-picked")
					{
						return "category-1-picked";
					}
					else return false;
				});
				$('#category-1-ind').removeClass(function(index,currentclass){
					if(currentclass==="category-1-picked")
					{
						return "category-1-picked";
					}
					else return false;
				});
				$('#category-1-loc').removeClass(function(index,currentclass){
					if(currentclass==="category-1-picked")
					{
						return "category-1-picked";
					}
					else return false;
				});
			
			$('#'+kateg).addClass("category-1-picked");
		}
	//end
//end

// fungsi ambil value dari checkbox ke hidden input

	
	function setKategori()
	{
		var inputkat = [];
		$('input:checkbox[name|="cat-sub"]:checked').each(function(i)	{
			inputkat[i] = $(this).val();
		});
		inputkat = $.unique(inputkat);
		/*alert(inputkat.join(","));*/
		$('input[name="kategori"]').val(inputkat.join(","));
		var pll_input = inputkat.join(",");
		$('input[name="pll_kategori"]').val(pll_input);
	}


	function setLokasi()
	{
		var inputlok = [];
		$('input:checkbox[name|="loc-sub"]:checked').each(function(i)	{
			inputlok[i] = $(this).val();
		});
		inputlok = $.unique(inputlok);
		// alert(inputlok.join(","));
		$('input[name="lokasi"]').val(inputlok.join(","));
		var pll_input = inputlok.join(",");
		$('input[name="pll_lokasi"]').val(pll_input);
	}
	
	function disableRest(me)
	{
		var $chk = $(me);
		var $parent = $("#popup_" + $chk.attr("name"));
		if($chk.is(':checked')===true)
		{
			$parent.find("input[type='checkbox']").attr("disabled", "disabled");
			
			$chk.removeAttr('disabled');
		}
		else
		{
			$parent.find("input[type='checkbox']").removeAttr("disabled");
			
			$chk.removeAttr('disabled');
		}
	}
	
//end