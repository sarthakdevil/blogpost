<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "sql12.freemysqlhosting.net";
    $username = "sql12667523";
    $password = "MmRBiNWmaX";
    $database = "sql12667523";
    $conn = mysqli_connect($servername, $username, $password, $database);
}
    ?>