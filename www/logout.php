<?php
require 'config/sql_connect.php';
session_destroy();

header('Location: index.php');
?>
