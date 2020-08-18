<?php
    // ERROR
if (isset($_SESSION['msg']['error'])) {
    echo '<div class="alert alert-danger text-center" role="alert">
                ' . $_SESSION['msg']['danger'] . '
                </div>';
    unset($_SESSION['msg']['error']);

    // SUCCESS
} elseif (isset($_SESSION['msg']['success'])) {
    echo '<div class="alert alert-success text-center" role="alert">
                ' . $_SESSION['msg']['success'] . '
                </div>';
    unset($_SESSION['msg']['success']);
}