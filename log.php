<?php
// Fonction pour enregistrer les logs dans un fichier
function logger($message) {
    // Chemin du fichier de logs
    $file = 'logs.txt';
    // Ouvrir le fichier en mode écriture (ajout)
    $handle = fopen($file, 'a');
    // Format du message de log avec la date actuelle
    $log_message = "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
    // Écrire le message de log dans le fichier
    fwrite($handle, $log_message);
    // Fermer le fichier
    fclose($handle);
}

// Exemple d'utilisation de la fonction logger()
logger("Message de log test");
?>