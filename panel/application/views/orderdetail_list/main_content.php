<!-- BEGIN BLANK PAGE PORTLET-->
<div class="widget purple">
    <div class="widget-title">
        <h4><i class="icon-edit"></i> Fatura </h4>
        <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
    </div>
    <div class="widget-body">
        <div class="row-fluid">
            <div class="span12">
                <div class="text-center">
                    <img width="100" height="100"
                    src="<?php echo base_url("assets");?>/img/gib_400px.png" alt="Gib Logo" />

                </div>
                <hr>

            </div>
        </div>
        <div class="space20"></div>
        <div class="row-fluid invoice-list">
            <div class="span4">
                <h4>FATURA ADRESİ</h4>
                <p>
                    BTİ BİLİŞİM <br>
                    Yeni Mahalle Aheste Sokak No:1 Kent Plus C Blok D:33-34 Soğanlık <br>
                    Kartal – İSTANBUL<br>
                    Tel: 0216 999 08 03
                </p>
            </div>

            <?php foreach ($rows as $row ) { ?>

            <div class="span4">
                <h4>FATURA BİLGİLERİ</h4>           
             <ul class="unstyled">
                    <li>Fatura Numarası		: <strong><?php echo $row->invoice; ?></strong></li>
                    <li>Fatura Tarihi		: <?php echo $row->date; ?></li>
                    <li>Tedarikçi Adı       : <?php echo $row->title; ?></li>
                    <li>Açıklama       : <?php echo $row->detail; ?></li>
                </ul>
            </div>
              <?php } ?>
        </div>
        <div class="space20"></div>
        <div class="space20"></div>
        <div class="row-fluid">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Sipariş Numarası</th>
                    <th class="hidden-480">Ürün Adı</th>                    
                    <th class="hidden-480">Fiyat</th>
                    <th class="hidden-480">Miktar</th>
                    <th class="hidden-480">İşlem</th>

                </tr>
                </thead>
                <?php foreach ($sales as $sal ) { ?>
                <tbody>
                <tr>
                    <td><?php echo $sal->id; ?></td>
                    <td><?php echo $sal->salid; ?></td>
                    <td class="hidden-480"><?php echo $sal->titlee; ?></td>
                    <td class="hidden-480"><?php echo $sal->price; ?></td>
                    <td class="hidden-480"><?php echo $sal->quantity; ?></td>
                    <td> <a class="btn btn-success" href="<?php echo base_url("product/detailPage/$sal->productId") ?>">
                        <i class="icon-eye-open"></i>
                    </a> </td>
                    
                </tr>
                </tbody>
                  <?php } ?>
            </table>
        </div>
        <div class="space20"></div>
          <?php foreach ($rows as $row ) { ?>
        <div class="row-fluid">
            <div class="span4 invoice-block pull-right">
                <ul class="unstyled amounts">
                    <li><strong>Toplam Fiyat :<?php echo $row->total_price; ?></strong> </li>
                </ul>
            </div>
        </div>
         <?php } ?>
        <div class="space20"></div>
        <div class="row-fluid text-center">
            <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
        </div>
    </div>
</div>
<!-- END BLANK PAGE PORTLET-->

