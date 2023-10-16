# INITIALISATION taper dans le terminal

gtit clone https://github.com/Ballesteros-Romain/g-parrot.git
aller dans le dossier : cd g-parrot
lancer la commande pour installer les dépendances: composer install

# CONFIGURATION

cree un fichier a la racine du projet avec la commande : touch '.env.local'

# CONNEXION A LA BDD

Ouvrir se ficher dans votre editeur de code et copier la ligne suivante en remplacant id et mdp: DATABASE_URL="mysql://id:mdp@127.0.0.1:8889/g-parrot?serverVersion=8.0.32&charset=utf8mb4" par votre root vers votre BDD et votre mot de passe.

pour creer les tables de la base de données taper dans le terminal : php bin/console doctrine:migrations:migrate

# LANCER LE SERVEUR

pour lancer le serveur taper dans le terminal : php bin/console server:run

# PREREQUIS

Un serveur Web (Apache, Nginx, etc.)
PHP 8.0 ou supérieur
MySQL 8.0 ou supérieur
