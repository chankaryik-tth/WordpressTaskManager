MY WP_USERNAME = DYCKY@tth0208
MY WP_PASSWORD = 8020htt@YKCYD




1)	INSTALL PLUGINS "ACF to REST API", "Advance Custom Fields PRO / normal ACF", "Custom Post Type UI", and "JWT Authentication for WP-API" INTO YOUR WOEDPRESS.


2) ADD THESE CODES INTO WORDPRESS .htaccess TO ALLOW JWT TO AUTHENTICATE

RewriteEngine on RewriteCond %{HTTP:Authorization} ^(.*) 
RewriteRule ^(.*) - [E=HTTP_AUTHORIZATION:%1] 
SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1

<!-- IF YOU ARE RUNNING APACHE, RESTART IT-->


3) LOG IN USING YOUR WORDPRESS USERNAME AND PASSWORD USING A SOFTWARE LIKE "Postman" OR THROUGH YOUR BROWSER URL USING.

http://local.taskmanager.com/wp-json/jwt-auth/v1/token?username=<username>&password=<password>


4) COPY YOUR TOKEN FROM THE RESPONSE TO BE USED AS AN AUTHENTICATION TOKEN


5) IF THERE IS NO "acf-related-custom-function.php" IN THE WORDPRESS "wp-content" FOLDER, COPY THE "acf-related-custom-function-BACKUP.php", PASTE IT IN THE WORDPRESS "wp-content" FOLDER, AND RENAME IT FROM "acf-related-custom-function-BACKUP.php" TO "acf-related-custom-function.php"


6) ADD FILE "api.php" INTO XAMPP "htdocs" FOLDER


7) RENAME ALL URL IN "api.php" THAT CONTAINS "http://local.taskmanager.com/" TO "localhost/" OR OTHERS.
