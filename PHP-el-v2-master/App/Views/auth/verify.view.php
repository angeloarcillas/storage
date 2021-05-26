<?php require_once 'App/Views/partials/_header.php'; ?>
check email to verify account

<form action="/PHP-el-v2/auth/email/resend" method="POST">
<input type="hidden" name="email" value="<?php echo $email?>">
<button>Resend Verification</button>
</form>
<?php require_once 'App/Views/partials/_footer.php'; ?>