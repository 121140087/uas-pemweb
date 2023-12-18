<?php
session_start();
include "database_connect.php";

$filterHabitat = isset($_GET['habitat']) ? $_GET['habitat'] : null;

$sql = "SELECT * FROM ikan";

if ($filterHabitat !== null) {
    $sql .= " WHERE habitat = '$filterHabitat'";
}

$result = mysqli_query($conn, $sql);

$dataArray = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataObject = [
                'kode' => $row["kode"],
                'nama' => $row["nama"],
                'jenis' => $row["jenis"],
                'habitat' => $row["habitat"],
                'stock' => $row["stock"],
            ];
            $dataArray[] = $dataObject;
        }

        header('Content-Type: application/json');
        echo json_encode($dataArray);
        exit();  
    } else {
        header('Content-Type: application/json');
        echo json_encode($dataArray);
        exit();  
    }
} else {
    echo "Data Ikan Gagal diambil " . mysqli_error($conn);
    header("Location: home.php");
    exit();
}
?>
