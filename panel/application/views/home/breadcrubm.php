 <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Anasayfa
                   </h3>

                    <?php if ($this->session->flashdata('giris')) {?>

             <div class="widget-body">
                            <div class="alert  alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Başarılı!</strong> <?php echo $this->session->flashdata('giris'); 
                                echo "&nbsp;"; 
                                 echo $this->session->oturum_data['user'] ; ?>
                            </div>
                        </div>
              
            <?php  } ?>
                  <!--  <ul class="breadcrumb">
                       <li>
                           <a href="#">Anasayfa</a>
                           <span class="divider">/</span>
                       </li>
                        <li>
                           <a href="#">Sample Pages</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Blank
                       </li> 
                       <li class="pull-right search-wrap">
                           <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->