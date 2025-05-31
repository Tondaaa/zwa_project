<?php
require "./utils/init.php";
require "./layout/head.phtml";
require "new-storage.phtml";
require "./db/storage.php";

if(isset($_POST["storageForm"])){
    createStorage($db, $_POST["radaRacku"], $_POST["cisloRacku"]);
}

require "./layout/tail.phtml";