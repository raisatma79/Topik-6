<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $koneksi->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: read.php?status=success");
        exit();
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }

    $stmt->close();
} else {
    header("Location: read.php?status=error");
    exit();
}

$koneksi->close();
?>
