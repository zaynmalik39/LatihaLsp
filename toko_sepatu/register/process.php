<?php

require '../koneksi.php';

function tambahUser($data){

    global $conn;
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $password = htmlspecialchars($data["password"]);
    $roles = $data["roles"];

    $query = "INSERT INTO user VALUES(NULL, '$username', '$nama', '$password', '$roles')";
    mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}


?>