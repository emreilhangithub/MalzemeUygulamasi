
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("product/save"); ?>"
       class="form-horizontal" method="post" enctype="multipart/form-data">

       <!-- enctype="multipart/form-data" dosya gonderemeye yarar -->

       <div class="control-group">
        <label class="control-label">Ürün Adı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="title" required="" minlength="5" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Ürün Kodu(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="code" required="" minlength="1" />
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Detay(*) </label>
        <div class="controls">
            <textarea name="detail" id="" class="span6" required="" minlength="5"
            rows="10"></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Miktar(*)</label>
        <div class="controls">
            <input type="number" class="span2 " name="quantity" required="" minlength="1"
            pattern="\d"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Liste Fiyatı(*)</label>
        <div class="controls">
            <input type="number" class="span2 " name="list_price" required="" minlength="1"
            pattern="\d" />
        </div>
    </div>



    <div class="control-group">
        <label class="control-label">Satış Fiyatı(*)</label>
        <div class="controls">
            <input type="number" class="span2 " name="sale_price" required="" minlength="1"
            pattern="\d" />
        </div>
    </div>

   <!--  <div class="control-group"> &nbsp;&nbsp;&nbsp;
     <label class="control-label">KDV Oranını Giriniz(*)  </label>   
        <input type="radio" name="kdv" value="0.01" />%1
        <input type="radio" name="kdv" value="0.08" />%8
        <input type="radio" name="kdv" value="0.18""/>%18
    </div> -->

    <div class="control-group"> &nbsp;&nbsp;&nbsp;
     <label class="control-label">KDV Oranını Giriniz(*)  </label>   
        <select name="kdv">
            <option value="0.01">%1</option>
            <option value="0.08">%8</option>
            <option value="0.18">%18</option>
        </select>
    </div>

    <div class="control-group">
        <label class="control-label">Kategori(*)</label>
        <div class="controls">

            <select type="text" class="span6" name="category_id">

             <?php foreach ($categories as $category) { ?>

                <option value="<?php echo $category->kategori_id; ?>"> 

                    <?php echo $category->kategori_adi; ?>

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
    href="<?php echo base_url("supplier"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
