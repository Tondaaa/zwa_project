<?php
require "./utils/init.php";
require "./layout/head.phtml";

    if(!isset($_SESSION["loggedUser"]["is_admin"])) header("Location: index.php");
    
    $rowStmt = mysqli_prepare($db, "SELECT DISTINCT radaRacku FROM storage ORDER BY radaRacku");
    mysqli_stmt_execute($rowStmt);
    $rowResult = mysqli_stmt_get_result($rowStmt);
    $rows = [];
    while($row = mysqli_fetch_assoc($rowResult)) {
        $rows[] = $row["radaRacku"];
    }
    mysqli_stmt_close($rowStmt);

    $rackStmt = mysqli_prepare($db, "SELECT DISTINCT cisloRacku FROM storage ORDER BY cisloRacku");
    mysqli_stmt_execute($rackStmt);
    $rackResult = mysqli_stmt_get_result($rackStmt);
    $racks = [];
    while($rack = mysqli_fetch_assoc($rackResult)) {
        $racks[] = $rack["cisloRacku"];
    }
    mysqli_stmt_close($rackStmt);

require "new-file.phtml";
require "./db/files.php";

if(isset($_POST["fileForm"])){
    createFile($db, $_POST["poradCislo"], $_POST["char1"], $_POST["name"], $_POST["date"], $_POST["char2"], $_POST["yearSkart"], $_POST["row"], $_POST["number"]);
}


require "./layout/tail.phtml";