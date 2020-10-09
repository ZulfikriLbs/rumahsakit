<table class="table table-bordered">
    <thead>
        <tr>
            <td>Nomor Rekam Medik</td>
            <td>Nama Pasien</td>
            <td>Alamat</td>
            <td>Nomor KTP</td>
            <td>Cara Bayar</td>
            <td>No BPJS</td>
            <td>No Registrasi</td>
            <td>Tanggal Registrasi</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $model) : ?>
            <tr>
            <td><?= $model->no_rekam_medik ?></td>
            <td><?= $model->nm_pasien ?></td>
            <td><?= $model->alamat ?></td>
            <td><?= $model->no_ktp ?></td>
            <td><?= $model->cara_bayar ?></td>
            <td><?= $model->no_bpjs ?></td>
            <td><?= $model->no_registrasi ?></td>
            <td><?= $model->tgl_registrasi ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>