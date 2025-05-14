<?php
function createFile($db, $poradCislo, $spisZnak, $nazev, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo){

    $stmt = mysqli_prepare($db, "
        INSERT INTO
        files(poradCislo,nazev,spisZnak,datumUlozeni,skartZnak,rokSkartace,rada,cislo)
        VALUES (?,?,?,?,?,?,?,?)
    ", );
    
    if($stmt === false){
        echo "Chyba při přidávání záznamu";
        echo "<p>" . mysqli_error($db) . "</p>";
        die();
    }

    mysqli_stmt_bind_param($stmt, "issssssi", $poradCislo, $spisZnak, $nazev, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při přidávání záznamu";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}


