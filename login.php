<?php

    require "./utils/init.php";
    require "./db/users.php";
    require "./layout/head.phtml";

    if(isset($_POST["logForm"])){
        login($db, $_POST["username"], $_POST["password"]);
    }
    
    require "login.phtml";
    require "./layout/tail.phtml";
