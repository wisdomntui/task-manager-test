Task Management Application
===================================

This is a simple task management application built with Laravel 11, using jQuery and Bootstrap for the frontend. It allows users to manage tasks, filter them by projects, and reorder tasks via drag-and-drop functionality.

Features
--------

*   Add, edit, and delete tasks.
    
*   Reorder tasks with drag-and-drop functionality.
    
*   Filter tasks by project.
    
*   Assign tasks to specific projects.
    
*   Prioritize tasks automatically during reordering.
    

Prerequisites
-------------

Ensure you have the following installed on your local machine:

1.  **PHP >= 8.1**
    
2.  **Composer**
    
3.  **Node.js and npm**
    
4.  **MySQL**
    
5.  **Git**
 
    

Installation Instructions
-------------------------

1.  git clone [https://github.com/your-repo/task-manager.gitcd task-manager](https://github.com/wisdomntui/task-manager-test.git)
    
2.  run **composer install** to install the required PHP dependencies.

3. run **npm install** to install the JavaScript dependencies.
    
3.  run **cp .env.example .env** to create a new .env file. Update the .env file with your database credentials and application settings.
    
4.  run **php artisan key:generate** to generate an application key
    
5.  run **php artisan migrate --seed** to populate the tables
    
6.  run **php artisan serve** to run the application which will be available at http://127.0.0.1:8000.
    

Deployment Instructions
-----------------------

1.  Ensure you have the following tools installed on your production server:
    
    *   PHP
        
    *   Composer
        
    *   MySQL
        
    *   Nginx or Apache
        
    *   Node.js and npm
        
2.  run **git clone [https://github.com/your-repo/task-manager.gitcd task-manager](https://github.com/wisdomntui/task-manager-test.git)**
    
3.  run **composer install --no-dev --optimize-autoloader** &&
**npm install** && **npm run build**
    
4.  Copy the .env file to the server and configure it with the production environment settings.
    
5.  run **php artisan migrate --force** to run all migrations.
    
6.  run **chmod -R 775 storage bootstrap/cachechown -R www-data:www-data storage bootstrap/cache**
    
