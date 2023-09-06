function decomposerEntier($n) {
    // Créer un tableau associatif pour stocker les décompositions
    $decomposition = array();

    // Décomposer n
    while ($n > 0) {
        // Trouver la plus grande puissance de 10 qui est inférieure ou égale à n
        $puissanceDe10 = 1;
        while ($puissanceDe10 * 10 <= $n) {
            $puissanceDe10 *= 10;
        }

        // Calculer le chiffre le plus significatif
        $chiffre = (int)($n / $puissanceDe10);

        // Mettre à jour la décomposition
        $decomposition[$puissanceDe10] = $chiffre;

        // Mettre à jour le montant restant
        $n -= $chiffre * $puissanceDe10;
    }

    return $decomposition;
}

// Exemple avec n = 12345
$n = 12345;
$resultat = decomposerEntier($n);
echo "Décomposition de $n : ";
print_r($resultat)