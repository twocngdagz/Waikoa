=======================
WAIKOA INSTALLATION
=======================
- make sure you have installed git bash software and composer software
http://git-scm.com/downloads
https://getcomposer.org/

- open git bash

- clone the waikoa project from git repository in this case git hub

- go to your projects folder and type git clone https://github.com/SEJohnsen/Waikoa.git

- check if under the project folder for a file named ".env", if it doesn't exist look for a file named ".env.example" and rename it to ".env", this contains your environment variables

- Feel free to modify your environment variables as needed for your own local server, as well as your production environment. However, your .env file should not be committed to your application's source control, since each developer / server using your application could require a different environment configuration. (if you cant rename it because of an OS issue not letting you have a .env extension you can email us for a copy)

- create a database named "waikoa" in your mysql database

- edit the .env file

APP_ENV=local

APP_DEBUG=true

APP_KEY= "set a random string key"
DB_HOST=localhost

DB_DATABASE=waikoa

DB_USERNAME=

DB_PASSWORD=

CACHE_DRIVER=file

SESSION_DRIVER=file

- open your terminal/command line and go to your project folder and run the command "php artisan migrate" to run the migration code and install the database on your sql server

- run  on the terminal/command line php artisan serve and get the url to test the application

- setup up virtual host 




