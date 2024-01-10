<?php

class peminjaman
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // SELECT * FROM `peminjaman` WHERE `tanggal` BETWEEN '2024-01-01' AND '2024-01-7';
  //SELECT *  FROM `peminjaman` WHERE `tanggal` BETWEEN '2024-01-01' AND '2024-01-31' AND `status` = 'ACCEPTED'
  public function generateLaporan($data)
  {
    if ($data['status'] === 'ALL') {
      $query = "SELECT id_peminjaman,nama_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan WHERE `tanggal` BETWEEN :start AND :end;";
      $this->db->query($query);
      $this->db->bind('start', $data['startDate']);
      $this->db->bind('end', $data['endDate']);

      return $this->db->resultSet();
    } else {
      $query = "SELECT id_peminjaman,nama_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan WHERE `tanggal` BETWEEN :start AND :end AND `status` = :status;";
      $this->db->query($query);
      $this->db->bind('start', $data['startDate']);
      $this->db->bind('end', $data['endDate']);
      $this->db->bind('status', $data['status']);

      return $this->db->resultSet();
    }
  }


  public function getListPeminjamanAdmin()
  {
    $query =
      "SELECT id_peminjaman,nama_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan
      WHERE `status`='PENDING' ;";

    $this->db->query($query);

    return $this->db->resultSet();
  }
  public function getListPeminjaman()
  {
    $query =
      "SELECT id_peminjaman,nama_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan
      WHERE `status`='PENDING' OR `status` = 'ACCEPTED' ;";

    $this->db->query($query);

    return $this->db->resultSet();
  }

  public function booking($data)
  {
    $query =
      "INSERT INTO `peminjaman` (`id_peminjaman`, `nama_kegiatan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `peralatan`, `id_mahasiswa`, `id_ruangan`, `status`) 
      VALUES (NULL, :nama_kegiatan, :tanggal, :jam_mulai, :jam_berakhir, :peralatan, :id_mahasiswa, :id_ruangan, 'PENDING')";

    $this->db->query($query);
    $this->db->bind('nama_kegiatan', $data['kegiatan']);
    unset($data['kegiatan']);
    $this->db->bind('tanggal', $data['tanggal']);
    unset($data['tanggal']);
    $this->db->bind('jam_mulai', $data['jam_mulai']);
    unset($data['jam_mulai']);
    $this->db->bind('jam_berakhir', $data['jam_akhir']);
    unset($data['jam_akhir']);
    $this->db->bind('id_mahasiswa', $_SESSION['id_mahasiswa'] ?: 0);
    $this->db->bind('id_ruangan', $data['ruangan']);
    unset($data['ruangan']);

    // prepare sisa array untuk jadi peratalan pakai string by comma
    $prepared_peralatan = '';
    if (!empty($data)) {
      foreach ($data as $key => $value) {
        $prepared_peralatan .= $key . ', ';
      }
    }

    $this->db->bind('peralatan', $prepared_peralatan);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function status()
  {
    $query =
      "SELECT nama_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan
      WHERE peminjaman.id_mahasiswa = :id";

    $this->db->query($query);
    $this->db->bind('id', $_SESSION['id_mahasiswa']);

    return $this->db->resultSet();
  }
  public function getPeminjaman($id)
  {
    $query =
      "SELECT id_peminjaman,nama_mahasiswa,nim_mahasiswa,nama_kegiatan,nama_organisasi,nama_ruangan,tanggal,jam_mulai,jam_berakhir,peralatan,status 
      FROM `peminjaman` 
      LEFT JOIN `mahasiswa` 
      ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa 
      LEFT JOIN `organisasi` 
      ON mahasiswa.id_organisasi = organisasi.id_organisasi 
      LEFT JOIN `ruangan`
      on peminjaman.id_ruangan = ruangan.id_ruangan
      WHERE peminjaman.id_peminjaman = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    return $this->db->resultSet();
  }

  public function updateStatus($data)
  {
    $query = "UPDATE `peminjaman` SET `status`= :status WHERE `id_peminjaman` = :id_peminjaman";

    $this->db->query($query);

    $this->db->bind('status', $data['status']);
    $this->db->bind('id_peminjaman', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
