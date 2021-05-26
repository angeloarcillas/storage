<?php require_once 'App/Views/partials/_header.php'; ?>

<div class="card w-50 mx-auto">
  <div class="card-header">
    <div class="card-title">Login</div>
  </div>

  <div class="card-body">
    
    <form action="/PHP-el-v2/auth/login" method="POST">

      <div>
      <label>Username</label>
      <input type="text" name="username">
      <p class="feedback success">Invalid username</p>
      </div>

      <div>
      <label>Password</label>
      <input type="password" name="password">
      <p class="feedback error">Invalid username</p>
      </div>

      <div class="mb-1">
        <input id="remember" class="form-check-input" type="checkbox" name="remember">
      <label for="remember" class="form-check-label rememberMe">
        Remember Me
      </label>
      </div>

      <div class="login-footer">
      <button type="submit" class="btn">Sign In</button>
      <a href="#">Forgot Password?</a>
      </div>
    </form>
  </div>
</div>

<?php require_once 'App/Views/partials/_footer.php'; ?>