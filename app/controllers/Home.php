<?php

class Home extends Controller
{
  public function index()
  {
    if (isset($_SESSION['loggedin'])) {
      if ($_SESSION['accounttype'] === 'mahasiswa') {
        header("Location: " . BASEURL . "home/dashboard");
        exit;
      }
    }
    $data['ormawa'] = $this->model('ormawa')->getOrmawa();

    $this->view('home/index', $data);
  }

  public function dashboard()
  {



    $this->view('home/dashboard');
  }

  public function peminjaman()
  {
    $data["list"] = array_reverse($this->model('peminjaman')->getListPeminjaman());
    $this->view('home/listpeminjam', $data);
  }

  public function book()
  {

    if (!empty($_POST)) {
      if ($_POST['method'] == 'booking') {
        unset($_POST['method']);
        $this->model('peminjaman')->booking($_POST);

        $this->peminjaman();
      }
    } else {
      $data['ruangan'] = $this->model('ruangan')->getRuangan();
      $this->view('home/peminjaman', $data);
    }
  }

  public function status()
  {
    $data['list'] = $this->model('peminjaman')->status();
    $this->view('home/laporan', $data);
  }

  public function logout()
  {
    session_destroy();
    header("Location: " . BASEURL);
  }

  public function login()
  {
    if (!empty($_POST)) {
      if ($this->model('mahasiswa')->login($_POST)) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['accounttype'] = "mahasiswa";

        header("Location: " . BASEURL . "home/dashboard");
      } else {
        $this->index();
      }
    }
  }

  public function register()
  {

    $result = $this->model('mahasiswa')->tambahDataMahasiswa($_POST);
    if ($result > 0) {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['accounttype'] = "mahasiswa";
      header("Location: " . BASEURL . "home/dashboard");
    } else {
      $this->index();
    }
  }
}
