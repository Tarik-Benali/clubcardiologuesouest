<?php
session_start(); // Démarrer la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include("config/params.php");

    global $servername;
    global $username;
    global $password;
    global $database;
    
    try {
        $dbh = new PDO("mysql:host=".$servername.";dbname=".$database."", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        header("Location: login.php?response=".$e->getMessage()."");
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }  

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $stmt = $dbh->prepare("SELECT * FROM utilisateurs WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Vérifier si le mot de passe correspond en comparant le hachage
        if (hash('sha512', $password) === $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: login.php?response=incorrect");
        }
    } else {
        header("Location: login.php?response=incorrect");
    }
    
    $dbh = null;
}else{
    header("Location: login.php");
}
?>