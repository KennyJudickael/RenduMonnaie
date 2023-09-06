def decompositions_entier_système(n, système):
    # Créer une table pour stocker les décompositions possibles jusqu'à un montant donné
    table = [None] * (n + 1)
    table[0] = []

    for montant in range(1, n + 1):
        for valeur in système:
            if montant >= valeur and table[montant - valeur] is not None:
                nouvelle_décomposition = table[montant - valeur] + [valeur]
                if table[montant] is None or len(nouvelle_décomposition) < len(
                    table[montant]
                ):
                    table[montant] = nouvelle_décomposition

    return table[n]


# Exemple avec n = 5300 et système [100, 200, 500, 1000]
n = 5800
système = [100, 200, 500, 1000, 2000]
resultat = decompositions_entier_système(n, système)

if resultat is not None:
    # Compter la quantité de chaque pièce de monnaie dans le résultat
    pièces_quantité = {}
    for valeur in système:
        pièces_quantité[valeur] = resultat.count(valeur)

    print("Système de rendu de monnaie adéquat :", pièces_quantité)
else:
    print(
        "Impossible de rendre",
        n,
        "avec le système",
        système,
        "pour un rendu de monnaie adéquat.",
    )
