
<div class="row-fluid">

<!-- BEGIN FORM-->
<form class="form-horizontal">  

   <div class="control-group">
    <label class="control-label">Kategori Id =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $category->id; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Üst Kategori Adı =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $category->parent_id; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Title =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $category->title; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Descrition =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $category->description; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kategori Durumu = </label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php  echo $category->isActive == 1 ? 'Aktif' : 'Pasif'; 
 ?>" 
        />
    </div>
</div>

<div class="form-actions">
<a type="button" class="btn" 
href="<?php echo base_url("category"); ?>">Vazgeç</a>
</div>

</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
