
<!-- BEGIN PAGE CONTENT-->


<!-- <a href="<?php echo base_url("category/newPage"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br> -->

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>
				
                <th><i class="icon-sort-by-order"></i>Üst Kategori</th>
            
                <th><i class=" icon-cogs"></i> Title</th>
				
                <th><i class=" icon-cogs"></i> Descrition </th>
				
                <th><i class=" icon-cogs"></i> Durum </th>
				
                <th><i class=" icon-cogs"></i> İşlemler </th>

                <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Profit</th> -->

                    <th></th>
                </tr>
            </thead>
            <tbody>
 
                <?php foreach ($rows as $row) { 
				//echo "<pre>";
				//print_r($row);
				//die;
				?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->



                <tr>
                  <td>
                      <?php echo $row->id; ?>  
                  </td>
				  <td>
                      <?php echo $row->parent_id; ?>  
                  </td>
				  </td>
				  <td>
                      <?php echo $row->title; ?>  
                  </td>
                  <td>
                    <?php echo $row->description; ?>
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
                    dataID="<?php echo $row->id; ?>"
                    <?php echo ($row->isActive == 1) ? "checked" : ""; ?>
                    >
                </td>
            <!-- checked demek secili demek checked dedigimiz için otamatik secili gelmişti-->
            <td>
               <a class="btn btn-success"
                 href="<?php echo base_url("category/detailPage/$row->id") ?>">
                    <i class="icon-eye-open"></i>
                </a>
                <a class="btn btn-danger"
                 href="<?php echo base_url("category/delete/$row->id") ?>">
                    <i class="icon-trash "></i>
                </a>
            </td>
              
                  </tr>

    <?php  }  ?>


</tbody>
</table>



</div>
<!-- END PAGE CONTENT-->
