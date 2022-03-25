<?php
// connexion à la base de données
require '../../class/class.database.php';
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select id, nom, prenom, ordre
            From pilote
            Order By id;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// envoyer le résultat au format JSON
echo json_encode($lesLignes);