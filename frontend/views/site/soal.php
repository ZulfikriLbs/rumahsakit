<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>E-commerce grid</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>E-commerce</a>
            </li>
            <li class="active">
                <strong>Products grid</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <?php foreach ($modelSoal as $model) : ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox product-detail">
                    <div class="ibox-content">        
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="font-bold m-b-xs">
                                    Soal nomor <?= $model->no_soal?>.
                                </h2>
                                <div class="m-t-md">
                                    <h2 class="product-main-price"><?= $model->soal ?> </h2>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <div><input name="jawaban_b1_s1" type="radio">&nbsp;a.&nbsp;<?= $model->pil_a ?></div>
                                    <div><input name="jawaban_b1_s1" type="radio">&nbsp;b.&nbsp;<?= $model->pil_b ?></div>
                                    <div><input name="jawaban_b1_s1" type="radio">&nbsp;c.&nbsp;<?= $model->pil_c ?></div>
                                    <div><input name="jawaban_b1_s1" type="radio">&nbsp;d.&nbsp;<?= $model->pil_d ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?> 
</div>



