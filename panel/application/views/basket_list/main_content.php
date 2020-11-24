
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("product"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th><i class="icon-sort-by-order"></i>Kno</th>
                <th><i class="icon-bullhorn"></i>Ürün</th>
                <th><i class=" icon-cogs"></i> Tarih</th>
                <th><i class=" icon-phone"></i>Miktar</th>                
                <th><i class=" icon-phone"></i>Fiyat</th>   
                <th><i class=" icon-phone"></i>Toplam Fiyat</th>               
                <th><i class=" icon-phone"></i>Durum</th>                
                              
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
                     $tutar = $liste->urunfiyat *  $liste->basket_quentity; // urunun fiyatı * miktar = tutara 
                     $top+=$tutar;  //toplam=toplam+tutar demektedir yani toplam tutarı aldırır bize                     
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
                  <td>
                    <?php echo $liste->urunadi; ?>
                </td>  

                <td>
                    <?php echo $liste->basket_date; ?>
                </td>
                 <td>
                    <?php echo $liste->basket_quentity; ?>
                </td>   
                 <td>
                    <?php echo $liste->urunfiyat; ?>
                </td> 
                 <td>
                    <?php echo ($tutar); ?>
                </td>    



                 <!-- <td>
                    <button class="btn btn-success" type="button"> <?php echo $liste->status; ?></button>                   
                </td> -->           
                                

            <td>
                 <a class="btn btn-success"
                 href="<?php echo base_url("product/detailPage/$liste->product_id") ?>">
                    <i class="icon-eye-open"></i>
                </a>               
                <a class="btn btn-danger removeBtn" onclick="return confirm('Silmek istediginizden emin misiniz ?');"
                   href="<?php echo base_url("basket/delete/$liste->basket_id") ?>">
                    <i class="icon-trash "></i>
                </a>
            </td>
        </tr>

    <?php  }  ?> 

</tbody>
</table>

<?php if ( $sn>0) {
  
 ?>

<h3> Toplam Ürün = <?php echo $urun; ?>  </h3> 
<h3> Toplam Tutar = <?php echo $top; ?>  </h3> 




<form action="<?php echo base_url("receivedorder/save"); ?>"
       class="form-horizontal" method="post">     

       <h3> Adres Bilgileri </h3>   

       Alıcının Adı Soyadı =  <input type="text" name="ordername" value="<?php echo $user->user; ?>" >   <br>
       Adresi =   <input type="text" name="orderadress" value="<?php echo $user->adress; ?>" >   <br>
       Telefonu =   <input type="text" name="orderphone" value="<?php echo $user->phone; ?>" >  <br>
       Şehir =   <input type="text" name="ordercity" value="<?php echo $user->city; ?>" >   <br>
       Toplam Tutar =   <input type="text" name="total_amount"  readonly value="<?php echo $top; ?>" > 

        <h3> Ödeme Bilgileri </h3>   

       Kredi Kartı  Kart No =  <input type="text" name="cardno">  <br>
       SKT AY =   <input type="text" name="moon">   <br>
       SKT YIL =   <input type="text" name="year">  <br>
       Güvenkik Kodu =   <input type="text" name="scode">

        <?php  } ?>

       <div class="form-actions">

         <?php if ($top>0) {?>

              <button type="submit" class="btn btn-success">Sepeti Onayla</button>
              <a type="button" class="btn" 
             href="<?php echo base_url("product"); ?>">Alışverişe Devam Et</a>   
             
              
            <?php  } ?>

            <?php if ($top<=0) {?>

              
              <a type="button" class="btn" 
    href="<?php echo base_url("product"); ?>">Lüften Sepetinizi Doldurunuz</a>  
             
              
            <?php  } ?>

   
   
    
    </div>
       
       </form>  




</div>
<!-- END PAGE CONTENT-->
