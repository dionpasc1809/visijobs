<div class="content">
<div style="width:1200px; position:relative; margin:0 auto; min-height:720px; padding-top:50px; padding-bottom:50px;">
<div style="display:none; position:absolute; background-color:rgba(0,0,0,0.5); color:#FFFFFF; left:0; z-index:99;">
    	<pre>
        	<?php print_r($query_compile); ?>
        </pre>
</div>
<div id="search-container">
<div id="search-title">
    <div id="search-title-text"><img src="<?php echo base_url(); ?>images/search-icon-magnifier.png" style="display:inline-block; position:relative;"/> <strong>Hasil Pencarian</strong> untuk <font style="font-weight:bold;">"<?php echo $keyword; ?>"</font></div>
</div>
<div id="search-property">

</div>

<div id="search-list">
    <div id="search-list-paging-top">
        <?php
        $resultlength = $num_rows;
        $page_maxcontent = 4;
        $page = ceil($resultlength/$page_maxcontent);

        /*for($i=1;$i<=$page;$i++):
            echo $i;
        endfor;*/
        ?>
        <div class="s-l-p-firstandprev">
            <?php
            if($current_page!=1){
                ?>
                <div class="s-l-p-first" onclick="goPage('1')"></div>
                <div class="s-l-p-prev" onclick="goPage('<?php echo $current_page-1; ?>')"></div>
            <?php }?>
        </div>
        <div class="s-l-p-gopage"><?php
            /*for($i=1;$i<=$page;$i++):
                echo $i;
            endfor;*/

            // cur_pageshow_page : buat liat page sekarang pada pageshow ke berapa, pageshow yang dimaksud adalah set 5 page ke berapa
            // misal : ada 30 result dimana satu page = 5 result, jadi ada 6 page
            // kalau berada pada page ke 1 sampai 5, maka ada di cur_pageshow_page = 1, jika di page 6 maka berada di cur_pageshow_page = 2;
            $cur_pageshow_page = 1;


            $pageshow = 5;
            $cur_pageshow_page = ceil($current_page/$pageshow);
            $pageshow_max = $cur_pageshow_page*$pageshow;
            $pageshow_min = $pageshow_max-4;
            if($pageshow_max>$page)
            {
                $pageshow_max = $page;
            }

            $curpage = "";
            ?>
            <div class="s-l-p-gopage-abs">
                <script>
                    var element = <?php echo $pageshow_max-($pageshow_min-1); ?>;
                    var elementwidth = 20;
                    var margin = 2;
                    var width_gopage = (elementwidth*element)+(margin*(element-1));
                    $('.s-l-p-gopage-abs').each(function(){
                        $(this).css('width',width_gopage+'px');
                    });
                </script>
                <?php for($i=$pageshow_min;$i<=$pageshow_max;$i++):
                    if($i==$current_page)
                    {
                        $curpage = 'style="background-color:#00215f;"';
                    }
                    else if($i!=$current_page)
                    {
                        $curpage="";
                    }
                    ?>
                    <div class="s-l-p-pagenum-top" <?php echo $curpage; ?> onclick="goPageNum('<?php echo $i; ?>','<?php echo $current_page; ?>')"><?php echo $i; ?></div>
                <?php

                endfor;?>
            </div>
        </div>
        <div class="s-l-p-nextandlast">
            <?php if($current_page!=$page):?>
                <div class="s-l-p-next" onclick="goPage('<?php echo $current_page+1; ?>')"></div>
                <div class="s-l-p-last" onclick="goPage('<?php echo $page; ?>')"></div>
            <?php endif;?>
        </div>
    </div>

    <div id="search-list-container">
        <?php foreach($result as $rl): ?>
            <div class="search-list-results" onclick="showJob('<?php echo $rl->id_jobs; ?>')">
                <div class="search-list--punchhole"></div>
                <div class="search-list-resultcontent">
                            <span class="s-l-rc-company"><?php
                                $employer = $rl->employer;
                                $fake_employer = $rl->fake_employer;
                                if($employer!=""){
                                    echo $employer;
                                }else if($employer==""){
                                    echo $fake_employer;
                                }
                                ?></span>
                            <span class="s-l-rc-timestamp"><?php
                                $datetime=explode(' ',$rl->tanggal);
                                $date = explode('-',$datetime[0]);
                                $monthname = array(
                                    '01'=>"Januari",
                                    '02'=>"Februari",
                                    '03'=>"Maret",
                                    '04'=>"April",
                                    '05'=>"Mei",
                                    '06'=>"Juni",
                                    '07'=>"Juli",
                                    '08'=>"Agustus",
                                    '09'=>"September",
                                    '10'=>"Oktober",
                                    '11'=>"November",
                                    '12'=>"Desember"	);
                                $date = array(
                                    'tanggal'=>$date[2],
                                    'bulan'=>$monthname[$date[1]],
                                    'bulan_angka'=>$date[1],
                                    'tahun'=>$date[0]
                                );
                                $time = explode(':',$datetime[1]);
                                $time = array	(
                                    'jam'=>$time[0],
                                    'menit'=>$time[1]
                                );

                                echo intval($date['tanggal'])." ".$date['bulan']." ".$date['tahun']; ?><br />
                                <?php echo $time['jam'].":".$time['menit']; ?></span>
                            <span class="s-l-rc-judul"><?php
                                echo $rl->posisi;
                                ?></span><br />
                    <div class="s-l-rc-kriteria" style="display:none;">Kriteria :
                        <ul>
                            <li>Mampu menggunakan sistem operasi LINUX</li>
                            <li>Mahir dalam bahasa pemrograman HTML, CSS dan PHP</li>
                            <li>Memiliki pengalaman menggunakan Framework</li>
                            <li>Memiliki pengalaman menggunakan Framework</li>
                        </ul>
                    </div>
                    <div class="s-l-rc-moreorless"></div><span class="span-moreorless">show more&nbsp&nbsp&nbsp </span>
                </div>
            </div>
        <?php endforeach;?>
    </div>

    <div id="search-list-paging-bottom">
        <div class="s-l-p-firstandprev">
            <?php
            if($current_page!=1){
                ?>
                <div class="s-l-p-first" onclick="goPage('1')"></div>
                <div class="s-l-p-prev" onclick="goPage('<?php echo $current_page-1; ?>')"></div>
            <?php }?>
        </div>
        <div class="s-l-p-gopage"><?php
            /*for($i=1;$i<=$page;$i++):
                echo $i;
            endfor;*/
            ?>
            <div class="s-l-p-gopage-abs">
                <script>
                    var element = <?php echo $pageshow_max-($pageshow_min-1); ?>;
                    var elementwidth = 20;
                    var margin = 2;
                    var width_gopage = (elementwidth*element)+(margin*(element-1));
                    $('.s-l-p-gopage-abs').each(function(){
                        $(this).css('width',width_gopage+'px');
                    });
                </script>
                <?php for($i=$pageshow_min;$i<=$pageshow_max;$i++):
                    if($i==$current_page)
                    {
                        $curpage = 'style="background-color:#00215f;"';
                    }
                    else if($i!=$current_page)
                    {
                        $curpage="";
                    }
                    ?>
                    <div class="s-l-p-pagenum-top" <?php echo $curpage; ?>><?php echo $i; ?></div>
                <?php endfor;?>
            </div>
        </div>
        <div class="s-l-p-nextandlast">
            <?php if($current_page!=$page):?>
                <div class="s-l-p-next" onclick="goPage('<?php echo $current_page+1; ?>')"></div>
                <div class="s-l-p-last" onclick="goPage('<?php echo $page; ?>')"></div>
            <?php endif;?>
        </div>
    </div>
