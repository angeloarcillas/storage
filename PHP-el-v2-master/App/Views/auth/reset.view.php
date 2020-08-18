<?php require_once 'App/Views/partials/_header.php'; ?>

<div class="card">
<div class="card-header">
  Login
</div>
<div class="card-body">
  <form action="/PHP-el-v2/auth/change-password" method="POST">
  <input type="password" name="oldPassword" placeholder="Old Password">
  <input type="password" name="newPassword" placeholder="New Password">
  <input type="password" name="confirmPassword" placeholder="Confirm Password">
  <button type="submit">Change password</button>
  </div>
  </form>
</div>
</div>

<?php require_once 'App/Views/partials/_footer.php'; ?>