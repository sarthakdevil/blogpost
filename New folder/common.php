<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blog";
    $conn = mysqli_connect($servername, $username, $password, $database);
}
    ?>