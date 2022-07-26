<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->get('username') == 'admin') : ?>
                <a href="<?= base_url('karyawan/create'); ?>" class="btn btn-primary mt-3">Tambah Data Karyawan</a>
            <?php else : ?>

            <?php endif; ?>
            <h1 class="mt-2">Daftar Karyawan </h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?> </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Induk Karyawan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($karyawan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['NIK']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['jabatan']; ?></td>
                            <td>
                                <a href="profil/edit/<?= $p['NIK']; ?>" class="btn btn-warning">Profil</a>
                                <?php if (session()->get('username') == 'admin') : ?>
                                    <form action="/karyawan/<?= $p['NIK']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                    </form>
                                <?php else : ?>

                                <?php endif; ?>


                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>