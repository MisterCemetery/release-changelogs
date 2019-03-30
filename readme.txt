Release Changelogs

How to initiate the project

1/	The app is using database and connections. So after checking out the project from repo,
	you will have to change some properties in the "env" file in the root of the 
	project. These will be the DB-connection/name/user/password. I was using MySql so 
	for anything else you have to add it yourself.
	
2/	You will have to initiate the DB server so that section 3/ would work.

3/	After setting the props of the DB connection, you have to open a new console(cmd) and 
	navigate to the root of the project and type "php artisan migrate" to migrate the DB table 
	that is used by the application. After this type "php artisan make:model ReleaseChangelog" to create
	model of the DB table "release_changelogs"

4/	Final step is to type "php artisan serve" to initialize localhost. You should be able to see a "welcome" page
	with a link to navigate to the changelogs page on which you can manipulate with the basic 4 CRUD actions.

5/	Everything else should be self explanatory.