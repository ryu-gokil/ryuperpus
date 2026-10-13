<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <?php
                    if(isset($_POST['submit'])) {
                        $buku = $_POST['id_buku'];
                        $users = $_SESSION['user']['id_user'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $status = $_POST['status_peminjaman'];
                        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) values('$buku','$users','$tanggal_peminjaman','$tanggal_pengembalian','$status')");

                        if($query) {
                            echo '<script>Swal.fire({title: "Successfully", text: "Ulasan Berhasil Ditambahkan!", icon: "success"}).then(() => {setTimeout(() => {location.href = "?page=ulasan";}, 500);});</script>';
                        }else{
                            echo '<script>Swal.fire({title: "Ops...", text: "Katagori Gagal ditambahkan!", icon: "error"});</script>';
                        }
                    }
                ?>
                <div class="row mb-3">
                    <div class="col-md-2">Buku</div>
                    <div class="col-md-8">
                        <select name="id_buku" class="form-control">
                            <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                while($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                <div class="row mb-3">
                    <div class="col-md-2">Hari Peminjaman</div>
                    <div class="col-md-8">
                        <input type="date" name="tanggal_peminjaman">
                    </div>
                <div class="row mb-3">
                    <div class="col-md-2">Hari Pengembalian</div>
                    <div class="col-md-8">
                        <input type="date" name="tanggal_pengembalian">
                    </div>
                <div class="row mb-5">
                    <div class="col-md-2">Status Peminjaman</div>
                    <div class="col-md-8">
                        <select name="status_peminjaman" class="form-control">
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Kirim</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>