<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman=$id");
?>
<script>Swal.fire({title: "Successfully", text: "Peminjaman Berhasil dihapus!", icon: "success"}).then(() => {setTimeout(() => {location.href = "?page=peminjaman";}, 500);});</script>