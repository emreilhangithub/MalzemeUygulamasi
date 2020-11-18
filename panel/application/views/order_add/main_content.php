
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("order/save"); ?>"
       class="form-horizontal" method="post">

       <!-- enctype="multipart/form-data" dosya gonderemeye yarar -->


    <div class="control-group">
        <label class="control-label">Fatura Numarası(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="invoice" required=""
             minlength="15"  maxlength="15" 
             />
        </div>
    </div>

      <div class="control-group">
        <label class="control-label">Açıklama(*)</label>
        <div class="controls">
            <textarea name="detail" id="" class="span6" required="" minlength="5"
            rows="10"></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Ürün(*)</label>
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
        <label class="control-label">Miktar(*)</label>
        <div class="controls">
            <input type="number" class="span2 " name="quantity" required="" pattern="\d*" 
            minlength="1" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Satış Fiyatı(*)</label>
        <div class="controls">
            <input type="number" class="span2 " name="price" required=""
            minlength="1" pattern="\d*" />
        </div>
    </div>



 




<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("order"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
