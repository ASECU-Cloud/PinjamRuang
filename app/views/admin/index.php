<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?= BASEURL ?>">
  <link rel="icon" href="img/icon.png" type="image/png">
  <title>borrow-IT!</title>
  <link rel="stylesheet" href="css/loginadmin.css" />
</head>

<body>
  <div class="header">
    <span style="margin-left: 40px;">
      <img class="logo" src="img/icon.png" style="width: 32px;" />
    </span>

    <nav class="navBar">
      <button class="btnLogin-popup">
        Login
      </button>
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
  </div>

  <div class="wrapper">
    <span class="icon-close">
      <ion-icon name="close" href="admin.html"></ion-icon>
    </span>

    <div class="form-box login">
      <h2>Login</h2>

      <form action="admin/login" method="post">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input name="username" type="username" required />
          <label>username</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input name="password" type="password" required />
          <label>password</label>
        </div>


        <button type="submit" class="login-btn">
          Login
        </button>

        <div class="login-register hidden">
          <p>
            Don't have account?
            <a class="register-link">Register</a>
          </p>
        </div>
      </form>
    </div>

    <div class="form-box register hidden">
      <h2>Registration</h2>

      <form action="#">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input type="text" required />
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input type="email" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon" href="home.html">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input type="password" required />
          <label>password</label>
        </div>

        <button type="submit" class="login-btn">
          Register
        </button>

        <div class="login-register">
          <p>Already have account? <a class="login-link">Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>