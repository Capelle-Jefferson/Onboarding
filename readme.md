## Capelle Jefferson

un nouveau controlleur � �t� cr��: ContactApiController, 

Pour g�n�rer la base de donn�es, utiliser les commandes suivantes:	
$ php bin\console make:migration
$ php bin\console doctrine:migrations:migrate

Une fixture de DepartmentCompany a �t� cr��e, utiliser la commande suivante:
$ php bin\console doctrine:fixtures:load

Utiliser la commande suivante pour d�marrer le serveur:
$ php bin\console server:run


#GET
- R�cup�rer tous les d�partements:
/departements

- R�cup�rer un d�partement en fonction de son id
/departement/{id}

- r�cup�rer un contact en fonction de son id
/contact/{id}


#POST
- enregistrer un contact et envoyer le mail via 
/newContact

par exemple, nous avons le d�partement suivant:
{
	"id": 0,
	"name": "direction",
	"mail": "direction_exercice@gmail.com"
}

l'envoi de ces ressources, via l'url '/newContact', en post seront enregistr�es dans la base de donn�es, 
puis le mail sera envoy� au d�partement.
{
	
	"name": "Capelle",
	
	"firstName": "Jefferson"
	"mailContact": "jefferson.capelle@sfr.fr",
	
	"message": "Ceci est un message",
	
	"departmentCompany": 0
}

Si l'id du d�partement n'est pas existant, le status 404 Not Found apparait.


Je vous remercie.
Bien cordialement.