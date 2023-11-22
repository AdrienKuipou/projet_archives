# Language : html,css,javascript, php 
# Css library : Bootstrap v3.3.7
# Database : mysql
# AWS: EC2, EFS, RDS
# Docker 
	
	
Note: Docker and Docker Compose must be installed.

1: Create an Elastic File System (EFS) on AWS.


2: Create a folder named "efs" in the same directory as the project folder.

	-mkdir efs
	
	
3: Mount the previously created Amazon Web Services (AWS) Elastic File System (EFS) on the "efs" folder.

	-sudo mount -t nfs4 -o nfsvers=4.1,rsize=1048576,wsize=1048576,hard,timeo=600,retrans=2,noresvport your EFS DNS address:/ efs
	-Replace "your EFS DNS address" with the DNS address of the Elastic File System (EFS) you previously created.


4: Create a Relational Database Service (RDS) instance on AWS.

	-Database engine: MySQL
	-Database name: mon_projet
	-Username: root
	-Password: madrida7
	
	
5: Import the project's database to your RDS instance.

	-cd project_archives/
	
	Note: Make sure you have installed MySQL on your system before executing the following command:
	-mysql -h <RDS endpoint> -u root -p mon_projet < mon_projet.sql


6: Launch the project.

	-cd project_archives/
	-docker-compose up --build
	
	
#Admin login

	-Username: admin
	-Password: admin@123
	
#User login

	-Username: user1
	-Password: user@123


