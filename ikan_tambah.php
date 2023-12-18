<?php
include "database_connect.php";

if (isset($_POST["kode"]) && isset($_POST["nama"]) && isset($_POST["jenis"]) && isset($_POST["habitat"]) && isset($_POST["stock"])) {
    $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $jenis = mysqli_real_escape_string($conn, $_POST["jenis"]);
    $habitat = mysqli_real_escape_string($conn, $_POST["habitat"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);

    $sql = "INSERT INTO ikan (kode, nama, jenis, habitat, stock)
            VALUES ('$kode', '$nama', '$jenis', '$habitat', '$stock');";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: home.php");
        exit();
    } else {
        echo "Data Ikan Gagal Diinput " . mysqli_error($conn);
        header("Location: home.php");
        exit();
    }
} else {
    echo "Error";
}
?>
