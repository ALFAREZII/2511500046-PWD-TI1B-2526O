<table border="1">
    <tr>
        <th>NIM</th><th>Nama</th><th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['nim']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td>
            <a href="form_edit.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>