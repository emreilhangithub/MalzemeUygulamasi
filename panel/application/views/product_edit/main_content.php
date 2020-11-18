
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("product/update/$product->id"); ?>"
       class="form-horizontal" method="post" enctype="multipart/form-data">


       <div class="control-group">
        <label class="control-label">Ürün Kodu (*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="code" required="" minlength="1"
            value="<?php echo $product->code; ?>" 
            />
        </div>
    </div>


       <div class="control-group">
        <label class="control-label">Ürün Adı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="title" required="" minlength="5"
            value="<?php echo $product->title; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Miktar(*)</label>
        <div class="controls">
            <input type="text" class="span6 " pattern="\d*" name="quantity" required=""
            value="<?php echo $product->quantity; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Alış Fiyatı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="list_price" required="" minlength="1"
            value="<?php echo $product->list_price; ?>" pattern="\d*"
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Satış Fiyatı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="sale_price" required="" minlength="1"
            value="<?php echo $product->sale_price; ?>"  pattern="\d*"
            />
        </div>
    </div>

      <div class="control-group"> &nbsp;&nbsp;&nbsp;
     <label class="control-label">KDV Oranını Giriniz(*)  </label>   
        <select name="kdv">
            <option value="0.01">%1</option>
            <option value="0.08">%8</option>
            <option value="0.18">%18</option>
        </select>
    </div>



    <div class="control-group">
        <label class="control-label">Aktif/Pasif</label>
        <div class="controls">
          <label class="checkbox line">
            <input type="checkbox" value="1" 
            name="isActive"
            <?php  echo ($product->isActive == 1) ? "checked" :"" ?>

            /> Aktif/Pasif
        </label>
        
    </div>
</div>


<div class="control-group">
        <label class="control-label">Kategori(*)</label>
        <div class="controls">

            <select type="text" class="span6" name="category_id">

             <?php foreach ($categories as $category) { ?>

                <option value="<?php echo $category->id; ?>"> 

                    <?php echo $category->title; ?>

                </option>

            <?php } ?> 

        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Tedarikçi(*)</label>
    <div class="controls">

        <select type="text" class="span6" name="supplier_id">

         <?php foreach ($suppliers as $supplier) { ?>

            <option value="<?php echo $supplier->id; ?>"> 

                <?php echo $supplier->title; ?>

            </option>

        <?php } ?> 

    </select>
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
    href="<?php echo base_url("product"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
