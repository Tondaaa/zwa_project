<?php
if (isset($_POST['input1'])) {
    $val = $_POST['input1'];

    switch($val){
        case "S1":
            echo date("Y")+1;
            break;
        case "S2":
            echo date("Y")+2;
            break;
        case "S3":
            echo date("Y")+3;
            break;
        case "S4":
            echo date("Y")+4;
            break;
        case "S5":
            echo date("Y")+5;
            break;
        default: echo "Neplatná hodnota";
    }
}
?>