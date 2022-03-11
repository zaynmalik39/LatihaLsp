<?php
session_start();

require '../function.php';

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

$produk = query("SELECT * FROM produk")

?>

<?php include '../layout/navbar.php'; ?>

<div class="hero">
   

    </div>
</div>

<div class="container">
    <h2 class="text-produk">Produk Kami</h2>
    <hr/>
    <div class="wrapper-product">
        <?php foreach($produk as $data) : ?>
        <div class="product">
            <a href="detail.php?id=<?= $data['id_produk']; ?>" class="" style="text-decoration: none;">
                <img src="../foto/<?= $data['foto'];?>" width="250px" alt="">
                <h3><?= $data['nama_produk'];?></h3>
                <p><?= number_format($data['harga']); ?></p>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>