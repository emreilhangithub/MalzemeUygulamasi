
            <!-- BEGIN PAGE CONTENT-->

            
             <div class="row-fluid">
                
                <!-- BEGIN FORM-->
                            <form action="<?php echo base_url("supplier/save"); ?>"
                             class="form-horizontal" method="post">

                            <div class="control-group">
                                <label class="control-label">Tedarikçi Adı(*)</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="title" 
                                    required="" minlength="5"
                                    />                                    
                                </div>
                            </div>

                             <div class="control-group">
                                <label class="control-label">Telefon(*)</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="phone" 
                                    required="" pattern="\d{11}" maxlength="11" minlength="11"   
                                    />                                    
                                </div>
                            </div>

                             <div class="control-group">
                                <label class="control-label">Email(*)</label>
                                <div class="controls">
                                    <input type="email" class="span6 " name="email" 
                                    required="" minlength="5"
                                    />
                                </div>
                            </div>


                              <div class="control-group">
                                <label class="control-label">Adres(*)</label>
                                <div class="controls">
                                    <textarea name="adress" id="" class="span6" 
                                    cols="30" rows="10" required="" minlength="5"></textarea>
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
         