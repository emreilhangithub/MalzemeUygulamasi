
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    
       <table border="1">
        <tbody>
                
            <tr>
                <td>Ürün Kodu = </td><td><?php echo $product->code; ?></td>
            </tr>
            <tr>
                <td>Ürün Adı = </td><td><?php echo $product->titlee; ?></td>
            </tr>
            <tr>
                <td>Miktar = </td><td><?php echo $product->quantity; ?></td>
            </tr>
            <tr>
                <td>Alış Fiyatı = </td><td><?php echo $product->total_list; ?></td>
            </tr>
            <tr>
                <td>Satış Fiyatı = </td><td><?php echo $product->total_sale; ?></td>
            </tr>
            <tr>
                <td>KDV Oranını = </td><td><?php echo $product->kdv; ?></td>
            </tr>
             <tr>
               <td>Kategori Adı = </td>  <td><?php echo get_category_title($product->category_id); ?></td>
            </tr>
             <tr>
              <td>Tedatikçi Adı = </td> <td> <?php echo get_supplier_title($product->supplier_id); ?></td>
            </tr>
             <tr>
              <td>Durum = </td>  <td><?php  echo ($product->isActive == 1) ? "Aktif" :"Pasif" ?> </td>       
             </tr>
           
           
        </tbody>          


       </table>



       <br>
<!-- /$product->productid -->


       <?php if ($this->session->flashdata('sepet')) {?>

             <div class="widget-body">
                            <div class="alert  alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Başarılı!</strong> <?php echo $this->session->flashdata('sepet'); ?>
                            </div>
                        </div>
              
            <?php  } ?>


 <form action="<?php echo base_url("basket/save/$product->productid"); ?>"
       class="form-horizontal" method="post"> 

       <span>Adet </span><input type="text" name="basket_quentity" value="1" >   

       <div class="form-actions">

        <?php if ($product->isActive == 1) {?>

               <button type="submit" class="btn btn-success">Sepete Ekle</button>
             
              
            <?php  } ?>

       
   
    <a type="button" class="btn" 
    href="<?php echo base_url("product"); ?>">Vazgeç</a>
    </div>
       
       </form>  




      






<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
