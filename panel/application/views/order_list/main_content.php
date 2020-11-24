
<!-- BEGIN PAGE CONTENT-->


<a href="<?php echo base_url("order/newPage"); ?>" class="btn btn-success"><i class="icon-ok"></i>Ekle</a>
    <br><br>

<div class="row-fluid">



    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
        <tr>
            <th><i class="icon-sort-by-order"></i>Kno</th>
            <th width="100"><i class="icon-image"></i>Fatura No</th>
            <th><i class="icon-bullhorn"></i>Açıklama</th>
            <th><i class="icon-shield"></i>Ürün Adı</th>
            <th><i class="icon-bullhorn"></i>Tarih</th>
            <th><i class=" icon-cogs"></i> İşlemler</th>

            <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                <th><i class="icon-bookmark"></i> Profit</th> -->

            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($rows as $row) { ?> <!-- Burda dongu kurduk ve catogi kadar ekrana basmasını sagladık-->
            <tr>
                <td>
                    <?php echo $row->id; ?>
                </td>
                <td>
                    <?php echo $row->invoice; ?>
                </td>
                <td>
                    <?php

                    $detail = $row->detail;
                    $strlen = strlen($detail);

                    if ($strlen > 30 ) {
                        echo mb_substr($detail, 0,30) . "...";
                    }
                    else
                    {

                        echo $detail;
                    }

                    ?>
                </td>
                <td>
                    <?php echo get_supplier_title($row->supplier_id); ?>
                </td>
                <td>
                    <?php echo $row->date; ?>
                </td>


                <td>
                    <a class="btn btn-success" href="<?php echo base_url("order/detail/$row->id") ?>">
                        <i class="icon-eye-open"></i>
                    </a>  
                    <!-- <a class="btn btn-primary"
                       href="<?php echo base_url("order/editPage/$row->id") ?>">
                        <i class="icon-pencil"></i>
                    </a> -->
                    <a class="btn btn-danger"
                       href="<?php echo base_url("order/delete/$row->id") ?>">
                        <i class="icon-trash "></i>
                    </a>
                    
                </td>
            </tr>

        <?php  }  ?>


        </tbody>
    </table>



</div>


