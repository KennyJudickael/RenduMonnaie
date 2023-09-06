def decompositions_entier(n, max_val=None):
    if max_val is None:
        max_val = n
    if n == 0:
        return [[]]
    if n < 0 or max_val == 0:
        return []

    decompositions = []
    for i in range(1, min(max_val, n) + 1):
        sub_decompositions = decompositions_entier(n - i, i)
        for sub_decomposition in sub_decompositions:
            decompositions.append([i] + sub_decomposition)

    return decompositions


# Exemple avec n = 6
n = 6
resultats = decompositions_entier(n)
for resultat in resultats:
    print(f"{n} :", "+".join(map(str, resultat)))
