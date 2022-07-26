<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="/absensi/send" method="post">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                    <label for="jam_masuk">Jam Masuk</label>
                    <input type="time" class="form-control" id="jam_masuk" name="jam_masuk">
                </div>
                <div class="form-group">
                    <label for="jam_keluar">Jam Keluar</label>
                    <input type="time" class="form-control" id="jam_keluar" name="jam_keluar">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <!-- <input type="text" class="form-control" id="keterangan" name="keterangan"> -->
                    <select name="keterangan" id="keterangan">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="cuti">Cuti</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>