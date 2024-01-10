<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <base href="<?= BASEURL ?>">
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>borrow-IT!</title>
  <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <!-- Memuat jQuery dari CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- <h4>
    <marquee>PEMINJAMAN DAPAT DILAKUKAN HARI SENIN - JUMAT PADA PUKUL 08.00 - 16.00 WIB</marquee>
  </h4> -->

  <header>
    <div class="container">
      <h1><a>borrow-IT!</a></h1>
      <ul>
        <li class="active"><a href="home/dashboard">HOME</a></li>
        <li><a href="home/peminjaman">PEMINJAMAN</a></li>
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

  <!-- banner -->
  <section class="banner">
    <h2>Borrow-IT</h2>
  </section>

  <!-- about -->
  <section class="about" id="about">
    <div class="container">
      <h3>ABOUT</h3>
      <p>
        <strong>borrow-IT!</strong> merupakan website peminjaman fasilitas kampus yang terdiri dari peminjaman ruangan, alat olahraga dan lainnya sesuai kebutuhan mahasiswa.
      </p>
    </div>
  </section>

  <!-- footer -->
  <footer>
    <div class="container">
      <small>Copyright &copy; All Rights Reserved.</small>
    </div>
  </footer>
</body>

</html>