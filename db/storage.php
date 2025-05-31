<?php
function createStorage($db, $ID_rady, $ID_racku){

    $stmt = mysqli_prepare($db, "
        INSERT INTO
        storage(radaRacku, cisloRacku)
        VALUES (?,?)
    ", );
    
    if($stmt === false){
        echo "Chyba při přidávání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
        die();
    }

    mysqli_stmt_bind_param($stmt, "si", $ID_rady, $ID_racku);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při přidávání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}

function listStorage($db){
    $result = mysqli_query($db, "SELECT * FROM storage ORDER BY radaRacku ASC");

    if($result === false){
        echo "<p>Chyba při výpisu úložných prostor: " . mysqli_error($db);
        return [];
    }
    return $racks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getStorage($db, $id){
    $stmt = mysqli_prepare($db, "SELECT * FROM storage WHERE ID = ?
    ", );
    
    if($stmt === false){
        echo "Chyba při získání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při získání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
    }

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}

function editStorage($db, $id, $radaRacku, $cisloRacku){
    $stmt = mysqli_prepare($db, "
        UPDATE storage
        SET radaRacku = ?, cisloRacku = ?
        WHERE ID = ?
    ", );

    if($stmt === false){
        echo "Chyba při úpravě úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sii", $radaRacku, $cisloRacku, $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při úpravě úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}

function deleteStorage($db, $id){
    $stmt = mysqli_prepare($db, "
        DELETE
        FROM storage
        WHERE ID = ?
    ", );
    
    if($stmt === false){
        echo "Chyba při mazání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při mazání úložiště";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}
