<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?= BASEURL ?>">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
  <link rel="stylesheet" href="css/daftarpeminjaman.css" />
  <style>

  </style>
</head>

<body>
  <header>
    <div class="container">
      <h1><a>borrow-IT!</a></h1>
      <ul>
        <li><a href="home/dashboard">HOME</a></li>
        <li class="active"><a href="home/peminjaman">PEMINJAMAN</a></li>
        <li><a href="home/status">STATUS PEMINJAMAN</a></li>
        <li></li>
        <li></li>
        <li>
          <a id="logoutLink">LOG OUT</a>
        </li>

        <script>
          document.getElementById("logoutLink").addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah navigasi ke "index.html"

            // Menggunakan konfirmasi untuk mengonfirmasi logout
            var confirmation = confirm('Apakah Anda yakin ingin logout?');

            if (confirmation) {
              // Tambahkan kode logout jika pengguna memilih "Ya"
              window.location.href = '<?= BASEURL ?>home/logout'
              // Atau alihkan pengguna ke halaman logout
              // window.location.href = 'index.html';
            }
          });
        </script>
      </ul>
    </div>
  </header>
  <div class=" newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
      <div class="col-lg-10 border rounded p-1">
        <div class="border rounded text-center p-1">
          <div class="bg-white rounded text-center p-5">
            <h4 class="text-primary">
              DAFTAR <span class="text-primary">PEMINJAMAN</span>
            </h4>
            <button class="btn btn-primary" onclick="window.location.href = '<?= BASEURL ?>home/book'">Book</button>
            <div class="container-fluid">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Kegiatan</th>
                    <th>Ormawa</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Peralatan</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($data['list'] as $key => $value) : ?>

                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $value['nama_mahasiswa'] ?></td>
                      <td><?= $value['nama_kegiatan'] ?></td>
                      <td><?= $value['nama_organisasi'] ?></td>
                      <td><?= $value['nama_ruangan'] ?></td>
                      <td><?= date_format(date_create($value['tanggal']), "d F Y") ?></td>
                      <td><?= date('H:i', strtotime($value['jam_mulai'])) ?></td>
                      <td><?= date('H:i', strtotime($value['jam_berakhir'])) ?></td>
                      <td><?= $value['peralatan'] ?></td>
                    </tr>

                  <?php endforeach; ?>
                  <!-- Add more rows as needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Newsletter Start -->

</html>