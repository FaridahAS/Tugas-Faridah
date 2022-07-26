<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="my-3">Profilku</h3>
            <form action="/karyawan/update/<?= $karyawan['NIK']; ?>" class="row g-3" method="post">
                <div class="col-md-6">
                    <label for="NIK" class="form-label">No Induk Karyawan</label>
                    <input type="text" class="form-control" id="NIK" name="NIK" disabled value="<?= (old('NIK')) ? old('NIK') : $karyawan['NIK'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $karyawan['nama'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= (old('username')) ? old('username') : $karyawan['username'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" value="<?= (old('password')) ? old('password') : $karyawan['password']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="nohp" class="form-label">No Hp</label>
                    <input type="nohp" class="form-control" id="" name="nohp" value="<?= (old('nohp')) ? old('nohp') : $karyawan['nohp'] ?>">
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= (old('email')) ? old('email') : $karyawan['email'] ?>">
                </div>
                <div class="col-12">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= (old('jabatan')) ? old('jabatan') : $karyawan['jabatan'] ?>">
                </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection(); ?> -->