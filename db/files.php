<?php
function createFile($db, $poradCislo, $spisZnak, $nazev, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo){

    $stmt = mysqli_prepare($db, "
        INSERT INTO
        files(poradCislo,spisZnak,nazev,datumUlozeni,skartZnak,rokSkartace,rada,cislo)
        VALUES (?,?,?,?,?,?,?,?)
    ");
    
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

function listFiles($db){
    $result = mysqli_query($db, "SELECT * FROM files ORDER BY rokSkartace ASC");

    if($result === false){
        echo "<p>Chyba při výpisu záznamů: " . mysqli_error($db);
        return [];
    }
    return $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getFile($db, $id){
    $stmt = mysqli_prepare($db, "SELECT * FROM files WHERE id = ?
    ", );
    
    if($stmt === false){
        echo "Chyba při získání souboru";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při získání souboru";
        echo "<p>" . mysqli_error($db) . "</p>";
    }

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}

function editFile($db, $id, $poradCislo, $spisZnak, $nazev, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo){
    $stmt = mysqli_prepare($db, "
        UPDATE files
        SET poradCislo = ?, spisZnak = ?, nazev = ?, datumUlozeni = ?, skartZnak = ?, rokSkartace = ?, rada = ?, cislo = ?
        WHERE id = ?
    ", );

    if($stmt === false){
        echo "Chyba při úpravě dokumentu";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "dssssssii", $poradCislo, $spisZnak, $nazev, $datumUlozeni, $skartZnak, $rokSkartace, $rada, $cislo, $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při úpravě dokumentu";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}

function deleteFile($db, $id){
    $stmt = mysqli_prepare($db, "
        DELETE
        FROM files
        WHERE id = ?
    ", );
    
    if($stmt === false){
        echo "Chyba při mazání záznamu";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při mazání záznamu";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}
