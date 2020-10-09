<table class="table table-bordered">
    <thead>
        <tr>
            <td>ID Transaksi</td>
            <td>Tanggal Transaksi</td>
            <td>Nomor Rekam Medik</td>
            <td>Nama Pasien</td>
            <td>Cara Bayar</td>
            <td>Nama Obat</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $model) : ?>
            <tr>
            <td><?= $model->id_transaksi ?></td>
            <td><?= $model->tgl_transaksi ?></td>
            <td><?= $model->no_rekam_medik ?></td>
            <td><?= $model->nm_pasien ?></td>
            <td><?= $model->cara_bayar ?></td>
            <td><?= $model->nm_obat ?></td>
            <td><?= number_format($model->harga,2,',','.') ?></td>
            <td><?= number_format($model->jumlah,2,',','.') ?></td>
            <td><?= number_format($model->total,2,',','.') ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>