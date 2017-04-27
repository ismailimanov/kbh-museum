<?php
    $con = mysqli_connect("HOST","DBUSER","DBPASS","DBNAME");

    // Tjekker Forbindelsen
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>