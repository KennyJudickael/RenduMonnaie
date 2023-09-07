<!DOCTYPE html>
<html>
<head>
    <title>Rendu de Monnaie</title>
</head>
<body>

<?php
function decompositions_entier_système($n, $système) {
    $table = array_fill(0, $n + 1, null);
    $table[0] = array();

    for ($montant = 1; $montant <= $n; $montant++) {
        foreach ($système as $valeur) {
            if ($montant >= $valeur && $table[$montant - $valeur] !== null) {
                $nouvelle_décomposition = array_merge($table[$montant - $valeur], array($valeur));
                if ($table[$montant] === null || count($nouvelle_décomposition) < count($table[$montant])) {
                    $table[$montant] = $nouvelle_décomposition;
                }
            }
        }
    }

    return $table[$n];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $montant = isset($_POST["montant"]) ? intval($_POST["montant"]) : 0;
    $système = isset($_POST["système"]) ? json_decode($_POST["système"]) : array();

    $resultat = decompositions_entier_système($montant, $système);

    if ($resultat !== null) {
        $pièces_quantité = array_count_values($resultat);
        echo "Système de rendu de monnaie adéquat : " . json_encode($pièces_quantité) . "<br>";
    } else {
        echo "Impossible de rendre $montant avec le système " . json_encode($système) . " pour un rendu de monnaie adéquat.<br>";
    }
}
?>

<form method="post">
    Montant à rendre : <input type="number" name="montant" required><br>
    Système de pièces de monnaie (au format JSON) : <input type="text" name="système" required><br>
    Exemple : [100, 200, 500, 1000]<br>
    <input type="submit" value="Calculer">
</form>

</body>
</html>
