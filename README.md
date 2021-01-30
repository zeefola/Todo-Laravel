## How to setup in local development 
1. Run composer install (in the terminal) in the extracted project folder to install all required dependencies.
2. Create a database in phpmyadmin and edit the .env file ( DB_DATABASE=createdDataBaseName
     DB_USERNAME=yourDbUsername
     DB_PASSWORD=yourDbPassword (if there's any).
3. Run php artisan migrate in the terminal to migrate the tables.
4. Run php artisan serve to bring up the development server, view the app at localhost:8000
(or whichever port is shown in your terminal)
