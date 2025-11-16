<?php
/**
 * Fichier de configuration de la connexion à la base de données.
 * Compatible MySQL / MariaDB.
 */

define('DB_HOST', 'rds.relance.nc');     // Hôte de la base de données (ex: 127.0.0.1)
define('DB_NAME', 'PROJET_MIAGE'); // Nom de la base de données
define('DB_USER', 'PROJET_MIAGE');    // Nom d’utilisateur MySQL
define('DB_PASS', 'ZuNm40g@yat7M_hq');   // Mot de passe MySQL
define('DB_CHARSET', 'utf8mb4');     // Jeu de caractères

/**
 * Fonction de connexion PDO (sécurisée et réutilisable)
 */
function getDBConnection(): PDO {
    static $pdo = null; // Singleton : évite plusieurs connexions
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => true // Connexion persistante
            ]);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
    return $pdo;
}
