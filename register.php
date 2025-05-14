<?php

    require "./utils/init.php";    
    require "./db/users.php";
    require "./layout/head.phtml";
    
    if(isset($_POST["regForm"])){
        if($_POST["password"] !== $_POST["password2"]){
            echo "<p>Hesla se neshodují</p>";
        } else {
            registerUser($db, $_POST["username"], $_POST["password"], $_POST["email"]);
        }
    }

    require "register.phtml";
    require "./layout/tail.phtml";