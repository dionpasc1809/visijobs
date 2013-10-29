<div class="header">
    <?php
    if($this->session->userdata('login')==FALSE){
        ?>
        <div id="beforelogin" style="width:1200px; position:relative; margin:0 auto; height:40px;">
            <div id="header-menu">Halo, Guest |
                <input type="button" id="btn_signup" name="btn_signup" value="Sign Up" onclick="popupToggle('popup_signup');" />
                <input type="button" id="btn_login" name="btn_login" value="Login" onclick="popupToggle('popup_login');" />
            </div>

            <div id="popup_signup" name="popup">

                <div id="popup_signup-trianglepoint"></div>
                <div class="exit_popup_button" onclick="popupClose('popup_signup');"></div>

                <div id="popup_signup-title">
                    <font size="+2">Daftarkan Diri Anda Sekarang!!!</font>
                </div>

                <div id="popup_signup-form">
                    <input class="signup_form" type="text" id="txt_signup_id" name="txt_signup_id" placeholder="Masukkan Email disini.."/><br/>

                    <input class="signup_form" type="password" id="txt_signup_pass" name="txt_signup_pass" placeholder="Masukkan Password disini.."/><br/><br/>

                    <div id="popup_signup-form-agree"><input type="checkbox" id="chk_signup_agree" name="chk_signup_agree" /><font style="font-size:14px;">Saya ingin dikirimkan info tentang lowongan dan seputar pekerjaan</font></div>

                    <input class="signup_btn" type="submit" id="btn_red_submit" name="btn_red_submit" value="SIGN UP" />
                    <input class="signup_btn" type="button" id="btn_red_login" name="btn_red_login" value="LOGIN"/>

                    <div id="popup_signup-employer"><a href="">Ingin membuat AKUN PERUSAHAAN?</a></div>

                </div>
            </div>

            <div id="popup_login" name="popup">
                <div id="popup_login-trianglepoint"></div>
                <div class="exit_popup_button" onclick="popupClose('popup_login');"></div>

                <div id="popup_login-title">
                    <font size="+2">Masuk ke Akun Anda...</font></div>

                <div id="popup_login-form">
                    <?php echo form_open('login') ?>
                    <input class="signup_form" type="text" id="txt_login_id" name="txt_login_id" placeholder="Email"/><br/>
                    <input class="signup_form" type="password" id="txt_login_pass" name="txt_login_pass" placeholder="Password"/><br/><br/>
                    <div id="popup_login-remember">
                        <input type="checkbox" id="chk_login_remember" name="chk_login_remember" value="" />Remember Me
                    </div>
                    <input id="popup_login-signupbtn" type="submit" value="LOGIN"/><br />
                    <?php echo form_close();?>
                </div>

                <div id="login-lupapass"><a href="">Lupa Password?</a></div>
            </div>
        </div>
    <?php
    }
    else if($this->session->userdata('login')!=FALSE){
        ?>
        <div id="afterlogin" style="width:1200px; position:relative; margin:0 auto; height:40px;">
            <div id="header-menu">
                <div class="header-menu-icons"><a href="<?php echo base_url(); ?>logout">Logout</a></div>
                <div class="header-menu-icons"><input type="hidden" value="menu-popup"/><img src="<?php echo base_url(); ?>css/images/menu-icon.png"/></div>
                <div class="header-menu-icons"><input type="hidden" value="alert-popup"/><img src="<?php echo base_url(); ?>css/images/alert-icon.png"/></div>
                <div class="header-menu-icons"><input type="hidden" value="pm-popup"/> <img src="<?php echo base_url(); ?>css/images/pm-icon.png"/></div>
                <div style="float:right; position: relative; border-right:1px solid #001d44; padding-right: 5px;">Welcome, <?php echo $this->session->userdata('email'); ?></div>
            </div>
            <div id="pm-popup" class="popup-header">

            </div>
            <div id="alert-popup" class="popup-header">

            </div>
            <div id="menu-popup" class="popup-header">

            </div>
        </div>
        <script>
            $('.header-menu-icons').click(function(){
                var checkpicked = $(this).attr('class');
                $('.header-menu-icons').each(function(){
                    $(this).removeClass('header-menu-icons-picked');
                });
                $('.popup-header').each(function(){
                    $(this).removeClass('popup-header-active');
                });
                if(checkpicked.indexOf('header-menu-icons-picked')<=0)
                {
                    $(this).addClass('header-menu-icons-picked');
                    var popupid = $(this).find('input').val();
                    $('#'+popupid).addClass('popup-header-active');
                }
            });
        </script>
    <?php
    }
    ?>
</div>