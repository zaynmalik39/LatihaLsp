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

if($_SESSION["roles"] !="customer"){
    echo "
    <script type='text/javascript'>
        alert('Anda bukan customer')
        window.location = '../login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$data = query("SELECT * FROM produk WHERE id_produk ='$id'")[0];

?>

<?php include '../layout/navbar.php'; ?>

<div class="container">
    <h2 class="text-product">Detail Produk</h2>
    <div class="wrapper-detail">
        <div class="item">
            <img src="../foto/<?= $data["foto"]; ?>" width="60%" alt="">
        </div>
        <form action="" method="POST">
            <div class="item-2">
                <h5 class="nama-produk">Nama Produk : <?= $data["nama_produk"]; ?></h5>
                <h5 class="price">Harga : <?= $data["harga"]; ?></h5>
                <h5 class="stok">Stok Barang : <?= $data["stok_barang"]; ?></h5>
                <h5 class="deskripsi">Deskripsi Barang : <?= $data["deskripsi"]; ?></h5>

                <div>
                    Qty <input type="number" value="1" name="qty" class="qty" /><br />
                    <button type="submit" name="beli" class="btn-detail">Beli Sekarang</button>
                </div>
                
            </div>
        </form>
    </div>

    <?php

    if(isset($_POST['beli'])){
        $qty = $_POST['qty'];
        $stok = $data['stok_barang'];

        if($stok < $qty) {
            echo "<script>alert('Mohon maaf, stok barang telah habis')</script>";
        }else{
            $qty - $_POST["qty"];
            $_SESSION["cart"][$id] - $qty;
            echo "<script>alert('Produk telah di tambahkan ke keranjang')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
    }
    ?>
</div>