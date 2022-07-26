<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contac Us</h2>
            <ul>
                <li><?= $alamat['tipe']; ?></li>
                <li><?= $alamat['alamat']; ?></li>
                <li><?= $alamat['kec']; ?></li>
                <li><?= $alamat['kota']; ?></li>
                <li><?= $alamat['tlp']; ?></li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>