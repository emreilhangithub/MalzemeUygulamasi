
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("contact"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>
                <th><i class="icon-bullhorn"></i>İsim</th>
                <th><i class=" icon-cogs"></i> Email</th>
                <th><i class=" icon-phone"></i>Telefon</th>                
                <th><i class=" icon-cogs"></i> Mesaj</th>

                <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Profit</th> -->

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($contacts as $contact) { ?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->



                <tr>
                    <td>
                      #<?php echo $contact->id; ?>  
                  </td>
                  <td>
                    <?php echo $contact->name; ?>
                </td>               
                <td>
                    <?php echo $contact->email; ?>
                </td>
                 <td>
                    <?php echo $contact->phone; ?>
                </td>

                  <td>
                    <?php 

                    $message = $contact->message;
                    $strlen = strlen($message);

                    if ($strlen > 30 ) {
                        echo mb_substr($message, 0,30) . "...";
                    }
                    else
                    {

                        echo $message;
                    }

                     ?>
                </td>
                                

            <td>
               
                <a class="btn btn-primary" 
                href="<?php echo base_url("message/editPage/$contact->id") ?>">
                    <i class="icon-pencil"></i>
                </a>
                <a class="btn btn-danger removeBtn"
                 dataURL="<?php echo base_url("message/delete/$contact->id") ?>">
                    <i class="icon-trash "></i>
                </a>
            </td>
        </tr>

    <?php  }  ?>


</tbody>
</table>



</div>
<!-- END PAGE CONTENT-->
