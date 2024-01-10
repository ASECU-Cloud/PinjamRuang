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
        <article style="width: 100%;">
            <!-- <br> -->
            <center>
                <h4 class="h4">DAFTAR PEMINJAMAN</h4>
            </center>
            <!-- <br> -->
            <div class="container-fluid">
                <table class="table table-striped">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data['list'])) : ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">Semua Permintaan sudah di respon.</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($data['list'] as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['nama_kegiatan'] ?></td>
                                <td><?= $value['nama_ruangan'] ?></td>
                                <td><?= date_format(date_create($value['tanggal']), "d F Y") ?></td>
                                <td><?= date('H:i', strtotime($value['jam_mulai'])) ?></td>
                                <td><?= date('H:i', strtotime($value['jam_berakhir'])) ?></td>
                                <td><?= $value['peralatan'] ?></td>
                                <td><?= $value['status'] ?></td>
                                <td class="action-buttons">
                                    <a href="admin/formdetail/<?= $value['id_peminjaman'] ?>" class="btn btn-success">
                                        <p style="font-size: 13px; text-align: center; margin-top: 1px; margin-bottom: 1px;">View</p>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
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

</body>

</html>