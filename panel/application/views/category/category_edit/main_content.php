
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("category/update/$category->id"); ?>"
       class="form-horizontal" method="post">


        <div class="control-group">
                        <label class="control-label">Üst Kategori(*)</label>
                        <div class="controls">

                            <select type="text" class="span6" name="parent_id" >

                                <option selected> Üst Kategori Yok </option>

                          

                             <?php foreach ($parent_id as $parent) { ?>

                                <option value="<?php echo $parent->id; ?>"> 

                                    <?php echo $parent->title; ?>

                                </option>

                                

                            <?php } ?> 

                        </select>
                        </div>
                    </div>


       <div class="control-group">
        <label class="control-label">Kategori Adı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="title"  required="" minlength="4"
            value="<?php echo $category->title; ?>" 
            />           
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Açıklama</label>
        <div class="controls">
            <input type="text" class="span6 " name="description"  required="" minlength="4"
            value="<?php echo $category->description; ?>" 
            />           
        </div>
    </div>

   

     


    <div class="control-group">
        <label class="control-label">Aktif/Pasif</label>
        <div class="controls">
          <label class="checkbox line">
            <input type="checkbox" value="1" 
            name="isActive"
            <?php  echo ($category->isActive == 1) ? "checked" :"" ?>

            /> Aktif/Pasif
        </label>
        
    </div>
</div>



<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("category"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
