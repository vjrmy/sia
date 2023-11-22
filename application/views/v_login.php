<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="<?= base_url() ?>assets/unkartur/logoPT.png">
    <title>SIAKAD UNKARTUR</title> 
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app.rtl.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/auth.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/sweetalert2/sweetalert2.min.css">
</head>
<body>
    <script src="<?= base_url() ?>assets/static/js/initTheme.js"></script>
    <div id="auth">
<div class="row h-100">
    <div class="col-lg-5">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="#"><img src="<?= base_url() ?>assets/unkartur/logopt2.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">LOGIN</h1>
            <p class="auth-subtitle mb-3">Masukkan data login Anda dan mulailah perjalanan belajar bersama kami</p>
            <form>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" id="username" class="form-control form-control-xl" placeholder="Username" autocomplete="username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" id="password" class="form-control form-control-xl" placeholder="Password" autocomplete="current-password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <!-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> -->
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-6 btn-login">Log in</button>
            </form>
            <div class="text-center mt-6 text-lg fs-10">
                <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign up</a></p>
                <p><a class="font-bold" href="auth-forgot-password.html">Forgot password</a></p>
            </div>
        </div>
        <footer class="footer-login d-flex align-items-right justify-content-between">
          <p class="col-2 mr-5">SIAKAD</p>
          <p class="col-2 d-flex d-none d-md-block justify-content-center">Versi 1.0</p>
          <p class="col-6 d-flex align-items-left justify-content-left">Copyright © 2023 by Vic Jeremy</p>
        </div>
    </footer>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
    </div>
</div>
    </div>
    <script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/extensions/sweetalert2/sweetalert2.min.js"></script>
   <script>
        $(document).ready(function() {
        $(".btn-login").click( function() {
          var username = $("#username").val();
          var password = $("#password").val();
          if(username.length == "") {
            Swal.fire({
              icon: 'warning',
              title: 'Oops',
              text: 'Username Wajib Diisi'
            });
          } else if(password.length == "") {
            Swal.fire({
              icon: 'warning',
              title: 'Oops',
              text: 'Password Wajib Diisi'
            });
          } else {
            $.ajax({
              url: "<?php echo base_url() ?>Login/autentikasi",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },
              success:function(response){
                if (response == "admin") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat Datang Admin Unkartur',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>Home";
                  });
                }else if (response == "dosen") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat Datang Dosen Unkartur',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>Home";
                  });
                }else if (response == "mahasiswa") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat Datang Mahasiswa Unkartur',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>Home";
                  });
                }else if (response == "keuangan") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Data Kamu Ditemukan',
                    text: 'Mohon maaf belum ada halamannya',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>Login/logout";
                  });
                }else if (response == "block") {
                  Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Akun kamu tidak aktif. Silahkan hubungi admin untuk aktivasi.'
                  });
                }else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Username atau Password tidak ditemukan atau salah'
                  });
                }
                console.log(response);
              },
              error:function(xhr, status, error){
                  Swal.fire({
                    icon: 'error',
                    title: 'Opps',
                    text: 'server error'
                  });
                  console.log();
              }
            });
          }
        }); 
      });
  </script>
</body>
</html>