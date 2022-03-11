<?php
session_start();

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
        </script>
        ";
}

if($_SESSION["roles"] !="admin"){
    echo "
        <script type='text/javascript'>
        alert('Anda bukan customer')
        window.location = '../login/index.php';
        </script>
        ";
}

require '../function.php';

$produk = query("SELECT * FROM produk");

?>


<?php include '../layout/sidebar.php'; ?>
<div class="main">
    <h3>Data Produk</h3>
    <a href="tambah_produk.php" class="tambah">Tambah Data Produk</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Stok Barang</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1;?>
        <?php foreach($produk as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data['nama_produk']; ?></td>

            <td><img src="../foto/<?= $data['foto']; ?>" width="80px" alt=""></td>
            <td><?= number_format($data['harga']); ?></td>
            <td><?= $data['stok_barang']; ?></td>
            <td><?= $data['deskripsi']; ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $data['id_produk'];?> " 
                class="edit">Edit</a>
                <a href="hapus_produk.php?id=<?= $data['id_produk']; ?>" class="hapus"
                onclick="return confirm('Anda yakin ingin mengahapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>