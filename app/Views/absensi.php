<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->get('username') == 'admin') : ?>
                <a href="<?= base_url('absenku'); ?>" class="btn btn-primary mt-3">Absenku</a>
            <?php else : ?>

            <?php endif; ?>
            <h1 class="mt-2">Absensi </h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Induk Karyawan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam masuk</th>
                        <th scope="col">Jam keluar</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($absensi as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['id']; ?></td>
                            <td><?= $a['tanggal']; ?></td>
                            <td><?= $a['jam_masuk']; ?></td>
                            <td><?= $a['jam_masuk']; ?></td>
                            <td><?= $a['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>