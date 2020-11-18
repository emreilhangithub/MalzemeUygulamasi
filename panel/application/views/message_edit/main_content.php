
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("message/update/$contact->id"); ?>"
       class="form-horizontal" method="post">


       <div class="control-group">
        <label class="control-label">İsim(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="name" required="" maxlength="20" minlength="5"
            value="<?php echo $contact->name; ?>" 
            />
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Email(*)</label>
        <div class="controls">
            <input type="email" class="span6 " name="email" required="" 
            value="<?php echo $contact->email; ?>" 
            />
        </div>
    </div>
    

    <div class="control-group">
        <label class="control-label">Telefon(*)</label>
        <div class="controls">
            <input type="text" class="span6 " name="phone" required="" maxlength="11" minlength="11" pattern="\d{11}"
            value="<?php echo $contact->phone; ?>" 
            />
        </div>
    </div>

    

    <div class="control-group">
        <label class="control-label">Mesaj(*)</label>
        <div class="controls">
            <input class="span6 " name="message" required="" maxlength="200" minlength="5"
            cols="30" rows="10" value="<?php echo $contact->message; ?>" 
            > 
        </div>
    </div>


<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("message"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
