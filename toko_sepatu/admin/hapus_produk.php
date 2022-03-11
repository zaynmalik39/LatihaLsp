<?php

require 'function.php';

$id = $_GET['id'];

if(hapusProduk($id) > 0){
    echo "<script>
        alert('Data produk berhasil dihapus')
        document.location.href = 'produk.php'
        </script>";
}else{
    echo "<script>
        alert('Data produk gagal dihapus')
        document.location.href = 'produk.php'
        </script>";
}

?>