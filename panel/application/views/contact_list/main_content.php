
<!-- BEGIN PAGE CONTENT-->




<div class="row-fluid">
    <div class="span12">
    <div class="widget">

      <div class="widget-title">
           <h4><i class="icon-envelope"></i> İletişim </h4>
           <span class="tools">
             <a href="javascript:;" class="icon-chevron-down"></a>
             <a href="javascript:;" class="icon-remove"></a>
         </span>
     </div>

         <div class="widget-body">

       

     <div class="contact-us"> 

       <div class="row-fluid">
           <div class="feedback">
                <br>
               <h3>Mesaj</h3>
               <p>Bize uılaşmak için mesajınızı yazabilirsiniz </p>
               

               <form class="form-inline"
               action="<?php echo base_url("contact/save"); ?>"
               method="post"
               >
               <div class="control-group">
                   <input type="text" placeholder="İsim(*)" class="span12" name="name" required="" maxlength="20" minlength="5"> 
               </div>
               <div class="control-group ">
                   <input type="email" placeholder="Email(*)" class="span6 one-half" name="email" required="" maxlength="50">
                   <input type="text" placeholder="Telefon(*)" class="span6" name="phone" required="" maxlength="11" minlength="11" pattern="\d{11}">
               </div>
               <div class="control-group">
                   <textarea placeholder="Mesajınız(*)" class="span12" rows="5" name="message" required="" maxlength="100"></textarea>
               </div>
               <div class="text-center">
                   <button type="submit" class="btn btn-success">Kaydet</button>
                   <a type="button" class="btn" 
                   href="<?php echo base_url("contact"); ?>">Vazgeç</a>
               </div>
           </form>
       </div>
   </div>

   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.7895886488177!2d29.183533814693508!3d40.92035917930975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac5a57cae0cb1%3A0xd34864b763d8d5cd!2sBTI%20Bilisim%20danismanlik%20hizmetleri%20ltd.!5e0!3m2!1str!2str!4v1603364104380!5m2!1str!2str" width="1030" height="450" align="center" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
</div>
</div>
</div>
</div>
<!-- END PAGE CONTENT-->
