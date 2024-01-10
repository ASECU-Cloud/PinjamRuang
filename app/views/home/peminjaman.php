<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?= BASEURL ?>">
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>Form Peminjaman</title>
  <!-- <link rel="stylesheet" type="text/css" href="css/dashboard.css" /> -->

  <link rel="stylesheet" href="css/peminjaman.css" />
</head>

<body>
  <header>
    <div class="target">
      <h1><a>borrow-IT!</a></h1>
      <ul>
        <li><a href="home/dashboard">HOME</a></li>
        <li class=" active"><a href="home/peminjaman">PEMINJAMAN</a></li>
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
  <div class="container">
    <h2>FORMULIR PEMINJAMAN</h2>
    <form method="POST">
      <input type="text" name="method" value="booking" hidden>
      <div class="form-group">
        <label for="kegiatan">Nama Kegiatan:</label>
        <input type="text" id="kegiatan" name="kegiatan" required />
      </div>
      <div class="form-group">
        <label for="tanggal">Tanggal Peminjaman:</label>
        <input type="date" id="tanggal" name="tanggal" required />
      </div>
      <div class="form-group">
        <label for="ruangan">Ruangan:</label>
        <select id="ruangan" name="ruangan" required>
          <?php foreach ($data['ruangan'] as $key => $value) : ?>
            <option value="<?= $value['id_ruangan'] ?>"><?= $value['nama_ruangan'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="jam-mulai">Jam Mulai:</label>
        <input type="time" name="jam_mulai" id="jam-mulai">
      </div>
      <div class="form-group">
        <label for="jam-akhir">Jam Akhir:</label>
        <input type="time" name="jam_akhir" id="jam-akhir">
      </div>
      <div class="form-group">
        <div class="label">Peralatan Pendukung:</div>
        <!-- Checkbox preset -->
        <div class="label-checkbox">
          <label for="mic"><input type="checkbox" name="mic" id="mic"> mic </label>
          <label for="proyektor"><input type="checkbox" name="proyektor" id="proyektor"> proyektor </label>
          <label for="kabel"><input type="checkbox" name="kabel" id="kabel"> kabel </label>
        </div>

      </div>
      <div class="form-group" style="margin-top: 60px;">
        <button type="submit">Ajukan Peminjaman</button>
      </div>
    </form>
  </div>
</body>

</html>