</div>

<div id="search-content">
    <div id="search-content-list">
        <?php foreach($result as $r):?>
            <div class="search-result" id="<?php echo $r->id_jobs; ?>">
                <div class="search-result-menubar-top">
                    <div class="srs-btnapply">APPLY <img src="<?php echo base_url();?>images/arrowdown.png" /></div>
                </div>
                <div class="search-result-company">

                    <?php
                    $employer = $r->employer;
                    $fake_employer = $r->fake_employer;
                    if($employer!=""){
                        echo $employer;
                    }else if($employer==""){
                        echo $fake_employer;
                    }
                    ?>
                </div>
                <div class="search-result-timestamp"><?php
                    $datetime=explode(' ',$r->tanggal);
                    $date = explode('-',$datetime[0]);
                    $monthname = array(
                        '01'=>"Januari",
                        '02'=>"Februari",
                        '03'=>"Maret",
                        '04'=>"April",
                        '05'=>"Mei",
                        '06'=>"Juni",
                        '07'=>"Juli",
                        '08'=>"Agustus",
                        '09'=>"September",
                        '10'=>"Oktober",
                        '11'=>"November",
                        '12'=>"Desember"	);
                    $date = array(
                        'tanggal'=>$date[2],
                        'bulan'=>$monthname[$date[1]],
                        'bulan_angka'=>$date[1],
                        'tahun'=>$date[0]
                    );
                    $time = explode(':',$datetime[1]);
                    $time = array	(
                        'jam'=>$time[0],
                        'menit'=>$time[1]
                    );

                    echo $date['tanggal']." ".$date['bulan']." ".$date['tahun']; ?><br />
                    <?php echo $time['jam'].":".$time['menit']; ?>
                </div>
                <div class="company-image"><img src="<?php echo base_url(); ?>images/companies/0 (5).gif" /></div>
                <div class="search-result-header"><?php if($employer!=""){
                        echo $employer;
                    }else if($employer==""){
                        echo $fake_employer;
                    } ?> adalah perusahan jasa konsultan manajemen SDM, provider training dan penelitian di bidang social ekonomi serta usaha penerbitan Majalah Migas yang saat ini memiliki base market di Industri Pertambangan dan Migas membutuhkan tenaga professional untuk posisi :</div>
                <div class="search-result-title"><?php echo $r->posisi; ?></div>

                <div class="search-result-description"><strong>Deskripsi</strong> : <br /><br />
                    <pre><?php echo $r->keterangan; ?></pre>
                </div>

                <div class="search-result-kriteria">Kriteria :
                    <ul>
                        <li>Mampu menggunakan sistem operasi LINUX</li>
                        <li>Mahir dalam bahasa pemrograman HTML, CSS dan PHP</li>
                        <li>Memiliki pengalaman menggunakan Framework</li>
                        <li>Memiliki pengalaman menggunakan Framework</li>
                    </ul>
                </div>
                <div class="search-result-syarat">Syarat :
                    <ul>
                        <li>S1 Teknologi Informasi, Ilmu Komputer, Sistem Informasi, dst</li>
                        <li>Pengalaman Kerja 1 Tahun</li>
                        <li>Fresh Graduate dapat mengapply</li>
                        <li>Penguasaan Bahasa Inggris merupakan nilai tambah</li>
                    </ul>
                </div>
                <div class="search-result-lokasidankategori"><span><strong>Lokasi</strong> : <?php echo $r->kota; ?></span> <span><strong>Kategori</strong> : <?php echo "<p><a href=\"\">".$r->kategori."</a><font style=\"text-decoration:none;\"> >> </font><a href=\"\">".$r->subkategori."</a></p>"; ?></span></div>
                <div class="search-result-menubar-btm">
                    <div class="srs-btnapply">APPLY <img src="<?php echo base_url();?>images/arrowdown.png" /></div>
                    <div class="srs-btnprint"><img src="<?php echo base_url();?>css/images/icon_printer.png" />Print</div>
                </div>
            </div>
        <?php endforeach; ?>


        <div class="search-result-premiumemployers">
            <strong>Perusahaan Pilihan</strong>
            <div class="prem-container">
                <div class="prem-inner-container">
                    <div class="prem-list-left-thumb"></div>
                    <?php for($i=0; $i<20; $i++): ?>
                        <div class="prem-list">

                            <div class="prem-list-container">
                                <img src="<?php echo base_url(); ?>images/companies/0 (<?php echo $i; ?>).gif" align="middle" />
                            </div>
                            <div class="prem-list-judul">
                                Lowongan PT...
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="prem-list-right-thumb"></div>
                </div>
            </div>

            <div id="prem-button-thumbnail">

            </div>
            <script>
                //	prem_count : jumlah thumbnail premium employers yang tampil
                var prem_count = $('.prem-list').length;
                if(prem_count % 5 != 0)
                {
                    prem_count = prem_count + (5-(prem_count%5));
                }
                //	prem_page_count : jumlah page dihitung dari jumlah prem_count / 5
                var prem_page_count = prem_count/5;
                var j = 0;
                for(var i=0; i<prem_page_count;i++)
                {
                    j = i+1;
                    var addclass = "";
                    if(j==1)
                    {
                        addclass = " prem-button-picked";
                    }
                    $('#prem-button-thumbnail').append("<div class='prem-button-page"+addclass+"'>"+j+"</div>");
                }

                var prem_list_width	= $('.prem-list').css("width");
                prem_list_width = parseInt(prem_list_width.substr(0,prem_list_width.length-2));
                var prem_list_padding	= $('.prem-list').css("padding");
                prem_list_padding = parseInt(prem_list_padding.substr(0,prem_list_padding.length-2));
                var prem_list_border	= $('.prem-list').css("border");
                prem_list_border = parseInt(prem_list_border.substr(0,1));
                var prem_list_margin = $('.prem-list').css("margin-right");
                prem_list_margin = parseInt(prem_list_margin.substr(0,prem_list_margin.length-2));
                var prem_list_margin_first = $('.prem-list:nth-child(2)').css("margin-left");
                prem_list_margin_first = parseInt(prem_list_margin_first.substr(0,prem_list_margin_first.length-2));
                var width_container = prem_count * (prem_list_width + prem_list_margin + (2*prem_list_padding)+(2*prem_list_border))+prem_list_margin_first;
                $('.prem-inner-container').css("width", width_container+'px');

                var re = /px$/;
                $('.prem-button-page').click(function(e){
                    var prempagenum = this.innerHTML;
                    var cur_margin = (prempagenum-1)*(-700)+"px";
                    e.preventDefault();
                    $('.prem-inner-container').animate({
                        marginLeft: cur_margin
                    }, "fast");
                    $('.prem-button-page').each(function(){
                        $(this).removeClass('prem-button-picked');
                    });
                    $(this).addClass('prem-button-picked');
                });
                $('.prem-list-left-thumb').click(function(e) {
                    /*var container = $('.prem-inner-container');
                    var marginL = parseInt(container.css("margin-left").replace(re, ""));
                    if(marginL*(-1)>0)	{
                        e.preventDefault();
                        $('.prem-inner-container').animate({
                            marginLeft: "+=700px"
                        }, "slow");
                    }*/
                    var pagenow = $('.prem-button-picked').html();
                    var pagenext = parseInt(pagenow) - 1;
                    if(pagenow==1)
                    {
                        pagenext = prem_page_count;
                    }
                    var cur_margin = (pagenext-1)*(-700)+"px";
                    $('.prem-inner-container').animate({
                        marginLeft: cur_margin
                    }, "fast");
                    $('.prem-button-page').each(function(e){
                        $(this).removeClass('prem-button-picked');
                        if($(this).html()==pagenext)
                        {
                            $(this).addClass('prem-button-picked');
                        }
                    });
                });
                $('.prem-list-right-thumb').click(function(e) {
                    /*var container = $('.prem-inner-container');
                    var marginL = parseInt(container.css("margin-left").replace(re, ""));
                    if((marginL*(-1))<parseInt(container.css("width").replace(re, ""))-750)	{
                        e.preventDefault();
                        $('.prem-inner-container').animate({
                            marginLeft: "-=700px"
                        }, "slow");
                    }*/
                    var pagenow = $('.prem-button-picked').html();
                    var pagenext = parseInt(pagenow)+1;
                    if(pagenow==prem_page_count)
                    {
                        pagenext = 1;
                    }
                    var cur_margin = (pagenext-1)*(-700)+"px";
                    $('.prem-inner-container').animate({
                        marginLeft: cur_margin
                    }, "fast");
                    $('.prem-button-page').each(function(e){
                        $(this).removeClass('prem-button-picked');
                        if($(this).html()==pagenext)
                        {
                            $(this).addClass('prem-button-picked');
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>

<div id="search-navi">
    <div id="search-navi-title">
        <span>Pencarian Lebih Lanjut</span>
    </div>
    <div id="search-navi-content">
        <div class="s-n-c-part">
            <input type="text" id="pll_keyword" name="pll_keyword" placeholder="Keyword pencarian"  /></div>
        <div class="s-n-c-part"> Kategori:<br />
            <input type="text" id="pll_kategori" name="pll_kategori" readonly="readonly" onclick="popupToggle('popup_cat',this)" />
            <div id="pll_kategori_toggle"></div>
        </div>
        <div class="s-n-c-part">Lokasi:<br />
            <input type="text" id="pll_lokasi" name="pll_lokasi" readonly="readonly" onclick="popupToggle('popup_loc',this)"/>
            <div id="pll_lokasi_toggle"></div>

        </div>
        <div class="s-n-c-part"> Waktu Posting:<br />
            <select id="pll_waktu" name="pll_waktu">
                <option>-- Semua Waktu --</option>
                <option>1 Jam Terakhir</option>
                <option>3 Jam Terakhir</option>
                <option>6 Jam Terakhir</option>
                <option>1 Hari Terakhir</option>
                <option>1 Minggu Terakhir</option>
                <option>1 Bulan Terakhir</option>
                <option>1 Tahun Terakhir</option>
                <option>2 Tahun Terakhir</option>
                <option>3 Tahun Terakhir</option>
            </select></div>
        <input type="button" name="pll_search_btn" id="pll_search_btn" value="Search" />
    </div>
</div>
</div>
</div>
</div>