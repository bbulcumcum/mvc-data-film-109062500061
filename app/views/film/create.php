<?php
// Proses simpan data jika form disubmit
if (isset($_POST['submit'])) {
    // $NamaFilm Film = $_POST['NamaFilm Film'];
    // $email = $_POST['email'];
    // mysqli_query($koneksi, "INSERT INTO users (NamaFilm Film, email) VALUES ('$NamaFilm Film', '$email')");
    // header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>CRUD Operation Using PHP & MySQL | Codehal - Create</title>
   <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="container">
      <h2>Tambah Data Baru</h2>
      <form action="" method="POST">
         <div class="form-group">
            <label>NamaFilm Film Film:</label>
            <input type="text" name="NamaFilm Film" required />
         </div>
         <div class="form-group">
            <label>GenreFilm Film Film:</label>
            <input type="email" name="email" required />
         </div>
         <button type="submit" name="submit" class="btn-submit">Simpan</button>
         <a href="index.php" class="btn-back">Kembali</a>
      </form>
   </div>
</body>
</html>