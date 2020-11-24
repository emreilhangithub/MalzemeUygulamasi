<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("order/save"); ?>"
          class="form-horizontal" method="post">

        <!-- enctype="multipart/form-data" dosya gonderemeye yarar -->
        <!-- Yeni Form Satırı Başlangıcı-->
        <div class="row-fluid">
            <div class="span4">
                <div class="control-group">
                    <label class="control-label">Fatura Numarası(*)</label>
                    <div class="controls controls-row">

                        <input type="text" class="input-block-level" name="invoice" required=""
                               minlength="15" maxlength="15"
                        />
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <label class="control-label">Tedarikçi(*)</label>
                    <div class="controls controls-row">
                        <select type="text" class="input-block-level" name="supplier_id">

                            <?php foreach ($suppliers as $supplier) { ?>

                                <option value="<?php echo $supplier->supplierid; ?>">

                                    <?php echo $supplier->title; ?>

                                </option>

                            <?php } ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <label class="control-label">Açıklama(*)</label>
                    <div class="controls controls-row">

                        <textarea name="detail" id="" class="input-block-level" required="" minlength="5"
                                  rows="2"></textarea>
                    </div>
                </div>
            </div>

        </div>
        <!-- Yeni Form Satırı Bitişi-->
        <!-- Yeni Form Satırı Başlangıcı-->
        <div class="row-fluid">
            <table class="table table-hover invoice-input" id="mytable">
                <thead>
                <tr>
                    <th>Ürün</th>
                    <th>Miktar</th>
                    <th>Satış fiyatı</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><select type="text" class="input-block-level" name="product_id[]">
                            <?php foreach ($products as $product) { ?>
                                <option value="<?php echo $product->productid; ?>">
                                    <?php echo $product->titlee; ?>
                                </option>
                            <?php } ?>
                        </select></td>
                    <td><input type="number" class="input-block-level " name="quantity[]" required="" pattern="\d*"
                               minlength="1"/></td>
                    <td><input type="number" class="input-block-level " name="price[]" required="" minlength="1"
                               pattern="\d*"/></td>

                </tr>


                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td><a href="javascript:void(0) " id="add">Add More +</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- Yeni Form Satırı Bitişi-->

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Kaydet</button>
            <a type="button" class="btn"
               href="<?php echo base_url("purchase"); ?>">Vazgeç</a>
        </div>
    </form>
    <!-- END FORM-->


</div>
<!-- END PAGE CONTENT-->


