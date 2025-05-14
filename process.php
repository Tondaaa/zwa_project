<?php
if (isset($_POST['input1'])) {
    $val = $_POST['input1'];

    switch($val){
        case 1:
            echo date("Y")+1;
            break;
        case 2:
            echo date("Y")+2;
            break;
        case 3:
            echo date("Y")+3;
            break;
        case 4:
            echo date("Y")+4;
            break;
        case 5:
            echo date("Y")+5;
            break;
        default: echo "Neplatná hodnota";
    }
}
?>