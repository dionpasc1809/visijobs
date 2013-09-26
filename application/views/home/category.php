<div class="category-line"><hr/></div>
<div class="category">
	
    	<div id="category-1">
        	<div style="width:1200px; position:relative; margin:0 auto; height:70px;">
            	<div id="category-1-title">Cari Lowongan<br />
                Berdasarkan:</div>
                <div id="category-1-cat" onclick="switchKategori('kategori')">Kategori</div>
                <div id="category-1-ind" onclick="switchKategori('industri')">Industri</div>
                <div id="category-1-loc" onclick="switchKategori('lokasi')">Lokasi</div>
            </div>
        </div>
        <div id="category-2">
        	<div style="width:1200px; position:relative; margin:0 auto; min-height:310px;">
            	
                <div class="category-2-content" id="category-content-kategori">
                	<ul id="category-2-list">
                	<?php
					/*echo "<pre>";
					print_r($category);
					echo "</pre>";*/
                    foreach($category['kategori'] as $cat=>$key):
								$kat = $cat;
								$katfull = $kat;
								if(strlen($kat)>25):
									$kat = substr($kat,0,25)." ...";
								endif;
								?>
                            	<li class="cat-2-li"><?php
								echo "<span>".$kat."<img style=\"margin-left:10px; margin-top:3px;\" src=\"".base_url()."images/arrow-list-categories.png\" /></span>"; ?>
                                <div class="category-popup">
                                	<span class="category-popup-title"><?php echo $katfull; ?></span>
                                    <hr />
                                    <div>
                                    	<ul>
                                        	<?php
												foreach($key as $subkat=>$sub):
													?><li><?php echo $sub; ?></li><?php
												endforeach;
											?>
                                        </ul>
                                    </div>
                                </div></li>
                                
								<?php 
							
					endforeach;
						
					?>
                    </ul>
                </div>
                
                <div class="category-2-content" id="category-content-lokasi">
                	<ul id="category-2-list">
                	<?php
					/*echo "<pre>";
					print_r($category);
					echo "</pre>";*/
                    foreach($category['lokasi'] as $cat=>$key):
								$kat = $cat;
								$katfull = $kat;
								if(strlen($kat)>25):
									$kat = substr($kat,0,25)." ...";
								endif;
								?>
                            	<li class="cat-2-li"><?php
								echo "<span>".$kat."<img style=\"margin-left:10px; margin-top:3px;\" src=\"".base_url()."images/arrow-list-categories.png\" /></span>"; ?>
                                <div class="category-popup">
                                	<span class="category-popup-title"><?php echo $katfull; ?></span>
                                    <hr />
                                    <div>
                                    	<ul>
                                        	<?php
												foreach($key as $subkat=>$sub):
												if($subkat==0&&$sub==""){
													$sub=$katfull;
												}
													?><li><?php echo $sub; ?></li><?php
												endforeach;
											?>
                                        </ul>
                                    </div>
                                </div></li>
                                
								<?php 
							
					endforeach;
						
					?>
                    </ul>
                </div>
                
                <div class="category-2-content" id="category-content-industri">
                	<ul id="category-2-list">
                	<?php
					/*echo "<pre>";
					print_r($category);
					echo "</pre>";*/
                    foreach($category['industri'] as $cat=>$key):
								$kat = $cat;
								$katfull = $kat;
								if(strlen($kat)>25):
									$kat = substr($kat,0,25)." ...";
								endif;
								?>
                            	<li class="cat-2-li"><?php
								echo "<span>".$kat."<img style=\"margin-left:10px; margin-top:3px;\" src=\"".base_url()."images/arrow-list-categories.png\" /></span>"; ?>
                                <!--<div class="category-popup">
                                	<span class="category-popup-title"><?php/* echo $katfull; */?></span>
                                    <hr />
                                    <div>
                                    	<ul>
                                        	<?php
												/*foreach($key as $subkat=>$sub):
													?><li><?php echo $sub; ?></li><?php
												endforeach;*/
											?>
                                        </ul>
                                    </div>
                                </div>--></li>
                                
								<?php 
							
					endforeach;
						
					?>
                    </ul>
                </div>
                
            </div>
		</div>
</div>
    