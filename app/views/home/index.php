<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?= BASEURL ?>">
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>borrow-IT!</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="header">
    <span style="margin-left: 40px;">
      <img class="logo" src="img/icon.png" style="width: 32px;" />
    </span>

    <nav class="navBar">
      <a href="admin">Admin</a>
      <button class="btnLogin-popup">Login</button>
    </nav>
    <div class="barsIcon">
      <div class="bars">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
    </div>
  </div>

  <div class="reducedMenu">
    <li><button class="dropdownBtn">Login</button></li>
    <li><a href="admin" class="dropdownBtn">Admin</a></li>
  </div>

  <div class="wrapper">
    <span class="icon-close">
      <ion-icon name="close"></ion-icon>
    </span>

    <div class="form-box login">
      <h2>Login</h2>

      <form action="home/login" method="post">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input name="nim" type="text" required />
          <label>NIM</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input name="password" type="password" required />
          <label>password</label>
        </div>


        <button type="submit" class="login-btn">Login</button>

        <div class="login-register">
          <p>
            Don't have account? <a class=" register-link">Register</a>
          </p>
        </div>
      </form>
    </div>

    <div class="form-box register">
      <h2>Registration</h2>

      <form action="home/register" method="post">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input name="name" type="text" required />
          <label>Nama</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input name="NIM" type="number" required />
          <label>NIM</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input name="password" type="password" required />
          <label>password</label>
        </div>
        <div class="input-box" style="display: flex; align-items: center;">
          <span class="icon">
            <ion-icon name="school"></ion-icon>
          </span>
          <select name="ormawa" id="ormawa">
            <?php foreach ($data['ormawa'] as $key => $value) : ?>
              <option value="<?= $value['id_organisasi'] ?>"><?= $value['nama_organisasi'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="submit" class="login-btn">Register</button>

        <div class="login-register">
          <p>
            Already have account?
            <a class="login-link">Login</a>
          </p>
        </div>
      </form>
    </div>
  </div>
  <script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>