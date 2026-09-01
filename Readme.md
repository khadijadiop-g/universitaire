## 1 Pourquoi le dossier /vendor ne doit-il pas être versionné ?
Le dossier vendor ne doiy pas etre versionner car ça alourdit inutilement le dépôt,
et ça évite les conflits sur des fichiers générés automatiquement. 

## 2 Quelle différence existe entre un commit et un tag ?
un commit trace une évolution du code (fréquent), 
un tag est une étiquette fixe pointant vers un commit 
précis pour marquer une version stable/release

## 3 Pourquoi la branche main doit-elle rester stable ?
c'est la version de référence servant de base
aux autres branches et souvent liée au déploiement/à l'évaluation — un main cassé impacte tout le monde.



