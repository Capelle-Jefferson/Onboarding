## Capelle Jefferson

un nouveau controlleur à été créé: ContactApiController, 

Pour générer la base de données, utiliser les commandes suivantes:	
$ php bin\console make:migration
$ php bin\console doctrine:migrations:migrate

Une fixture de DepartmentCompany a été créée, utiliser la commande suivante:
$ php bin\console doctrine:fixtures:load

Utiliser la commande suivante pour démarrer le serveur:
$ php bin\console server:run


#GET
- Récupérer tous les départements:
/departements

#POST
- enregistrer un contact et envoyer le mail via 
/newContact

par exemple, nous avons le département suivant:
{
	"id": 0,
	"name": "direction",
	"mail": "direction_exercice@gmail.com"
}

l'envoi de ces ressources, via l'url '/newContact', en post seront enregistrées dans la base de données, 
puis le mail sera envoyé au département.
{
	
	"name": "Capelle",
	
	"firstName": "Jefferson",
	"mailContact": "jefferson.capelle@sfr.fr",
	
	"message": "Ceci est un message",
	
	"departmentCompany": 0
}

Si l'id du département n'est pas existant, le status 404 Not Found apparait.


Je vous remercie.
Bien cordialement.