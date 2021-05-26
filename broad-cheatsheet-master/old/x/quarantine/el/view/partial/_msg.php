<?php
// unset($_SESSION);

// SUCCESS
if (isset($_SESSION['msg'])) {
    if (!empty($_SESSION['msg']['success'])) {
        echo '<div class="alert alert-success" role="alert">
              ' . $_SESSION['msg']['success'] . '
              </div>';
    }
// ERROR
    if (!empty($_SESSION['msg']['error'])) {
        echo '<div class="alert alert-danger" role="alert">
                ' . $_SESSION['msg']['error'] . '
                </div>';
    }
    unset($_SESSION['msg']);
}
