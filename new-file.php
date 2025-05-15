<?php
require "./utils/init.php";
require "./layout/head.phtml";
require "new-file.phtml";
require "./db/files.php";

if(isset($_POST["fileForm"])){
    createFile($db, $_POST["poradCislo"], $_POST["char1"], $_POST["name"], $_POST["date"], $_POST["char2"], $_POST["yearSkart"], $_POST["row"], $_POST["number"]);
}


require "./layout/tail.phtml";