<?php
if (empty($_SESSION['csrf_token']) || time() > $_SESSION['csrf_expire']) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $_SESSION['csrf_expire'] = time() + 3600; //expire after 1hr
}
echo '<input type="hidden" name="csrf" value="' . $_SESSION['csrf_token'] . '">';