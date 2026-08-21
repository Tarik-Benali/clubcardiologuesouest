<?php
$response = array(); 
$file_path = "";

// Vérifiez d'abord si un fichier a été joint
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];

    // Limiter la taille du fichier
    $max_file_size = 20 * 1024 * 1024; // 20 Mo en octets

    if ($file_size <= $max_file_size) {
        // Valider le type de fichier (par exemple, PDF, Word, Excel)
        $allowed_file_types = [
            'application/pdf',
            'application/msword',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation'
        ];


        if (in_array($file_type, $allowed_file_types)) {
            // Générez un nom de fichier unique pour éviter les conflits
            $unique_file_name = uniqid('file_') . '_' . $file_name;

            // Déplacez le fichier vers le répertoire de destination
            $upload_directory = 'uploads/';
            $destination = $upload_directory . $unique_file_name;

            if (move_uploaded_file($file_tmp_name, $destination)) {
                // Le fichier joint a été téléchargé avec succès
                $response['file_message'] = 'Le fichier joint a été téléchargé avec succès.';
                $file_path = $destination; 
            } else {
                $response['file_message'] = 'Une erreur s\'est produite lors du téléchargement du fichier.';
            }
        } else {
            $response['file_message'] = 'Le type de fichier n\'est pas autorisé.';
        }
    } else {
        $response['file_message'] = 'Le fichier est trop volumineux. Limite : ' . ($max_file_size / 1024 / 1024) . ' Mo.';
    }
}

// Maintenant, enregistrez les autres informations dans la base de données
if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            include("config/params.php");

            global $servername;
            global $username;
            global $password;
            global $database;

            $pdo = new PDO("mysql:host=".$servername.";dbname=".$database."", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $wakt = date("Y-m-d H:i:s");

            $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message, attached_file, created_at) VALUES (:name, :email, :subject, :message, :file_path, :wakt)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':file_path', $file_path); // Enregistrez le chemin du fichier
            $stmt->bindParam(':wakt', $wakt);

            $stmt->execute();

            $message_envoye = true;

            if ($message_envoye) {
                $response['status'] = 'success';
                $response['message'] = 'Votre message a été envoyé avec succès.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Une erreur s\'est produite lors de l\'envoi de votre message.';
            }
        } catch (PDOException $e) {
            $response['status'] = 'error';
            $response['message'] = 'Erreur lors du traitement de la demande. Veuillez réessayer ultérieurement.'.$e;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'L\'adresse e-mail n\'est pas valide.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Tous les champs sont obligatoires.';
}

// Envoie la réponse sous forme de JSON
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
