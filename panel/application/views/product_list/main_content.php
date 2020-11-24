
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("product/newPage"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>
                <th width="100"><i class="icon-image"></i>Resim</th>
                <th><i class="icon-bullhorn"></i>Kodu</th>
                <th><i class="icon-shield"></i>Ürün Adı</th>

                <th><i class="icon-bullhorn"></i>Kategori</th>
                <th><i class="icon-bullhorn"></i>Tedarikçi</th>

                 <th><i class="icon-info"></i>Miktar</th>
                 <th><i class="icon-money"></i>Alış Fiyatı</th>
                 <th><i class="icon-money"></i>Satış Fiyatı</th>

               <?php if ($this->session->oturum_data['authority'] == "admin") {?>  <th><i class=" icon-edit"></i>Durum</th>   <?php  } ?>
                 <th><i class=" icon-cogs"></i> İşlemler</th>

                <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Profit</th> -->

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($rows as $row) { ?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->



                <tr>
                    <td>
                      <?php echo $row->productid; ?>  
                  </td>


                  <td>
                    <?php 

                    $image = FCPATH . "uploads/product/$row->img_id";

                    if (file_exists($image)) {  ?>
                        
                        <img src="<?php echo base_url("uploads/product/$row->img_id"); ?>" 

                         alt="<?php echo $row->titlee; ?>">                     

                   <?php } else { ?> 

                    <img src="<?php echo base_url("assets/img/logo.png"); ?>" alt="Mustafa Emre">  

                     
                    <?php  } ?> 
                        
                                        
                  </td>
                  <td>
                    <?php echo $row->code; ?>
                </td>
                <td>
                    <?php echo $row->titlee; ?>
                </td>
                <td>
                    <?php echo get_category_title($row->category_id); ?>
                </td>
                <td>
                    <?php echo get_supplier_title($row->supplier_id); ?>
                </td>
                <td>
                    <?php echo $row->quantity; ?>
                </td>
                <td>
                    <?php echo $row->total_list; ?>
                </td>                
                <td>
                    <?php echo $row->total_sale; ?>
                </td>
                
                <td>
                    <?php if ($this->session->oturum_data['authority'] == "admin") {?>
                    <input class = "toggle_check"
                    data-onstyle="success"
                    data-size = "mini"
                    data-on="Aktif"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    data-toggle="toggle"
                    dataID="<?php echo $row->productid; ?>"
                    <?php echo ($row->isActive == 1) ? "checked" : ""; ?>
                    >
                      <?php  } ?>
                </td>
            <!-- checked demek secili demek checked dedigimiz için otamatik secili gelmişti-->
            <td>

                

              <a class="btn btn-success"
                 href="<?php echo base_url("product/detailPage/$row->productid") ?>">
                    <i class="icon-eye-open"></i>
                </a>
             

             <?php if ($this->session->oturum_data['authority'] == "admin") {?>

             <a class="btn btn-primary" 
                href="<?php echo base_url("product/editPage/$row->productid") ?>">
                    <i class="icon-pencil"></i>
                </a>
                <a class="btn btn-danger" onclick="return confirm('Silmek istediginizden emin misiniz ?');"
                 href="<?php echo base_url("product/delete/$row->productid") ?>">
                    <i class="icon-trash "></i>
                </a>
             
              
            <?php  } ?>

               
                
            </td>
        </tr>

    <?php  }  ?>


</tbody>
</table>



</div>


<!-- END PAGE CONTENT-->
