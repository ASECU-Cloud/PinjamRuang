<!DOCTYPE html>
<html>

<head>
  <base href="<?= BASEURL ?>">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" href="img/icon.png" type="image/png">
  <title> borrow-IT! </title>

</head>

<body>
  <header>
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 60px; font-weight: bold;">Peminjaman Fasilitas UHW Perbanas</h1>
    <h4 style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: medium;"> Jl. Wonorejo Utara No.16, Wonorejo, Kec. Rungkut, Surabaya, Jawa Timur 60296 </h4>
  </header>
  <div class="font d-flex justify-content-between align-items-center">
    <p class="hai">Admin borrow-IT!</p>
    <button id="logoutLink" style="margin-right: 20px;" class="btn btn-primary btn-sm">LOG OUT</button>

    <script>
      document.getElementById("logoutLink").addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah navigasi ke "index.html"

        // Menggunakan konfirmasi untuk mengonfirmasi logout
        var confirmation = confirm('Apakah Anda yakin ingin logout?');

        if (confirmation) {
          // Tambahkan kode logout jika pengguna memilih "Ya"

          // Atau alihkan pengguna ke halaman logout
          window.location.href = '<?= BASEURL ?>admin/logout';
        }
      });
    </script>
  </div>

  <div class="d-flex">
    <nav style="background-color: lightgray;">
      <ul>
        <li><a href="admin/dashboard">Beranda</a></li>
        <li>
          <p class="entry">Data Master</p>
        </li>
        <li><a href="admin/mahasiswa">Data Mahasiswa</a></li>
        <li><a href="admin/ormawa">Data Ormawa</a></li>
        <li><a href="admin/ruangan">Data Ruangan</a></li>
        <li>
          <p class="entry">Laporan</p>
        </li>
        <li><a href="admin/laporan">Laporan Peminjaman</a></li>
      </ul>
    </nav>
    <!-- Anchor content -->
    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Ormawa</th>
            <th>Nama Ormawa</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['ormawa'] as $key => $value) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value['id_organisasi'] ?></td>
              <td><?= $value['nama_organisasi'] ?></td>
            </tr>
          <?php endforeach; ?>

          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
    <!-- End anchor content -->
  </div>


  <footer>
    <h6>borrow-IT UHW Perbanas.</h6>
  </footer>
  <!-- Add Bootstrap JS and jQuery (optional) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>