<?php
session_start();
include "database_connect.php";

$response = array("success" => false, "message" => "");

if (isset($_POST['user']) && isset($_POST['sandi'])) {

    $user = $_POST['user'];
    $sandi = $_POST['sandi'];

    if (empty($user)) {
        $_SESSION['error'] = "username kosong";
    } else if (empty($sandi)) {
        $_SESSION['error'] = "sandi kosong";
    } else {
        $sql = "SELECT * FROM users WHERE user='$user' AND sandi='$sandi'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user'] === $user && $row['sandi'] === $sandi) {
                $response['success'] = true;
                $response['message'] = "login sukses";
            } else {
                $_SESSION['error'] = "user atau sandi salah";
            }
        } else {
            $_SESSION['error'] = "user atau sandi salah";
        }
    }
} else {
    $_SESSION['error'] = "Invalid request";
}

echo json_encode($response);
?>
