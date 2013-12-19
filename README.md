Assignment
==========

Technology used : Codeigniter MVC framework, Bootstrap, MySql, JQuery

Installation Guide : 

1. Import the database file (studinfosys.sql) into Mysql.
2. Copy project files into the www directory.
3. Go to the application/database.php and change the MySql credentials according to your configurations.
4. Update .htaccess file like following : 
    line  : RewriteRule ^(.*)$ /[PROJECT-FOLDER-NAME]/index.php?/$1 [L]
5. Open browser and navigate to the URL. e.g. http://localhost/[PROJECT-FOLDER-NAME]/controller

