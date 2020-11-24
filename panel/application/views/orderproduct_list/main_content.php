
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("product"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

    <table border="1">
      
      <th>İsim</th>
      <th>Adresi</th>
      <th>Telefonu</th>
      <th>Şehir</th>
      <th>Toplam Tutar</th>

    </table>


    <h3> Adres Bilgileri </h3>   

    
     
   
       <?php foreach ($getir as $get ) { ?>
      
            <input type="text" name="orderadress" value="<?php echo $get->ordername; ?>" >   
        =   <input type="text" name="orderadress" value="<?php echo $get->orderadress; ?>" >   <br>
        =   <input type="text" name="orderphone" value="<?php echo $get->orderphone; ?>" >  <br>
        =   <input type="text" name="ordercity" value="<?php echo $get->ordercity; ?>" >   <br>
        =   <input type="text" value="<?php echo $get->total_amount; ?>" > 

        <h3> Ödeme Bilgileri </h3>   

       Kredi Kartı  Kart No =  <input type="text" name="cardno" value="<?php echo $get->user; ?>">  <br>
       SKT AY =   <input type="text" name="moon" value="<?php echo $get->user; ?>">   <br>
       SKT YIL =   <input type="text" name="year" value="<?php echo $get->user; ?>">  <br>
       Güvenkik Kodu =   <input type="text" name="scode" value="<?php echo $get->user; ?>"> 

         <?php  } ?>

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>
                <th><i class="icon-sort-by-order"></i>Ürün Adı</th>
                <!-- <th><i class="icon-calendar"></i>Ürürün Tarihi</th>  -->
                <th><i class="icon-calendar"></i>Fiyat</th> 
                <th><i class="icon-calendar"></i>Miktar</th> 
                <th><i class="icon-calendar"></i>Toplam Tutar</th> 
               <!--  <th><i class="icon-bullhorn"></i>İsim Soyisim</th>
                <th><i class="icon-bullhorn"></i>Adress</th>
                <th><i class="icon-phone"></i>Telefon</th>
                <th><i class="icon-cogs"></i> Fiyat</th>
                <th><i class="icon-phone"></i>Şehir</th>                
                <th><i class="icon-calendar"></i>Tarih</th>               
                <th><i class="icon-phone"></i>Kargo</th>                
                <th><i class="icon-phone"></i>TakipN.</th>                
                <th><i class="icon-phone"></i>Durum</th>  -->               
                <th><i class="icon-phone"></i>İşlem</th>                
                              
               <!--  <th><i class=" icon-cogs"></i> Statü</th> -->

                <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Profit</th> -->

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $sn=0;//urunleri sıraya sokmak için kullandık
                $top=0; //toplamı ogrenmek için kullandık
                $urun=0;//urun sayısını ogrenmek için kullandık
                $tutar =0;
                foreach ($listele as $liste) 
                  {  $sn++; 
                     $urun++;                     
                     //$tutar = $liste->total_amount; // urunun fiyatı * miktar = tutara 
                    // $top+=$tutar;  //toplam=toplam+tutar demektedir yani toplam tutarı aldırır bize                     
                    ?> 




                <tr>
                    <!-- <td>
                      #<?php echo $liste->basket_id; ?> Sepet numarası bunu kullanmıyacagız 
                  </td> -->
                    <!-- <td> 
                    #<?php echo $top; ?>
                  </td>   -->
                   <td> 
                    #<?php echo $sn; ?> 
                  </td> 
                   <!--  <td> 
                    <?php echo $liste->order_id; ?> //Ürünün idsi ürünün detaylı inceleyebiliriz istersek 
                  </td> --> 
                    <!-- <td> 
                    <?php echo $liste->op_date; ?> 
                  </td>  -->
                 
                   <td> 
                    <?php echo $liste->op_name; ?> 
                  </td> 
                  <td> 
                    <?php echo $liste->op_price; ?> 
                  </td> 
                  <td> 
                    <?php echo $liste->op_quantity; ?> 
                  </td> 
                  <td> 
                    <?php echo $liste->op_amount; ?> 
                  </td> 

                  
                  <!--  <td> 
                    <?php echo $liste->ordername; ?> 
                  </td>
                  <td>
                  <?php 

                    $adress = $liste->orderadress;
                    $strlen = strlen($adress);

                    if ($strlen > 30 ) {
                        echo mb_substr($adress, 0,30) . "..";
                    }
                    else
                    {

                        echo $adress;
                    }

                     ?>
                     </td> -->
                   <!-- <td> 
                    <?php echo $liste->orderadress; ?> 
                  </td> -->
                  <!--  <td> 
                    <?php echo $liste->orderphone; ?> 
                  </td>
                   <td> 
                    <?php echo $liste->total_amount; ?> 
                  </td>
                   <td> 
                    <?php echo $liste->ordercity; ?> 
                  </td>
                   <td> 
                    <?php echo $liste->orderdate; ?> 
                  </td> 
                   <td> 
                    <?php echo $liste->cargo; ?> 
                  </td> 
                   <td> 
                    <?php echo $liste->cargo_number; ?> 
                  </td>                                  
                 <td>
                    <button class="btn btn-info" type="button"> <?php echo $liste->status; ?></button>                   
                </td>   -->
                         
                                

            <td>
                   <a class="btn btn-success"
                 href="<?php echo base_url("product/detailPage/$liste->op_productid") ?>">
                    <i class="icon-eye-open"></i>
                </a>          
                <!-- <a class="btn btn-danger removeBtn" onclick="return confirm('Silmek istediginizden emin misiniz ?');"
                   href="<?php echo base_url("receivedorder/detailPage/$liste->orderid") ?>">
                    <i class="icon-trash "></i>
                </a> -->
            </td>
        </tr>

    <?php  }  ?> 

</tbody>
</table>

<h3> Toplam Ürün = <?php echo $urun; ?>  </h3> 
<!-- <h3> Toplam Tutar = <?php echo $top; ?>  </h3>  -->

<!-- 
<form action="<?php echo base_url("receivedorder/save"); ?>"
       class="form-horizontal" method="post">     --> 

   
    <a type="button" class="btn" 
    href="<?php echo base_url("product"); ?>">Alışverişe Devam Et</a>
    </div>
       
      <!--  </form>   -->




</div>
<!-- END PAGE CONTENT-->
