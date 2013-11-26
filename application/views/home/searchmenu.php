<div class="searchmenu" style="background-image:url(<?php echo base_url(); ?>images/bg-searchmenu.gif);">
    <div style="width:1200px; position:relative; margin:0 auto; height:160px;">
        <!--<div style="position:absolute; z-index:0; background-color:rgba(255,255,255,0.5);">
        	<pre>
            	<?php/* print_r($category['lokasi']); */?>
            </pre>
        </div>-->
        <div id="searchmenu-1">
            <div id="sm1-title">PENCARIAN LOWONGAN</div>
            <form action="<?php echo base_url(); ?>site/search" method="get">
                <div id="sm1-search">
                    <input type="text" id="sm1-searchbar" name="keyword" placeholder="Input kata kunci disini..." />
                    <input type="hidden" name="kategori" />
                    <input type="hidden" name="lokasi" />
                    <input type="submit" id="sm1-searchbtn" value="CARI" />
                </div>

            </form>
            <div id="sm1-menu">
                <div id="sm1-categories" class="sm1-menu" onclick="togglePopupCat('popup_cat','#sm1-categories');">kategori <img src="<?php echo base_url();?>images/arrowdown.png" /></div>
                <div id="popup_cat" name="popup">
                    <div class="popup_sm-exit" onclick="popupClose('popup_cat');"></div>
                    <div class="popup_sm-super">
                        <?php foreach($category['kategori'] as $c=>$k):
                            $supkat = $c;
                            $supkatid = substr($k[0][1],0,5);
                            ?>
                            <div class="popup_sm-super-thumb" onclick="showCatSub('<?php echo $supkatid; ?>');"><?php echo $supkat; ?></div>
                        <?php endforeach; ?>
                        <!--
                        <div class="popup_sm-super-thumb" onclick="showCatSub('accounting');">Accounting</div>
                        -->
                    </div>
                    <div class="popup_sm-sub">
                        <!-- start looping sub-ALL -->
                        <?php foreach($category['kategori'] as $c=>$k):
                            $supkat = $c;
                            $supkatid = substr($k[0][1],0,5);
                            $sublength = count($k);
                            $subln1 = ceil($sublength/2);
                            $subln2 = $sublength - $subln1;
                            ?>
                            <div id="popup_cat-sub-<?php echo $supkatid; ?>" name="cat-sub">
                                <div class="popup_sm-sub-title"><?php echo $supkat; ?></div>
                                <div class="popup_sm-sub-hr"></div>
                                <div class="cat-sub-list" style="position:relative; float:left; clear:both;">
                                    <input type="checkbox" name="cat-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo "All ".$supkat; ?>" onchange="setKategori(); disableRest(this);" /><span style="float:left; width:260px;"><?php echo "All ".$supkat; ?></span>
                                </div>
                                <div class="popup_sm-sub-1">
                                    <?php for($x=0; $x<$subln1; $x++): ?>
                                        <div class="cat-sub-list">
                                            <input type="checkbox" name="cat-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo $k[$x][0]; ?>" onchange="setKategori()" /><span style="float:left; width:260px;"><?php echo $k[$x][0]; ?></span>
                                        </div>
                                    <?php endfor;?>
                                </div>
                                <div class="popup_sm-sub-2">
                                    <?php for($x; $x<$sublength; $x++): ?>
                                        <div class="cat-sub-list">
                                            <input type="checkbox" name="cat-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo $k[$x][0]; ?>" onchange="setKategori()" /><span style="float:left; width:260px;"><?php echo $k[$x][0]; ?></span><br />
                                        </div>
                                    <?php endfor;?>
                                </div>
                                <div class="popup_sm-sub-select">
                                    <input type="button" class="popup_sm-sub-selectallbtn" value="Check Semua" onclick="checkAll('cat-sub-<?php echo $supkatid; ?>')"/><input type="button" class="popup_sm-sub-selectallbtn" value="Uncheck Semua" onclick="uncheckAll('cat-sub-<?php echo $supkatid; ?>')"/>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- end looping sub-ALL -->
                    </div>
                </div>
                <div id="sm1-location" class="sm1-menu" onclick="togglePopupCat('popup_loc','#sm1-location');">lokasi <img src="<?php echo base_url();?>images/arrowdown.png" /></div>
                <div id="popup_loc" name="popup">
                    <div class="popup_sm-exit" onclick="popupClose('popup_loc');"></div>

                    <div class="popup_sm-super">
                        <?php foreach($category['lokasi'] as $c=>$k):
                            $supkat = $c;
                            $supkatid = substr($k[0][1],0,5);
                            ?>
                            <div class="popup_sm-super-thumb" onclick="showLocSub('<?php echo $supkatid; ?>');"><?php echo $supkat; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="popup_sm-sub">
                        <!-- start looping loc-sub-ALL -->
                        <?php foreach($category['lokasi'] as $c=>$k):
                            $supkat = $c;
                            $supkatid = substr($k[0][1],0,5);
                            $sublength = count($k);

                            $subln1 = ceil($sublength/2);
                            $subln2 = $sublength - $subln1;
                            if($sublength<=1 && $k[0][0]=="")
                            {
                                $subln1 = 0;
                                $subln2 = 0;
                                $sublength = 0;
                            }
                            ?>
                            <div id="popup_loc-sub-<?php echo $supkatid; ?>" name="loc-sub">
                                <div class="popup_sm-sub-title"><?php echo $supkat; ?></div>
                                <div class="popup_sm-sub-hr"></div>
                                <div class="loc-sub-list" style="position:relative; float:left; clear:both;">
                                    <input type="checkbox" name="loc-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo "All ".$supkat; ?>" onchange="setLokasi(); disableRest(this);" /><span style="float:left; width:260px;"><?php echo "All ".$supkat; ?></span>
                                </div>
                                <div class="popup_sm-sub-1">
                                    <?php for($x=0; $x<$subln1; $x++): ?>
                                        <div class="loc-sub-list">
                                            <input type="checkbox" name="loc-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo $k[$x][0]; ?>" onchange="setLokasi()" /><span style="float:left; width:260px;"><?php echo $k[$x][0]; ?></span>
                                        </div>
                                    <?php endfor;?>
                                </div>
                                <div class="popup_sm-sub-2">
                                    <?php for($x; $x<$sublength; $x++): ?>
                                        <div class="loc-sub-list">
                                            <input type="checkbox" name="loc-sub-<?php echo $supkatid; ?>" class="" style="float:left;" value="<?php echo $k[$x][0]; ?>" onchange="setLokasi()" /><span style="float:left; width:260px;"><?php echo $k[$x][0]; ?></span><br />
                                        </div>
                                    <?php endfor;?>
                                </div>
                                <div class="popup_sm-sub-select">
                                    <input type="button" class="popup_sm-sub-selectallbtn" value="Check Semua" onclick="checkAll('loc-sub-<?php echo $supkatid; ?>')"/><input type="button" class="popup_sm-sub-selectallbtn" value="Uncheck Semua" onclick="uncheckAll('loc-sub-<?php echo $supkatid; ?>')"/>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- end looping loc-sub-ALL -->
                    </div>
                </div>
            </div>

        </div>

        <div id="searchmenu-2">
            <div id="tab-jobseeker">JOBSEEKER</div>
            <div id="tab-employer">EMPLOYER</div>
            <div id="sm2-buatjobalert"><img src="<?php echo base_url(); ?>images/icon job alert.png" height="50px"/>
                <div style="margin-top:10px;">Buat Job Alert</div></div>
            <div id="sm2-buatcv"><img src="<?php echo base_url(); ?>images/icon resume.png" height="50px"/>
                <div style="margin-top:10px;">Buat CV</div></div>
        </div>
    </div>
</div>