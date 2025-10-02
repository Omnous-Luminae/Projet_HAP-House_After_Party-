<?php


echo "<h1>Test CRUD Projet HAP - House After Party</h1>";

$entities = [
    'Saison',
    'TypeBien',
    'TypePtsInteret',
    'TypeEvenement',
    'Prestation',
    'Commune',
    'Biens',
    'Locataire',
    'PersonnePhysique',
    'PersonneMorale',
    'Reservation',
    'Tarif',
    'PtsInteret',
    'Dispose',
    'Compose'
];

echo "<ul>";
foreach ($entities as $entity) {
    echo "<li><a href='?entity=$entity'>$entity</a></li>";
}
echo "</ul>";

if (isset($_GET['entity'])) {
    $entity = $_GET['entity'];
    echo "<h2>CRUD pour $entity</h2>";

    // Affiche un formulaire de test générique pour chaque entité
    switch ($entity) {
        case 'Saison':
            ?>
            <form method="post" action="">
                <input type="text" name="lib_saison" placeholder="Libellé saison">
                <button type="submit" name="create">Créer</button>
            </form>
            <?php
            // Ajoute ici le code pour afficher, modifier, supprimer les saisons
            break;

        // Ajoute ici d'autres cas pour chaque entité, par exemple :
        case 'TypeBien':
            ?>
            <form method="post" action="">
                <input type="text" name="designation_type_bien" placeholder="Type de bien">
                <button type="submit" name="create">Créer</button>
            </form>
            <?php
            break;

        // ... Répète pour chaque entité ...

        default:
            echo "<p>CRUD non encore implémenté pour cette entité.</p>";
    }
}
?>