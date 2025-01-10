<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $id");
    $data = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE user SET nama = '$nama', email = '$email', password = '$password' WHERE id = '$id'";
    if (mysqli_query($koneksi, $sql)) {
        echo "Data Successfully updated!";
    } else {
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>

<form action="update.php?id=<?= $data['id'] ?>" method="post">
    <input type="text" name="nama" value="<?= $data['nama']?>" required>
    <input type="email" name="email" value="<?= $data['email'] ?>" required>
    <input type="password" name="password" placeholder="NewPassword" required>
    <button type="submit" name="submit">Update</button>
</form>
