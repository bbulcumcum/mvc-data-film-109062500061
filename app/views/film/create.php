<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Tambah Film</title>
   <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="container">
      <h2>Tambah Film</h2>

      <?php if ($flash): ?>
         <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
         </div>
      <?php endif; ?>

      <form action="index.php?page=film&action=store" method="POST">
         <div class="form-group">
            <label>Judul Film:</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($old['judul'] ?? '') ?>" required />
         </div>
         <div class="form-group">
            <label>Genre:</label>
            <input type="text" name="genre" value="<?= htmlspecialchars($old['genre'] ?? '') ?>" required />
         </div>
         <div class="form-group">
            <label>Sutradara:</label>
            <input type="text" name="sutradara" value="<?= htmlspecialchars($old['sutradara'] ?? '') ?>" required />
         </div>
         <div class="form-group">
            <label>Tahun Rilis:</label>
            <input type="number" name="tahun_rilis" min="1888" max="2100" value="<?= htmlspecialchars($old['tahun_rilis'] ?? '') ?>" required />
         </div>
         <div class="form-group">
            <label>Rating (0-10):</label>
            <input type="number" name="rating" min="0" max="10" step="0.1" value="<?= htmlspecialchars($old['rating'] ?? '') ?>" required />
         </div>
         <button type="submit" class="btn-submit">Simpan</button>
         <a href="index.php?page=film" class="btn-back">Kembali</a>
      </form>
   </div>
</body>
</html>
