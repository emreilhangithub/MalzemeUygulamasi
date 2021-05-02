
            <!-- BEGIN PAGE CONTENT-->

            
             <div class="row-fluid">
                
                <!-- BEGIN FORM-->
                 <form action="<?php echo base_url("category/save"); ?>"
                       class="form-horizontal" method="post">

                      <div class="control-group">
                        <label class="control-label">Üst Kategori(*)</label>
                        <div class="controls">

                            <select type="text" class="span6" name="parent_id" >

                                <option selected> Ana Kategori </option>

                          

                             <?php foreach ($categories as $category) { ?>

                                <option value="<?php echo $category->id; ?>"> 

                                    <?php echo $category->title; ?>

                                </option>

                                

                            <?php } ?> 

                        </select>
                        </div>
                    </div>

                            <div class="control-group">
                                <label class="control-label">Kategori Adı(*)</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="title" 
                                    required="" minlength="4"
                                    />                                   
                                </div>
                            </div>

                           

                            <div class="control-group">
                                <label class="control-label">Açıklama</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="description" 
                                     minlength="2"
                                    />                                   
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
         