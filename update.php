<?php
  include "koneksi.php";

  // Check if 'id' is provided in the URL
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data for the student with the provided ID
    $query = "SELECT * FROM rpl WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
      // If no data is found, redirect back to the main page
      header("Location: index.php");
      exit;
    }

  } else {
    // If 'id' is not provided, redirect back to the main page
    header("Location: index.php");
    exit;
  }

  // Check if form is submitted
  if (isset($_POST['update'])) {
    // Sanitize the input to avoid SQL injection
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);

    // Update query
    $updateQuery = "UPDATE rpl SET nama = '$nama', jk = '$jk' WHERE id = $id";
    
    if (mysqli_query($koneksi, $updateQuery)) {
      // If update is successful, redirect back to the main page
      header("Location: index.php");
    } else {
      // Show an error message if update fails
      echo "<script>alert('Data gagal diupdate!')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update Siswa</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
  rel="stylesheet" 
  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
  crossorigin="anonymous">
</head>
<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Siswa</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <input type="text" class="form-control" id="jk" name="jk" placeholder="Jenis Kelamin" value="<?php echo $data['jk']; ?>" required>
        </div>
        <input name="update" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

</body>
</html>