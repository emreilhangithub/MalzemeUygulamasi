
<div class="row-fluid">

<!-- BEGIN FORM-->
<form class="form-horizontal">  

   <div class="control-group">
    <label class="control-label">Kullanıcı Id =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->id; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Adı =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->user; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Durumu = </label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php  echo $user->isActive == 1 ? 'Aktif' : 'Pasif'; 
 ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Maili =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->email; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Şifresi =</label>
    <div class="controls">
        <input type="password" class="span3 " readonly
        value="<?php echo $user->password; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Adresi =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->adress; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcı Telefonu =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->phone; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcının Şehri =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->city; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcının Yetkisi =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->authority; ?>" 
        />
    </div>
</div>

<div class="control-group">
    <label class="control-label">Kullanıcının Kayıt Tarihi =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->registerdate; ?>" 
        />
    </div>
</div>


<div class="control-group">
    <label class="control-label">Kullanıcı Fotoğrafı =</label>
    <div class="controls">
        <input type="text" class="span3 " readonly
        value="<?php echo $user->img_id; ?>" 
        />
    </div>
</div> 


<?php 

$image = FCPATH . "uploads/user/$user->img_id";

if (file_exists($image)) {  ?>
    
    <img width="200" height="200" src="<?php echo base_url("uploads/user/$user->img_id"); ?>" 

     alt="<?php echo $user->user; ?>">                     

<?php } else { ?> 

<img   width="200" height="200" src="<?php echo base_url("uploads/user/default.jpg"); ?>" alt="Resim Yok">  

 
<?php  } ?> 



<div class="form-actions">
<a type="button" class="btn" 
href="<?php echo base_url("user"); ?>">Vazgeç</a>
</div>

</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
