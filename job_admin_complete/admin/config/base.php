<?php
define("BASE_URL",       'http://localhost/job/');
define("BASE_URL_ADMIN", 'http://localhost/job/admin/');

// Flash message helper
function setFlash($type, $msg) {
    $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
}
function getFlash() {
    if (isset($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $f;
    }
    return null;
}
?>
