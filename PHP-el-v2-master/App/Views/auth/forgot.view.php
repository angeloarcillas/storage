<?php require_once 'App/Views/partials/_header.php'; ?>

<div class="card">
<div class="card-header">
  Forgot password
</div>
<div class="card-body">
  <form action="/PHP-el-v2/auth/forgot-password" method="POST">
  <input type="text" name="email" placeholder="Email">
  <button type="submit">Send password reset</button>
  </div>
  </form>
</div>
</div>

<?php require_once 'App/Views/partials/_footer.php'; ?>