
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("user/save"); ?>"
       class="form-horizontal" method="post" enctype="multipart/form-data">

       <!-- enctype="multipart/form-data" dosya gonderemeye yarar -->         

       <div class="control-group">
    <label class="control-label">Kullanıcı Adı(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="user"  required="" minlength="5"/>
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Maili(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="email" required="" minlength="5"
       
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Şifresi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="password" required="" minlength="5"
      
        />
    </div>
</div> 

<div class="control-group">
                                <label class="control-label">Kullanıcı Adres(*)</label>
                                <div class="controls">
                                    <textarea name="adress" id="" class="span6" 
                                    cols="30" rows="10" required="" minlength="5"></textarea>
                                </div>
                            </div>


<div class="control-group">
    <label class="control-label">Kullanıcı Telefonu(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="phone" required="" minlength="5"
       
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Şehri(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="city" required="" minlength="5"
       
        />
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Kullanıcı Yetkisi(*)</label>
    <div class="controls">
        <input type="text" class="span6 " name="authority" required="" minlength="5"
    
        />
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
