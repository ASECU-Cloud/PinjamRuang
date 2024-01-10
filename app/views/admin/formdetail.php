<!DOCTYPE html>
<html lang="en">


<head>
  <base href="<?= BASEURL ?>">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>borrow-IT!</title>
  <link rel="stylesheet" href="css/daftarpeminjaman.css" />
  <!-- Tambahkan Font Awesome atau pustaka ikon lainnya -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
      <div class="col-lg-10 border rounded p-1">
        <div class="border rounded text-center p-1">
          <div class="bg-white rounded text-center p-5">
            <h4 class="mb-4">
              Daftar <span class="text-primary">Peminjaman</span>
            </h4>
            <div class="container-fluid">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nama Ormawa</th>
                    <th>Nama Kegiatan</th>
                    <th>Ruangan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Peralatan Pendukung</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['data'] as $key => $value) : ?>

                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $value['nim_mahasiswa'] ?></td>
                      <td><?= $value['nama_mahasiswa'] ?></td>
                      <td><?= $value['nama_organisasi'] ?></td>
                      <td><?= $value['nama_kegiatan'] ?></td>
                      <td><?= $value['nama_ruangan'] ?></td>
                      <td><?= date_format(date_create($value['tanggal']), "d F Y") ?></td>
                      <td><?= date('H:i', strtotime($value['jam_mulai'])) ?></td>
                      <td><?= date('H:i', strtotime($value['jam_berakhir'])) ?></td>
                      <td><?= $value['peralatan'] ?></td>
                      <td>
                        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                          <form method="post">
                            <input type="text" name="status" value="ACCEPTED" hidden>
                            <input type="text" name="id" value="<?= $value['id_peminjaman'] ?>" hidden>
                            <button type="submit" class="btn btn-success">Setujui</button> <br> <br>
                          </form>
                          <form method="post">
                            <input type="text" name="status" value="DENIED" hidden>
                            <input type="text" name="id" value="<?= $value['id_peminjaman'] ?>" hidden>
                            <button type="submit" class="btn btn-primary">Tolak</button> <br> <br>
                          </form>
                          <!-- <button type="button"   class="btn btn-danger">Hapus</button> -->
                        </div>
                      </td>
                    </tr>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Newsletter Start -->



</body>

</html>