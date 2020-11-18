<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Php Codeigniter ile Sınırsız Kategori </title>
        <?php $this->load->view("bootstrap"); ?>
    </head>
    <body>
        <div class="container mb-4">        
            <hr>
            <div class="row">
                <div class="col">
                    <?php echo isset($mesaj) ? $mesaj : null; ?>
                    <h6><?php if(isset($mesaj)): ?><a href="<?php echo base_url(); ?>">Yeni Kategori Ekle</a> | <?php endif; ?>Kategori Ekleme Formu</h6>
                    <form action="<?php echo base_url("kategori/ekle") ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInput1">Kategori Adı</label>
                            <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Kategori Adını Yazın" name="kategori_adi">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Kategori Listesi</label>
                            <select class="selectpicker" data-live-search="true" data-width="100%" data-style="btn-danger" name="kategori_ustid">
                                <option value="0">Ana Kategori</option>
                                <?php $this->kategori_model->selectBoxKategori(); ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
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