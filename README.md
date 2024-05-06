This project is a simple web application built using Laravel, a PHP framework, for managing production orders and schedules.

Setup:

To set up the project, follow these steps:

1. Run migrations to create the necessary database tables:
php artisan migrate
2. Seed the database with initial data, including product types and other essential information:
php artisan db:seed --class=ProductSeeder

Accessing Features:

Once the project is set up, you can access the following features:

Production Schedule: Navigate to /orders to view the production schedule. This page displays a list of orders along with their calculated Approximate production times.
Create Order: To create a new order, go to /orders/create. This page allows users to submit orders.

![image](https://github.com/qaserge/laravel-production-schedule/assets/45569665/05d7d18c-4b73-4ecf-8f1f-eba1d506749d)

![image](https://github.com/qaserge/laravel-production-schedule/assets/45569665/152366fe-e611-4a2b-80b4-194e48e199a3)
