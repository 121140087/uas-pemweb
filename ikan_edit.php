<?php
include "database_connect.php";

if (isset($_POST["kode"]) && isset($_POST["nama"]) && isset($_POST["jenis"]) && isset($_POST["habitat"]) && isset($_POST["stock"])) {
    $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $jenis = mysqli_real_escape_string($conn, $_POST["jenis"]);
    $habitat = mysqli_real_escape_string($conn, $_POST["habitat"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);

    $sql = "UPDATE ikan SET nama='$nama', jenis='$jenis', habitat='$habitat', stock='$stock'
            WHERE kode='$kode';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: home.php");
        exit();
    } else {
        echo "Data Ikan Gagal Diupdate " . mysqli_error($conn);
        header("Location: home.php");
        exit();
    }
} else {
    echo "Error";
}
?>
