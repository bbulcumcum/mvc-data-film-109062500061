<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Daftar Film</title>
   <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="container">
      <h2>Daftar Film</h2>

      <?php if ($flash): ?>
         <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
         </div>
      <?php endif; ?>

      <a href="index.php?page=film&action=create" class="btn-add">Tambah Film</a>

      <table>
         <thead>
            <tr>
               <th>No</th>
               <th>Judul</th>
               <th>Genre</th>
               <th>Sutradara</th>
               <th>Tahun</th>
               <th>Rating</th>
               <th>Aksi</th>
            </tr>
         </thead>
         <tbody>
            <?php if (empty($films)): ?>
               <tr><td colspan="7">Belum ada data film.</td></tr>
            <?php endif; ?>
            <?php foreach ($films as $i => $f): ?>
            <tr>
               <td><?= $i + 1 ?></td>
               <td><?= htmlspecialchars($f['judul']) ?></td>
               <td><?= htmlspecialchars($f['genre']) ?></td>
               <td><?= htmlspecialchars($f['sutradara']) ?></td>
               <td><?= (int) $f['tahun_rilis'] ?></td>
               <td><?= htmlspecialchars($f['rating']) ?></td>
               <td class="aksi">
                  <a href="index.php?page=film&action=edit&id=<?= (int) $f['id'] ?>" class="btn-edit">Edit</a>
                  <form method="post" action="index.php?page=film&action=delete"
                        style="display:inline"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                     <input type="hidden" name="id" value="<?= (int) $f['id'] ?>">
                     <button type="submit" class="btn-delete">Hapus</button>
                  </form>
               </td>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</body>
</html>
