<?php
// Ambil data berdasarkan ID yang dikirim via URL
// $id = $_GET['id'];
// $query = mysqli_query($koneksi, "SELECT * FROM film WHERE id = '$id'");
// $data = mysqli_fetch_assoc($query);

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    // $NamaFilm Film = $_POST['NamaFilm Film'];
    // $email = $_POST['email'];
    // mysqli_query($koneksi, "UPDATE film SET NamaFilm Film='$NamaFilm Film', email='$email' WHERE id='$id'");
    // header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>CRUD Operation Using PHP & MySQL | Codehal - Edit</title>
   <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="container">
      <h2>Edit Data</h2>
      <form action="" method="POST">
         <div class="form-group">
            <label>NamaFilm Film Film:</label>
            <input type="text" name="NamaFilm Film" value="<?php /* echo $data['NamaFilm Film']; */ ?>" required />
         </div>
         <div class="form-group">
            <label>GenreFilm Film Film:</label>
            <input type="email" name="email" value="<?php /* echo $data['email']; */ ?>" required />
         </div>
         <button type="submit" name="update" class="btn-submit">Update</button>
         <a href="index.php" class="btn-back">Kembali</a>
      </form>
   </div>
</body>
</html>