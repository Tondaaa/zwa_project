<?php
require "./utils/init.php";
require "./db/files.php";
require "./layout/head.phtml";

if(isset($_POST["deleteFile"])){
     if(!isset($_SESSION["loggedUser"]["is_admin"])){
          header("Location: index.php");
          exit;
     }
     deleteFile($db, $_POST["id"]);
}

if(isset($_POST["saveFile"])){
     if(!isset($_SESSION["loggedUser"]["is_admin"])){
          header("Location: index.php");
          exit;
     }
     editFile($db, $_GET["id"], $_POST["poradCislo"], $_POST["char1"], $_POST["name"], $_POST["date"], $_POST["char2"], $_POST["yearSkart"], $_POST["row"], $_POST["number"]);
     header("Location: index.php");
}

if(isset($_GET["id"])){
     $file = getFile($db, $_GET["id"]);
     require "edit-file.phtml";
}
else{
     $files = listFiles($db);
     require "homepage.phtml";
}

require "./layout/tail.phtml";
