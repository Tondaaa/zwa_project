<?php
if (isset($_POST['input1'])) {
    $val = $_POST['input1'];

    if ($val === '1'){
        echo date("Y")+3;
    }
    elseif ($val === '2'){
        echo date("Y")+5;
    }
    else echo "Neplatný skartovací znak";

}
?>