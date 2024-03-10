<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = '192.168.1.18';
$databaseName = 'zema';
$databaseUsername = 'asuna';
$databasePassword = 'Asuna123!';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>