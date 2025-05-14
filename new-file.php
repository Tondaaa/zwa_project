<?php
require "./utils/init.php";
require "./layout/head.phtml";
require "new-file.phtml";

if(isset($_POST["fileForm"])){
    createFile($poradCislo, $nazev, $spisZnak, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo);
}

require "./layout/tail.phtml";