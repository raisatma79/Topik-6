<?php
include('config.php');

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (nama, email, password) VALUES ('$nama', '$email', '$password')";
    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>

<form action="create.php" method="post">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="submit">Simpan</button>
</form>
