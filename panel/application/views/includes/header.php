

 <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="<?php echo base_url("home") ?>">
                   <img src="<?php echo base_url("assets");?>/img/21268logo.png" alt="Metro Lab" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   <ul class="nav top-menu">
                       <!-- BEGIN SETTINGS -->
                       
                       <!-- END SETTINGS -->
                       
                       

                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img style="width: 30px; height: 30px;" alt="" src="<?php echo base_url("uploads");?>/user/<?php echo  $this->session->oturum_data['img_id'] ?>"  >
                               <span class="username" style="text-transform: uppercase;"><?php echo  $this->session->oturum_data['user'] ?></span>
                              <!--  <b class="caret"></b> -->
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo base_url("user"); ?>/detailPage/<?php echo  $this->session->oturum_data['userid'] ?>"><i class="icon-user"></i> Profilim</a></li>
                               <li><a href="<?php echo base_url("basket"); ?>"><i class=" icon-shopping-cart"></i> Sepetim</a></li>
                               <li><a href="<?php echo base_url("favorite"); ?>"><i class=" icon-heart-empty"></i> Favorilerim</a></li>
                               <li><a href="<?php echo base_url("receivedorder"); ?>"><i class=" icon-money"></i> Siparişlerim</a></li>
                               <li><a href="#"><i class="icon-cog"></i> Ayarlar</a></li>
                               <li><a href="<?php echo base_url("login/log_out"); ?>"><i class="icon-key"></i> Çıkış </a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->