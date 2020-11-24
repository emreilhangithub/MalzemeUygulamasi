
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("user/newPage"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

<div class="user-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>              
                <th width="100"><i class="icon-image"></i>Kullanıcı Adı</th>
                <th><i class="icon-bullhorn"></i>Mail</th>                

                <th><i class="icon-bullhorn"></i>Tarih</th>
                <th><i class="icon-bullhorn"></i>Yetki</th>

                <th><i class=" icon-edit"></i>Durum</th>
                <th><i class=" icon-cogs"></i> İşlemler</th>

                <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Profit</th> -->

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($users as $user) { ?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->



                <tr>
                    <td>
                      <?php echo $user->id; ?>  
                  </td>
                <td>
                    <?php echo $user->user; ?>
                </td>
               <td>
                    <?php echo $user->email; ?>
                </td>
                
                <td>
                    <?php echo $user->registerdate; ?>
                </td>
                 <td>
                    <?php echo $user->authority; ?>
                </td>
               

                
                <td>
                    <input class = "toggle_check"
                    data-onstyle="success"
                    data-size = "mini"
                    data-on="Aktif"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    data-toggle="toggle"
                    dataID="<?php echo $user->id; ?>"
                    <?php echo ($user->isActive == 1) ? "checked" : ""; ?>
                    >
                </td>
            <!-- checked demek secili demek checked dedigimiz için otamatik secili gelmişti-->
            <td>
               <a class="btn btn-success"
                 href="<?php echo base_url("user/detailPage/$user->id") ?>">
                    <i class="icon-eye-open"></i>
                </a>
                <a class="btn btn-primary" 
                href="<?php echo base_url("user/editPage/$user->id") ?>">
                    <i class="icon-pencil"></i>
                </a>
                <a class="btn btn-danger"
                 href="<?php echo base_url("user/delete/$user->id") ?>">
                    <i class="icon-trash "></i>
                </a>
            </td>
        </tr>

    <?php  }  ?>


</tbody>
</table>



</div>
<!-- END PAGE CONTENT-->
