
<!-- BEGIN PAGE CONTENT-->

<div class="row-fluid">



<table class="table table-striped table-bordered table-advance table-hover">
        <thead>
        <tr>
            <th><i class="icon-sort-by-order"></i>Haber Numara</th>
            <th><i class=" icon-cogs"></i> Haber Tarihi</th>
            <th><i class=" icon-cogs"></i> Ürün Adı</th>
            <th><i class=" icon-cogs"></i> Haber Adı</th>
            <th><i class=" icon-cogs"></i> Haber Açıklama</th>            
            <th><i class=" icon-cogs"></i> Haberin Durumu </th>
            

            <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                <th><i class="icon-bookmark"></i> Profit</th> -->

            <th></th>
        </tr>       
        </thead>


      
        <tbody>

<?php  $haber=0; foreach ($posts as $row) { ?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->
   
    <?php $haber++; //dongu her dondugunde haber sayısı 1 artırdım  ?> 
    <?php  if ($haber>0) {  //eğer haber sayısı 0 dan büyükse ekrana bas ?>
    
    <tr>
    <td> <?php echo $row->newcastid; ?> </td> 
    <td> <?php echo $row->date; ?> </td> 
    <td>  <?php echo get_product_title($row->product_id); ?>  </td>
     <td> <?php echo $row->title; ?> </td>        

     <td>
            <?php 

            $description = $row->description;
            $strlen = strlen($description);

            if ($strlen > 40 ) {
                echo mb_substr($description, 0,40) . "...";
            }
            else
            {

                echo $description;
            }

             ?>
        </td>   

     
      <td> <?php  echo $row->isActive == 1 ? 'Aktif' : 'Pasif'; 
?>  </td>      

        
        <td>
            <a class="btn btn-success" href="<?php echo base_url("newscast/editPage/$row->newcastid") ?>">
                <i class="icon-eye-open"></i>
            </a>                               
            
        </td>
        
    </tr>
    <?php  }  

 else { ?>

  <?php echo "sadffsadfsadfsdafs"; ?>
<?php }?>


    

<?php  }  ?>

               
</tbody>



</table> <h1>Toplam Haber = <?php echo $haber;?> </h1>  



</div>


