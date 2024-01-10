<?php

class mahasiswa
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getMahasiswa()
  {
    $query = "SELECT id_mahasiswa, nama_mahasiswa, nim_mahasiswa, mahasiswa.id_organisasi,nama_organisasi 
    FROM mahasiswa 
    LEFT JOIN organisasi 
    ON mahasiswa.id_organisasi = organisasi.id_organisasi ";

    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function login($data)
  {
    $query = "SELECT * FROM mahasiswa WHERE nim_mahasiswa = :nim";

    $this->db->query($query);
    $this->db->bind('nim', $data['nim']);

    $result = $this->db->single();
    $verified = password_verify($data['password'], $result['password']);
    if ($verified) {
      $_SESSION['id_mahasiswa'] = $result['id_mahasiswa'];
      return $verified;
    } else {
      return false;
    }
  }


  public function tambahDataMahasiswa($data)
  {
    $query = "INSERT INTO mahasiswa
                    VALUES
                  (NULL, :nama, :password, :NIM, :ormawa)";

    $hashedPass = password_hash($data['password'], PASSWORD_DEFAULT);

    $this->db->query($query);
    $this->db->bind('nama', $data['name']);
    $this->db->bind('NIM', $data['NIM']);
    $this->db->bind('password', $hashedPass);
    $this->db->bind('ormawa', $data['ormawa']);

    $this->db->execute();
    $_SESSION['id_mahasiswa'] = $this->db->getID();;

    return $this->db->rowCount();
  }
}
