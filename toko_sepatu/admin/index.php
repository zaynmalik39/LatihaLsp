<?php
session_start();

require '../koneksi.php';

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

?>


<?php include '../layout/sidebar.php'; ?>
<div class="main">
    <h3>Sealamat datang di toko Printer, <3 </h3>
</div>