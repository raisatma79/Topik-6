<?php
include('config.php');

$sql = "SELECT * FROM user";
$query = mysqli_query($koneksi, $sql);
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; while ($data = mysqli_fetch_array($query)){?>
    <tr>
        <td><?= $i++?></td>
        <td><?= $data['nama']?></td>
        <td><?= $data['email']?></td>
        <td><a href="update.php?id=<?= $data['id']?>">Edit</a> | <a href="delete.php?id=<?= $data['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
