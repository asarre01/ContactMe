<?php
require_once("./contact.class.php");

try {
    // Paramètres de connexion à la base de données
    $hostname = '127.0.0.1';
    $dbname = 'db_contact';
    $username = 'admin';
    $password = 'admin123';

    // Connexion à la base de données avec PDO
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // Configuration pour générer des exceptions en cas d'erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instanciation de la classe Contact
    $contact = new Contact($db);

    // Vérifier si l'action est définie dans la requête
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Traiter l'action en conséquence
        switch ($action) {
            case 'getAllContacts':
                // Récupérer tous les contacts
                echo json_encode($contact->getAllContacts());
                break;
            case 'addContact':
                // Récupérer les données du formulaire
                $data = $_POST;

                // Ajouter un nouveau contact
                echo json_encode($contact->addContact($data));
                break;
            default:
                // Action non reconnue
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Action non reconnue']);
        }
    }
} catch (PDOException $e) {
    // Enregistrez l'erreur dans un fichier journal ou notifiez un administrateur
    error_log('Erreur de connexion PDO : ' . $e->getMessage());
    echo json_encode(['error' => 'Une erreur est survenue. Veuillez réessayer plus tard.']);
} catch (Exception $e) {
    // Enregistrez l'erreur dans un fichier journal ou notifiez un administrateur
    error_log('Erreur générale : ' . $e->getMessage());
    echo json_encode(['error' => 'Une erreur est survenue. Veuillez réessayer plus tard.']);
}
?>
