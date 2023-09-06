def decompositions_entier_système(n, max_val=None):
    if max_val is None:
        max_val = n
    if n == 0:
        return [[]]
    if n < 0 or max_val == 0:
        return []

    decompositions = []
    for i in range(1, min(max_val, n) + 1):
        sub_decompositions = decompositions_entier_système(n - i, i)
        for sub_decomposition in sub_decompositions:
            decomposition = [i] + sub_decomposition
            # Vérification pour filtrer les décompositions
            if all(x in [1, 4, 5] for x in decomposition):
                decompositions.append(decomposition)

    return decompositions


# Exemple avec n = 6 et s = [1, 4, 5]
n = 6
s = [1, 4, 5]
resultats = decompositions_entier_système(n)
for resultat in resultats:
    print(f"{n} :", "+".join(map(str, resultat)))
