<!DOCTYPE html>
<html>

<head>
  <style>
    /* table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    h2 {
      text-align: center;
    }

    td,
    th {
      border: 1px solid #000000;
      text-align: left;
      padding: 8px;
    } */
  </style>
  <base href="<?= BASEURL ?>">
  <link rel="icon" href="img/icon.png" type="image/png">
  <link rel="stylesheet" href="css/admin.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <article style="width: 100%;">
      <!-- <br> -->
      <div>
        <form class="idForm" action="admin/laporan" method="post">
          <input type="date" name="startDate" id="startDate" value=<?php $start = new DateTime("-15 days");
                                                                    echo $start->format("Y-m-d") ?>>
          <input type="date" name="endDate" id="endDate" value=<?php $end = new DateTime("15 days");
                                                                echo $end->format("Y-m-d") ?>>
          <select name="status" id="status">
            <option value="ALL">ALL</option>
            <option value="ACCEPTED">ACCEPTED</option>
            <option value="PENDING">PENDING</option>
            <option value="DENIED">DENIED</option>
          </select>
          <button type="submit">Cari Data</button>
        </form>
        <?= empty($data['laporan']) ? null :  '<button style="margin-left:15px;" class="btn btn-primary btn-sm" type="button" onclick="downloadPDF()">Download PDF</button>' ?>
      </div>
      <!-- <br> -->
      <div class="container-fluid">
        <div id="targetPDF">
          <center>
            <h4 class="h4">DAFTAR PEMINJAMAN</h4>
          </center>
          <table class="table ">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Ruangan</th>
                <th>Tanggal Peminjaman</th>
                <th>Jam Mulai</th>
                <th>Jam Akhir</th>
                <th>Peralatan Pendukung</th>
                <th>status</th>
              </tr>
            </thead>
            <tbody>

              <?php if (!empty($data['laporan'])) foreach ($data['laporan'] as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value['nama_kegiatan'] ?></td>
                  <td><?= $value['nama_ruangan'] ?></td>
                  <td><?= date_format(date_create($value['tanggal']), "d F Y") ?></td>
                  <td><?= date('H:i', strtotime($value['jam_mulai'])) ?></td>
                  <td><?= date('H:i', strtotime($value['jam_berakhir'])) ?></td>
                  <td><?= $value['peralatan'] ?></td>
                  <td><?= $value['status'] ?></td>

                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>


    </article>
    <!-- End anchor content -->
  </div>


  <footer>
    <h6>borrow-IT UHW Perbanas.</h6>
  </footer>
  <!-- Add Bootstrap JS and jQuery (optional) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    window.jsPDF = window.jspdf.jsPDF;
    var docPDF = new jsPDF();

    function downloadPDF() {
      let date = new Date

      let stringDate = "Laporan "
      stringDate = stringDate + date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear() + "/" + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()

      var elementHTML = document.querySelector("#targetPDF");
      window.html2canvas = html2canvas;
      docPDF.html(elementHTML, {
        callback: function(docPDF) {
          docPDF.save(stringDate + '.pdf');
        },
        x: 15,
        y: 15,
        width: 150,
        windowWidth: 650
      });
    }
  </script>
</body>

</html>