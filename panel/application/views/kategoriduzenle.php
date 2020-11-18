<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Php Codeigniter ile Sınırsız Kategori </title>
        <?php $this->load->view("bootstrap"); ?>
    </head>
    <body>
        <div class="container mb-4">           
        
            <div class="row">
                <div class="col">
                    <h6><a href="<?php echo base_url('kategori'); ?>">Yeni Kategori Ekle</a> | Kategori Ekleme Formu</h6>
                    <form action="<?php echo base_url("kategori/duzenle/$sqlData->kategori_id") ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInput1">Kategori Adı</label>
                            <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" value="<?php echo $sqlData->kategori_adi ?>" placeholder="Kategori Adını Yazın" name="kategori_adi">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Kategori Listesi</label>
                            <select class="selectpicker" data-live-search="true" data-width="100%" data-style="btn-danger" name="kategori_ustid">
                                <option value="0">Ana Kategori</option>
                                <?php $this->kategori_model->altKategoriBul(0, 0, $sqlData->kategori_ustid); ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                    </form>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">Kategorileri Listelemek</div>
                        <div class="card-body bg-light">
                            <?php $this->kategori_model->kategoriListesi(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>