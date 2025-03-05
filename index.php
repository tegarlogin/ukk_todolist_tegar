<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" connect="width=device-width, initial-scale=1.0">
  <meta http-equid="X-UA-Compatible" connect="ie=edge">
  <title>Data Siswa</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
  rel="stylesheet" 
  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
  crossorigin="anonymous">
</head>
<body>

    <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center">
         <h1 class="text-center">Daftar Siswa</h1>
         <a href="tambah.php" class="btn btn-primary mb-2">Tambah</a>
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                   <th scope="col">No</th>
                   <th scope="col">Nama</th>
                   <th scope="col">Jenis Kelamin</th>
                   <th scope="col">Aksi</th>
                </tr>
            </thead>
        
           <?php
           $no = 1;
           $query = "SELECT * FROM rpl ";
           $result = mysqli_query($koneksi, $query);
            ?>
            <tbody>
            <?php
            foreach ($result as $data){
                echo "
                <tr>
                <th scope='row'>". $no++."</th>
                <td>". $data["nama"]."</td>
                <td>". $data["jk"]."</td>
                <td>
                <a href='update.php?id=".$data["id"]."'
                type='button' class='btn btn-success'>Update</a>

                <a href='delete.php?id=".$data["id"]."'
                type='button' class='btn btn-danger' onclick=\"return confirm('Yakin Hapus?')\">Hapus</a>
                </td>
                </tr>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>
    </section>

</body>
</html>