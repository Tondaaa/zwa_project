<?php

    require "./utils/init.php";

    unset($_SESSION["loggedUser"]);

    header("Location: index.php");