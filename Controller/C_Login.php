<?php

require "../Model/M_Connexion.php";

session_start();

$erreurlogin = "";
$erreurpass = "";

if (isset($_POST["Connect"])) {

    $login = trim($_POST["User"]);
    $password = trim($_POST["Password"]);

    if (!empty($login) && !empty($password)) {

        $cnx = new Connexion();
        $pdo = $cnx->connect();

        $stmt = $pdo->prepare("SELECT id_admin, username, password FROM admin WHERE username = :login");
        $stmt->bindValue(":login", $login);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {

            if (password_verify($password, $admin["password"])) {

                $_SESSION["Admin"] = [
                    "id" => $admin["id_admin"],
                    "username" => $admin["username"]
                ];

                header("Location: Dashbord.php");
                exit();

            } else {
                $erreurpass = "Mot de passe incorrect";
            }

        } else {
            $erreurlogin = "Utilisateur incorrect";
        }

        $cnx->disconnect();

    } else {
        $erreurlogin = "Veuillez remplir tous les champs";
    }
}

require "../View/V_Login.php";
?>