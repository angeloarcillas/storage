<?php
// set token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// set token expire
// 1 hour = 60 seconds * 60 minutes = 3600
$_SESSION['token-expire'] = time() + 3600;
