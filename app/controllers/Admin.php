<?php

class Admin extends Controller
{
  public function index()
  {
    if (isset($_SESSION['loggedin'])) {
      if ($_SESSION['accounttype'] === 'admin') {
        header("Location: " . BASEURL . "admin/dashboard");
        exit;
      }
    }
    $this->view('admin/index');
  }

  public function dashboard()
  {
    $data["list"] = array_reverse($this->model('peminjaman')->getListPeminjamanAdmin());

    $this->view('admin/dashboard', $data);
  }

  public function formdetail($id)
  {
    if (!empty($_POST)) {
      $this->model('peminjaman')->updateStatus($_POST);
      header("Location: " . BASEURL . "admin/dashboard");
    }
    $data['data'] = $this->model('peminjaman')->getPeminjaman($id);
    $this->view('admin/formdetail', $data);
  }

  public function ruangan()
  {
    $data['ruangan'] = $this->model('ruangan')->getRuangan();

    $this->view('admin/ruangan', $data);
  }

  public function laporan()
  {
    if (!empty($_POST)) {
      $data['laporan'] = $this->model('peminjaman')->generateLaporan($_POST);
      $this->view('admin/laporan', $data);
    }
    $this->view('admin/laporan');
  }

  public function mahasiswa()
  {
    $data['mahasiswa'] = $this->model('mahasiswa')->getMahasiswa();

    $this->view('admin/mahasiswa', $data);
  }

  public function ormawa()
  {
    $data['ormawa'] = $this->model('ormawa')->getOrmawa();
    $this->view('admin/ormawa', $data);
  }



  public function logout()
  {
    session_destroy();
    header("Location: " . BASEURL);
  }

  public function login()
  {
    if (!empty($_POST)) {
      if ($_POST['username'] === "admin" && $_POST['password'] === "pass") {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['accounttype'] = "admin";
        header("Location: " . BASEURL . "admin/dashboard");
      } else {
        $this->index();
      }
    }
  }
}
