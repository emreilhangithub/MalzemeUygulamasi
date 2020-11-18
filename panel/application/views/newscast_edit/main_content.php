
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM --> 
    <form action="<?php echo base_url("newscast/update/$newscast->id"); ?>"
     class="form-horizontal" method="post" enctype="multipart/form-data">  


     <div class="control-group">
        <label class="control-label">Ürün Seçiniz(*)</label>
        <div class="controls">

            <select type="text" class="span6" name="product_id">

                <?php foreach ($products as $product) { ?>

                <option value="<?php echo $product->id; ?>"> 

                    <?php echo $product->title; ?>

                </option>


                <!-- <option <?php if ($product->id==$newscast->id) { echo "selected='select'"; } ?> value="<?php echo $product->id ?>"><?php echo $product->title; ?></option> -->




            <?php } ?>  
    

                       


        </select>
    </div>
</div>   


<div class="control-group">
    <label class="control-label">Haberin Adı(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="title" required="" minlength="5"
        value="<?php echo $newscast->title; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Haberin Detay(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="description" required="" minlength="5"
        value="<?php echo $newscast->description; ?>" 
        />
    </div>
</div>  

<div class="control-group">
    <label class="control-label">Anahtar Kelime(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="keyword" required="" minlength="5"
        value="<?php echo $newscast->keyword; ?>" 
        />
    </div>
</div> 



<div class="control-group">
    <label class="control-label">Aktif/Pasif</label>
    <div class="controls">
      <label class="checkbox line">
        <input type="checkbox" value="1" 
        name="isActive"
        <?php  echo ($newscast->isActive == 1) ? "checked" :"" ?>
        /> Aktif/Pasif
    </label>        
</div>
</div>

<div class="control-group">
    <label class="control-label">Resim(*)</label>
    <div class="controls">
        <input type="file" name="img_id" required=""> 
    </div>
</div>



<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("newscast"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
