<?php

function registerUser($db, $username, $password, $email){

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = mysqli_prepare($db, "
        INSERT INTO
        users(username, password, email)
        VALUES (?, ?, ?)
    ", );
    
    if($stmt === false){
        echo "Chyba při vytváření uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při vytváření uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
    else{
        echo "Úspěšně jste se zaregistrovali";
    }
}

function getUser($db, $username){
    $stmt = mysqli_prepare($db, "
        SELECT *
        FROM users
        WHERE username = ?
    ", );
    
    if($stmt === false){
        echo "Nezdařilo se získat uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Nezdařilo se získat uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
    }

    return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
}

function login($db, $username, $password){
    $user = getUser($db, $username);

    if($user === NULL || !password_verify($password, $user["password"])){
        echo "Neplatné přihlašovací údaje";
        return;
    }
    echo "Úspěšné přihlášení";
    $_SESSION["loggedUser"] = $user;
    header("Location: index.php");
}