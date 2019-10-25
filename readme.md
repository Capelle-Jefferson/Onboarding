## Capelle Jefferson

La page contact a été créée les champs: name, first name, mail, message vous serons demandés
mais vous devez également sélectionner un département de l'entreprise du destinataire du mail.

Chaque envoi sera enregistré dans la base de données.

Deux tables y sont présentes :
	- DepartmentCompany : id, name, mail
	- Contact : id, name, first_name, mail_contact, message, departement_company_id

Pour générer la base de données, utiliser les commandes suivantes:	
$ php bin\console make:migration
$ php bin/console doctrine:migrations:migrate

Une fixture de DepartmentCompany a été créée, utiliser la commande suivante:
$ php bin\console doctrine:fixtures:load

Utiliser la commande suivante pour démarrer le serveur:
$ php bin\console  server:run

Vous pouvez maintenant accéder au site avec ce lien:
http://127.0.0.1:8000


L'envoi de mail est fonctionnel, toutefois j'ai désactivé cet envoi, pour le réactiver il suffit, 
dans le fichier .env, de modifier la constante MAILER_URL.


Je vous remercie.
Bien cordialement.