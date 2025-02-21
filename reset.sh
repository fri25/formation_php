#!/bin/bash

# Vérifie que le script est bien exécuté dans un répertoire valide
echo "Recherche des dossiers .git à supprimer..."

# Parcours tous les dossiers du répertoire courant
for dir in */ ; do
    if [ -d "$dir/.git" ]; then
        echo "Suppression de $dir/.git..."
        rm -rf "$dir/.git"
        echo "✅ .git supprimé dans $dir"
    else
        echo "ℹ️ Aucun .git trouvé dans $dir"
    fi
done

echo "🎉 Suppression terminée !"