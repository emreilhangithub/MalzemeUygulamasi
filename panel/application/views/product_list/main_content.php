
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

                <th><i class=" icon-edit"></i>Durum</th>
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
                      <?php echo $row->id; ?>  
                  </td>


                  <td>
                    <?php 

                    $image = FCPATH . "uploads/product/$row->img_id";

                    if (file_exists($image)) {  ?>
                        
                        <img src="<?php echo base_url("uploads/product/$row->img_id"); ?>" 

                         alt="<?php echo $row->title; ?>">                     

                   <?php } else { ?> 

                    <img src="<?php echo base_url("assets/img/logo.png"); ?>" alt="Mustafa Emre">  

                     
                    <?php  } ?> 
                        
                                        
                  </td>
                  <td>
                    <?php echo $row->code; ?>
                </td>
                <td>
                    <?php echo $row->title; ?>
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
                    <input class = "toggle_check"
                    data-onstyle="success"
                    data-size = "mini"
                    data-on="Aktif"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    data-toggle="toggle"
                    dataID="<?php echo $row->id; ?>"
                    <?php echo ($row->isActive == 1) ? "checked" : ""; ?>
                    >
                </td>
            <!-- checked demek secili demek checked dedigimiz için otamatik secili gelmişti-->
            <td>
               
                <a class="btn btn-primary" 
                href="<?php echo base_url("product/editPage/$row->id") ?>">
                    <i class="icon-pencil"></i>
                </a>
                <a class="btn btn-danger"
                 href="<?php echo base_url("product/delete/$row->id") ?>">
                    <i class="icon-trash "></i>
                </a>
            </td>
        </tr>

    <?php  }  ?>


</tbody>
</table>



</div>
<!-- END PAGE CONTENT-->
