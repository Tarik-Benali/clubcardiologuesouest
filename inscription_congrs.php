<?php

    include("config/params.php");

    global $servername;
    global $username;
    global $password;
    global $database;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "La connexion à la base de données a échoué : " . $e->getMessage();
    }


    $nom        = $_POST['nom'];
    $prenom     = $_POST['prenom'];
    $telephone  = $_POST['telephone'];
    $email      = $_POST['email'];
    $specialite = $_POST['specialite'];
    $fonction   = $_POST['fonction'];
    $adressePro = $_POST['adressePro'];


    function isPhoneNumber($phoneNumber) {
        return preg_match('/^\d{10,}$/', $phoneNumber);
    }


    function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    if (!isPhoneNumber($telephone)) {
        $response = ["error" => "Format du numéro de téléphone invalide ! Merci de vérifier votre numéro et d'essayer à nouveau !"];
        echo json_encode($response);
        exit;
    }

    if (!isEmail($email)) {
        $response = ["error" => "Format d'e-mail invalide ! Merci de vérifier l'adresse email et d'essayer à nouveau !"];
        echo json_encode($response);
        exit;
    }


    $dateInscription = date("Y-m-d H:i:s");


    $sql = "INSERT INTO inscriptions (nom, prenom, telephone, email, specialite, fonction, adressePro, dateInscription) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $telephone, $email, $specialite, $fonction, $adressePro, $dateInscription]);
        $response = ["success" => "Inscription réussie"];
        echo json_encode($response);
    } catch (PDOException $e) {
        $response = ["error" => "Erreur lors de l'inscription : " . $e->getMessage()];
        echo json_encode($response);
    }

    $conn = null;
?>
