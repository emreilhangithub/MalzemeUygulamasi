
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("supplier/update/$supplier->supplierid"); ?>"
       class="form-horizontal" method="post">


       <div class="control-group">
        <label class="control-label">Tedarikçi Adı(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="title" required="" minlength="5"
            value="<?php echo $supplier->title; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Adres(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="adress" required="" minlength="5"
            value="<?php echo $supplier->adress; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Telefon(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="phone"  required="" pattern="\d{11}"  maxlength="11" minlength="11"          value="<?php echo $supplier->phone; ?>" 
            />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Email(*)</label>
        <div class="controls">
            <input type="email" class="span6 " name="email" required="" minlength="5"
            value="<?php echo $supplier->email; ?>" 
            />
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Aktif/Pasif</label>
        <div class="controls">
          <label class="checkbox line">
            <input type="checkbox" value="1" 
            name="isActive"
            <?php  echo ($supplier->isActive == 1) ? "checked" :"" ?>

            /> Aktif/Pasif
        </label>
        
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
