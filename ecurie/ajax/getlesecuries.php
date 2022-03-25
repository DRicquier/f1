<?php
// connexion à la base de données
require '../../class/class.database.php';
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
            Select id, nom, photo, idPays
            From ecurie
            Order By id;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesEcuries'] = $lesLignes;

$sql = <<<EOD
    SELECT id, nom, prenom, ordre, idEcurie
    FROM pilote
    ORDER by ordre;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesPilotes'] = $lesLignes;

$sql = <<<EOD
    SELECT id, nom 
    FROM pays;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesPays'] = $lesLignes;

// envoyer le résultat au format JSON
echo json_encode($lesDonnees);