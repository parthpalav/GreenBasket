<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect('localhost', 'root', '', 'farmermarketplace');

if ($con) {
// Connection succesful
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>
