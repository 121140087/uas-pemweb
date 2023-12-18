<?php
include "database_connect.php";

$response = array(); 

if (isset($_GET["del"])) {
    $del = $_GET["del"];

    $sql = "DELETE FROM ikan WHERE kode='$del'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response["success"] = true;
        $response["message"] = "Hapus Berhasil";
        header("Location: home.php");
        exit();

    } else {
        $response["success"] = false;
        $response["message"] = "Hapus Gagal: " . mysqli_error($conn);
        header("Location: home.php");
        exit();
    }
} else {
    $response["success"] = false;
    $response["message"] = "Invalid request. 'del' parameter not set.";
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
