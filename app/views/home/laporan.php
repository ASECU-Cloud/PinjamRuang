<!DOCTYPE html>
<html>

<head>
  <base href="<?= BASEURL ?>">
  <style>
    /* table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    } */

    h2 {
      text-align: center;
    }

    /* td,
    th {
      border: 1px solid #000000;
      text-align: left;
      padding: 8px;
    } */

    /* Ganti warna latar belakang untuk status "Disetujui" */
    .ACCEPTED {
      background-color: green;
      color: white;
    }

    /* Ganti warna latar belakang untuk status "Proses" */
    .PENDING {
      background-color: yellow;
      color: black;
    }

    /* Ganti warna latar belakang untuk status "Tidak disetujui" */
    .DENIED {
      background-color: rgb(255, 0, 0);
      color: black;
    }

    /* CSS untuk Tabel Daftar Peminjaman */
    table.table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    table.table th,
    table.table td {
      padding: 10px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table.table thead {
      background-color: #f2f2f2;
    }

    table.table th {
      font-weight: bold;
    }

    table.table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table.table tbody tr:hover {
      background-color: #e0e0e0;
    }

    .bg-white {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 20px;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>borrow-IT!</title>
</head>

<body>
  <header>
    <div class="container">
      <h1><a>borrow-IT!</a></h1>
      <ul>
        <li><a href="home/dashboard">HOME</a></li>
        <li><a href="home/peminjaman">PEMINJAMAN</a></li>
        <li class="active"><a href="home/status">STATUS PEMINJAMAN</a></li>
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
  <div class="bg-white">
    <br />
    <h2>STATUS PEMINJAMAN</h2>
    <br />
    <table style="width: 100%" class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Nama Kegiatan</th>
          <th>Ormawa</th>
          <th>Ruangan</th>
          <th>Tanggal</th>
          <th>Jam Awal</th>
          <th>Jam Berakhir</th>
          <th>Peralatan</th>
          <th>Status</th>
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
            <td class="<?= $value['status'] ?>"><?= $value['status'] ?></td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- <p align="right"><a href="">1 </a><a href="">2 </a><a href="">3 </a></p> -->
</body>

</html>