
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM --> 
    <form action="<?php echo base_url("user/update/$user->id"); ?>"
     class="form-horizontal" method="post" enctype="multipart/form-data">  


<div class="control-group">
    <label class="control-label">Kullanıcı Adı(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="user" readonly
        value="<?php echo $user->user; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Maili(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="email" required="" minlength="5"
        value="<?php echo $user->email; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Şifresi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="password" required="" minlength="5"
        value="<?php echo $user->password; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Adresi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="adress" required="" minlength="5"
        value="<?php echo $user->adress; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Telefonu(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="phone" required="" minlength="5"
        value="<?php echo $user->phone; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Şehri(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="city" required="" minlength="5"
        value="<?php echo $user->city; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Yetkisi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="authority" required="" minlength="5"
        value="<?php echo $user->authority; ?>" 
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Kayıt Tarihi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="registerdate" readonly
        value="<?php echo $user->registerdate; ?>" 
        />
    </div>
</div> 



<div class="control-group">
    <label class="control-label">Aktif/Pasif</label>
    <div class="controls">
      <label class="checkbox line">
        <input type="checkbox" value="1" 
        name="isActive"
        <?php  echo ($user->isActive == 1) ? "checked" :"" ?>
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
    href="<?php echo base_url("user"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
