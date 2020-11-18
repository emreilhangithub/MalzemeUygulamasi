
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("newscast/save"); ?>"
       class="form-horizontal" method="post" enctype="multipart/form-data">

       <!-- enctype="multipart/form-data" dosya gonderemeye yarar -->

          <div class="control-group">
        <label class="control-label">Ürün Seçiniz(*)</label>
        <div class="controls">

            <select type="text" class="span6" name="product_id">

             <?php foreach ($products as $product) { ?>

                <option value="<?php echo $product->id; ?>"> 

                    <?php echo $product->title; ?>

                </option>

            <?php } ?> 

        </select>
    </div>
</div>


       <div class="control-group">
        <label class="control-label">Haberin Adı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="title" required="" minlength="5" />
        </div>
    </div>  


    <div class="control-group">
        <label class="control-label">Haberin Detay(*) </label>
        <div class="controls">
            <textarea name="description" id="" class="span6" required="" minlength="5"
            rows="10"></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Anahtar Kelime(*) </label>
        <div class="controls">
            <input type="text" class="span6 " name="keyword" required="" minlength="5" />           
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
    href="<?php echo base_url("supplier"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
