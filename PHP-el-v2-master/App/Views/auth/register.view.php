<?php
    require_once 'App/Views/partials/_header.php';
?>

<main class="main-container">
    <h1>Register</h1>
    <form action="/PHP-el-v2/auth/register" method="POST">
    <input type="text" name="username" placeholder="Username">
    <p class="password-meter">test</p>
    <input onkeyup="x(this.value)" type="password" name="password" placeholder="Password">
    <input type="password" name="confirmPassword" placeholder="Confirm Password">
    <button class="btn" type="submit">Register</button>
    </form>
</main>

<?php
    require_once 'App/Views/partials/_footer.php';
?>