# language : html,css,javascript, php 
# labrary css : Bootstrap v3.3.7
# SGBD : mysql
# AWS: EC2, EFS, RDS
# Docker 

NB: docker et docker-compose doivent etre installes

1: Créer un système de fichiers Elastic File System (EFS) sur AWS


2: Creer un dossier ayant pour nom "efs" dans le meme repertoire que le dossier du projet

	-mkdir efs


3: Monter le système de fichiers Elastic File System (EFS) d'Amazon Web Services (AWS) creer precedemment sur le dossier efs 

	-sudo mount -t nfs4 -o nfsvers=4.1,rsize=1048576,wsize=1048576,hard,timeo=600,retrans=2,noresvport your addresse DNS of your efs:/ efs

	remplacer: "your addresse DNS of your efs" par l'adresse DNS du système de fichiers Elastic File System (EFS) que vous avez creer precedemment


4: Créer une instance de base de données relationnelle (RDS) sur AWS

	-moteur de base de données: mysql
	-nom de la base de donnee: mon_projet
	- nom utilisateur: root
	- mot de passe: madrida7


5: Importer la base de données du projet sur votre instance RDS 
  
	-cd projet_archives/
	
	NB: Rassure doit d'avoir installer mysql sur ton systeme avant d'executer la commande ci dessous.
	-mysql -h <endpoint RDS> -u root -p mon_projet < mon_projet.sql


6: lancer le projet

	-cd projet_archives/
	-docker-compose up --build


# Login admin
	-username: admin
	-password: admin@123

# Login user
	-username: user1
	-password: user@123


