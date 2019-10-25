## Capelle Jefferson

La page contact a �t� cr��e les champs: name, first name, mail, message vous serons demand�s
mais vous devez �galement s�lectionner un d�partement de l'entreprise du destinataire du mail.

Chaque envoi sera enregistr� dans la base de donn�es.

Deux tables y sont pr�sentes :
	- DepartmentCompany : id, name, mail
	- Contact : id, name, first_name, mail_contact, message, departement_company_id

Pour g�n�rer la base de donn�es, utiliser les commandes suivantes:	
$ php bin\console make:migration
$ php bin/console doctrine:migrations:migrate

Une fixture de DepartmentCompany a �t� cr��e, utiliser la commande suivante:
$ php bin\console doctrine:fixtures:load

Utiliser la commande suivante pour d�marrer le serveur:
$ php bin\console  server:run

Vous pouvez maintenant acc�der au site avec ce lien:
http://127.0.0.1:8000


L'envoi de mail est fonctionnel, toutefois j'ai d�sactiv� cet envoi, pour le r�activer il suffit, 
dans le fichier .env, de modifier la constante MAILER_URL.


Je vous remercie.
Bien cordialement.