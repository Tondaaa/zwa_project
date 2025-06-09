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
        echo "<div class='registerSuccess'><p>Úspěšně jste se zaregistrovali!<br>Nyní se můžete <a href='login.php'>přihlásit</a></p></div>";
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

function listUsers($db){
    $result = mysqli_query($db, "SELECT ID, username, email, is_admin FROM users ORDER BY ID ASC");

    if($result === false){
        echo "<p>Chyba při výpisu uživatelů: " . mysqli_error($db);
        return [];
    }
    return $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function updateUser($db, $id, $is_admin){
    if ($is_admin === null) {
        $stmt = mysqli_prepare($db, "
            UPDATE users
            SET is_admin = NULL
            WHERE ID = ?
        ");
        mysqli_stmt_bind_param($stmt, "i", $id);
    } else {
        $stmt = mysqli_prepare($db, "
            UPDATE users
            SET is_admin = 1
            WHERE ID = ?
        ");
        mysqli_stmt_bind_param($stmt, "i", $id);
    }

    if($stmt === false){
        echo "Chyba při aktualizaci uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při aktualizaci uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}

function deleteUser($db, $id){
    $stmt = mysqli_prepare($db, "
        DELETE FROM users
        WHERE ID = ?
    ");
    
    if($stmt === false){
        echo "Chyba při mazání uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_execute($stmt);

    if($result === false){
        echo "Chyba při mazání uživatele";
        echo "<p>" . mysqli_error($db) . "</p>";
    }
}
