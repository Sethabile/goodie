<?php
$db = new mysqli('localhost', 'root', '', 'goodie');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
