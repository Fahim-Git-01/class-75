<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'new_job');

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($db->connect_error) {
    die("<div style='padding:20px;background:#f8d7da;color:#721c24;font-family:sans-serif;'>
        <b>Database Error:</b> " . $db->connect_error . "
    </div>");
}
$db->set_charset("utf8mb4");
?>
