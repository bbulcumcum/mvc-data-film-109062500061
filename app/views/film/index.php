<?php
// Masukkan koneksi database di sini (Contoh: include 'koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>CRUD Operation Using PHP & MySQL | Codehal - Index</title>
   <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="container">
      <h2>Daftar Data</h2>
      <a href="create.php" class="btn-add">Tambah Data Baru</a>
      
      <table>
         <thead>
            <tr>
               <th>No</th>
               <th>NamaFilm Film Film</th>
               <th>GenreFilm Film Film</th>
               <th>Aksi</th>
            </tr>
         </thead>
         <tbody>
            <!-- Contoh Looping Data dari Database -->
            <?php 
            // $query = mysqli_query($koneksi, "SELECT * FROM users");
            // while($row = mysqli_fetch_assoc($query)) { 
            ?>
            <tr>
               <td>1</td>
               <td>Spidermen</td>
               <td>Action</td>
               <td>
                  <a href="edit.php?id=1" class="btn-edit">Edit</a>
                  <a href="delete.php?id=1" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
               </td>
            </tr>
            <?php // } ?>
         </tbody>
      </table>
   </div>
</body>
</html>