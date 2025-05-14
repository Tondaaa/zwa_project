<?php
    // zapnuti session
    session_start();
    
    // pripojeni k db
    mysqli_report(MYSQLI_REPORT_OFF);

    $db = mysqli_connect("localhost", "root", "", "archiveMaster");

    if($db === false){
        echo "<h2>Nepodařilo se připojit k databázi</h2>";
        exit;
    }
    mysqli_set_charset($db, "utf8mb4");