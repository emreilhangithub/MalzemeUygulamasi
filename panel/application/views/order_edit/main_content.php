
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("order/update/$order->id"); ?>"
       class="form-horizontal" method="post">


       <div class="control-group">
        <label class="control-label">Fatura Numarası(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="invoice" required=""
              minlength="15"  maxlength="15"
            value="<?php echo $order->invoice; ?>" 
            />
        </div>
    </div>


       <div class="control-group">
        <label class="control-label">Açıklama(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="detail" required="" minlength="5"
            value="<?php echo $order->detail; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Miktar(*)</label>
        <div class="controls">
            <input type="text" class="span6 " pattern="\d*" name="quantity" required=""
            pattern="\d*" 
            minlength="1"
            value="<?php echo $order->quantity; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Satış Fiyatı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="price" required="" minlength="1"
            value="<?php echo $order->price; ?>" pattern="\d*"
            />
        </div>
    </div>




<div class="control-group">
        <label class="control-label">Ürün(*)</label>
        <div class="controls">

            <select type="text" class="span6" name="product_id">

             <?php foreach ($products as $product) { ?>

                <option value="<?php echo $product->id; ?>"> 

                    <?php echo $product->titlee; ?>

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



<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("order"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
