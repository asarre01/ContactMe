<?php

class Contact {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllContacts() {
        // Define SQL query with a JOIN statement
        $sql = "SELECT contacts.*, categories.categoryName
                FROM contacts
                LEFT JOIN categories ON contacts.categoryID = categories.categoryID";
    
        // Prepare statement
        $stmt = $this->db->prepare($sql);
    
        // Execute the prepared statement
        $stmt->execute();
    
        // Fetch all
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Utilisez FETCH_ASSOC pour obtenir un tableau associatif
    
        return $result;
    }

    public function addContact($data) {
        try {
            // Vérifiez si les données nécessaires sont présentes
            if (
                !isset($data['firstName']) ||
                !isset($data['lastName']) ||
                !isset($data['category']) ||
                !isset($data['numberPhone']) ||
                !isset($data['avatar']) // Assurez-vous d'inclure l'avatar dans les données
            ) {
                throw new Exception('Données manquantes pour ajouter le contact.');
            }
    
            // Préparez la requête SQL
            $sql = "INSERT INTO contacts (firstName, lastName, categoryID, numberPhone, secondNumberPhone, email, avatar) 
                    VALUES (:firstName, :lastName, :category, :numberPhone, :secondNumberPhone, :email, :avatar)";
    
            // Préparez la déclaration
            $stmt = $this->db->prepare($sql);
    
            // Liez les paramètres
            $stmt->bindParam(':firstName', $data['firstName']);
            $stmt->bindParam(':lastName', $data['lastName']);
            $stmt->bindParam(':category', $data['category']);
            $stmt->bindParam(':numberPhone', $data['numberPhone']);
            $stmt->bindParam(':secondNumberPhone', $data['secondNumberPhone']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_LOB); // Utilisez PDO::PARAM_LOB pour les données binaires
    
            // Exécutez la requête
            $stmt->execute();
    
            return true; // Ajout réussi
        } catch (Exception $e) {
            return ['error' => $e->getMessage()]; // Retournez un tableau d'erreur
        }
    }
    
}
?>
