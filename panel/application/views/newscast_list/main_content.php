    <style>.pagination a, .pagination strong {

        padding: 5px;
        border: 1px solid #ccc;
        margin-left: 5px;
        text-decoration: none;
        box-shadow:0px 0px 8px rgba(5,5,5,0.3); 

    }

    .pagination strong {

        background-color: #35a5f2;
    }

    .title {
        text-transform: uppercase;
    }


    </style>

    <!-- BEGIN GRID SAMPLE PORTLET-->
    <h3><?php echo "Toplam Haber Sayımız = " . $toplam; ?></h3>
    
    <a href="<?php echo base_url("newscast/newPage"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

    <?php foreach ($newscasts as $newscast) {  ?>    
        <div class="row-fluid">
           <div class="span8">
            <div class="widget green">
                <div class="widget-title">
                    <h4 class="title"><i class="icon-reorder"></i> <?php echo $newscast->title ; ?></h4>
                    <span class="tools">            
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="btn btn-mini btn-success" 
                        href="<?php echo base_url("newscast/editPage/$newscast->id") ?>">
                        <i class="icon-pencil"></i>
                    </a>       
                    <a class="btn btn-mini btn-success" 
                    href="<?php echo base_url("newscast/delete/$newscast->id") ?>">
                    <i class="icon-trash"></i>
                </a>        
                
            </span>
        </div>
        <div class="widget-body">  
           <p style="color: red">              
            <?php echo get_product_title($newscast->product_id); ?>              <?php echo $newscast->date; ?>   
            <input class = "toggle_check"
            data-onstyle="success"
            data-height="10"
            data-size = "mini"
            data-on="Aktif"
            data-off="Pasif"
            data-offstyle="danger"
            type="checkbox"
            data-toggle="toggle"
            dataID="<?php echo $newscast->id; ?>"
            <?php echo ($newscast->isActive == 1) ? "checked" : ""; ?>
            >          
        </p>
        <p>
            <?php echo $newscast->description; ?> 
        </p>

        <?php 
        $image = FCPATH . "uploads/newscast/$newscast->img_id";

        if (file_exists($image)) {  ?>
            
            <img width="650" height="343" src="<?php echo base_url("uploads/newscast/$newscast->img_id"); ?> " 

            alt="<?php echo $newscast->title; ?>">                     

        <?php } else { ?> 

            <img width="650" height="343" src="<?php echo base_url("assets/img/haberyok.jpg"); ?>" alt="<?php echo $newscast->title; ?>">  

            
            <?php  } ?> <br><br>

            
            <code> <?php echo $newscast->keyword; ?> </code> <br> <br>             
        </div>
    </div>
    <!-- END GRID PORTLET-->
</div>
</div>



<?php } ?>

<p class="pagination"> <?php echo "$links"; ?></p>






