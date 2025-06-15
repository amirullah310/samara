<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <div class="login-box">
    <div class="login-header">
      <div class="avatar">
        <i class="fa-solid fa-user-tie"></i>
      </div>
      <h2>ADMIN</h2>
    </div>

    <form action="ceklogin.php" method="post" class="login-form">
      <div class="input-group">
        <i class="fa-solid fa-user icon"></i>
        <input type="text" placeholder="Username" name="id_admin" required>
      </div>

      <div class="input-group">
        <i class="fa-solid fa-eye icon toggle-password" onclick="togglePassword()"></i>
        <input type="password" placeholder="Password" id="password" name="password" required>
      </div>

      <button type="submit" class="btn-login">Sign in</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const icon = document.querySelector('.toggle-password');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>

</body>
</html>
