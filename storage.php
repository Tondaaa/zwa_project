<?php
require "./utils/init.php";
require "./layout/head.phtml";
require "./db/storage.php";

if(isset($_POST["deleteStorage"])){
     if(!isset($_SESSION["loggedUser"]["is_admin"])){
          header("Location: storage.php");
          exit;
     }
     deleteStorage($db, $_POST["id"]);
}

if(isset($_POST["saveStorage"])){
     if(!isset($_SESSION["loggedUser"]["is_admin"])){
          header("Location: storage.php");
          exit;
     }
     editStorage($db, $_GET["id"], $_POST["radaRacku"], $_POST["cisloRacku"]);
     header("Location: storage.php");
}

if(isset($_GET["id"])){
     $rack = getStorage($db, $_GET["id"]);
     require "edit-storage.phtml";
}
else{
     $racks = listStorage($db);
     require "storage.phtml";
}

require "./layout/tail.phtml";