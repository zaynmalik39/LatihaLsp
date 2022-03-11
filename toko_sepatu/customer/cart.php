<?php
session_start();

require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../login/index.php';
        </script>
        ";
}

if($_SESSION["roles"] !="customer"){
    echo "
        <script type='text/javascript'>
        alert('Anda bukan Customer');
        window.location = '../login/index.php';
        </script>
        ";
}

if(empty($_SESSION["cart"]) || isset($_SESSION["cart"])){
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<?php include '../layout/navbar.php'; ?>

<div class="container">
    <h2 class="text-product">Keranjang Belanja</h2>
    <?php foreach ($_SESSION["cart"] as $productId => $hasil)?>
        <?php $data = query("SELECT * FROM produk WHERE id_produk = $productId")[0];
        $subTotalHarga = $hasil * $data["harga"];
    ?>
    <div class="card-cart">
        <img src="../foto/<?= $data['foto']; ?>" width="20%" alt="">
        <div class="child-cart">
            <h4><?php echo $data['nama_produk']; ?></h4>
            <h4>Harga Satuan Rp <?= number_format($data["harga"]); ?></h4>
            <h4 style="margin-top: 10px;">Total Harga: Rp <?= number_format($subTotalHarga); ?></h4>
            <h4 style="margin-top: 10px; margin-bottom: 20px;">Pembeli : <?php echo $_SESSION['username']; ?></h4>
        
            <a href="cart-delete.php?id=<?= $data["id_produk"]; ?>" class="cart-delete">Hapus</a>
            <a href="checkout.php" class="checkout">Checkout Product</a>
        </div>
    </div>
</div>
<?php endforeach; ?>