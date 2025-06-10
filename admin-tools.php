<?php
require "./utils/init.php";
require "./db/users.php";

if(!isset($_SESSION["loggedUser"]["is_admin"])) header("Location: index.php");

if(isset($_POST["saveUser"])){
     $is_admin = ($_POST["is_admin"] == "1") ? 1 : null;
     updateUser($db, $_POST["id"], $is_admin);
     header("Location: admin-tools.php");
}

if(isset($_POST["deleteUser"])){
     deleteUser($db, $_POST["id"]);
     header("Location: admin-tools.php");
}

require "./layout/head.phtml";
$users = listUsers($db);
require "admin-tools.phtml";
require "./layout/tail.phtml";
