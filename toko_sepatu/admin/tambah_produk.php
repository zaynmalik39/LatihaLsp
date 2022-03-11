<?php
session_start();

require 'function.php';

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

if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0){
        echo "<script type='text/javascript'>
        alert('Data produk berhasil ditambahkan')
        window.location = 'produk.php'
        </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('Data produk gagal ditambahkan')
        window.location = 'produk.php'
        </script>";
    }
}

?>


<?php include '../layout/sidebar.php'; ?>
<div class="main">
    <h3>Tambah Data Produk</h3>
    <div class="container-form">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-produk"> <br /> <br />

            <label for="">Foto Produk</label>
            <input type="file" name="foto" class="form-produk"> <br /> <br />

            <label for="">Harga Produk</label>
            <input type="text" name="harga" class="form-produk"> <br /> <br />

            <label for="">Stok Barang</label>
            <input type="text" name="stok_barang" class="form-produk"> <br /> <br />

            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-produk" cols="20" rows="8"></textarea> <br /> <br />

            <button type="submit" name="submit" class="btn-produk">Tambah Produk</button>
        </form>
    </div>
</div>