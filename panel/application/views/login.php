<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <?php $this->load->view("includes/head"); ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="<?php echo base_url("login"); ?>">
            <img class="center" alt="logo" src="<?php echo base_url("assets/img/21268logo.png"); ?>">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>

        <form action="<?php echo base_url("login/login_ol"); ?>" method="post">
        <div class="metro double-size green">            
                <div class="input-append lock-input">
                    <input type="email" name="email" placeholder="E mail Giriniz">
                </div>            
        </div>

        <div class="metro double-size yellow">            
                <div class="input-append lock-input">
                    <input type="password" name="password" placeholder="Şifre Giriniz">
                </div>            
        </div>


        <div class="metro single-size terques login">            
                <button type="submit" class="btn login-btn">
                    Giriş Yap
                    <i class=" icon-long-arrow-right"></i>
                </button>            
        </div>
        </form>


        <br><br><br><br><br><br><br><br>
           <?php if ($this->session->flashdata('login_hata')) {?>

             <div class="widget-body">
                            <div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Hata!</strong> <?php echo $this->session->flashdata('login_hata'); ?>
                            </div>
                        </div>
              
            <?php  } ?>

            <!-- <?php if ($this->session->flashdata('exitokey')) {?>

             <div class="widget-body">
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Başarılı!</strong> <?php echo $this->session->flashdata('exitokey'); ?>
                            </div>
                        </div>
              
            <?php  } ?> -->
                
           

                        
                           <!--  <div class="alert">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Warning!</strong> Best check yo self, you're not looking too good.
                            </div>
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Success!</strong> You successfully read this important message.
                            </div>
                            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Info!</strong> Heads up! This alert needs your attention.
                            </div> -->
                            
       
        
        <!-- <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" id=""> Beni Hatırla
            </div>
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Şifremi Unuttum</a>
            </div>
        </div> -->
    </div>
</body>
<!-- END BODY -->
</html>