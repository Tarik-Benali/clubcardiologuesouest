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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    // Récupérez les données du formulaire
	    $nom = $_POST['nom'];
	    $prenom = $_POST['prenom'];
	    $telephone = $_POST['telephone'];
	    $email = $_POST['email'];
	    $specialite = $_POST['specialite'];
	    $fonction = $_POST['fonction'];
	    $adressePro = $_POST['adressePro'];
	    $status = $_POST['status'];

	    /*function isPhoneNumber($phoneNumber) {
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
	    }*/

	    $inscriptionId = $_POST['inscription_id'];

	    $sql = "UPDATE inscriptions
	            SET nom = ?, prenom = ?, telephone = ?, email = ?, specialite = ?, fonction = ?, adressePro = ?, status = ?
	            WHERE id = ?";

	    try {
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([$nom, $prenom, $telephone, $email, $specialite, $fonction, $adressePro, $status, $inscriptionId]);
	        header("Location: dashboard.php?response=success");
	    } catch (PDOException $e) {
	        header("Location: dashboard.php?response=".$e->getMessage()."");
	    }
	} 

	elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["deleter"])) {
		$sql = "UPDATE inscriptions
	            SET inTrash = ?, deletedBy = ?
	            WHERE id = ?";

	    try {
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([1,$_GET["deleter"],$_GET["id"]]);
	        header("Location: dashboard.php?response=success_d");
	    } catch (PDOException $e) {
	        header("Location: dashboard.php?response=".$e->getMessage()."");	        
	    }
	}

	else {
	    // Gérez le cas où la requête HTTP n'est pas de type POST
	    // Cela peut inclure une redirection, un message d'erreur, etc.
	    header("Location: dashboard.php?response=error");
	}

	$conn = null;
?>
