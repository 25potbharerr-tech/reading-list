Reading List App

A simple Reading List App built using Laravel and SQLite. Users can add, view, edit and delete books and filter them based on their reading status.

Features
View all books.
Add a new book.
Edit book details.
Delete books with confirmation.
Filter books by reading status.
Form validation.
Technologies Used
PHP
Laravel
SQLite
HTML
Tailwind CSS
Installation
Clone the repository.
Install dependencies:
composer install
Create your .env file from .env.example.
Generate application key:
php artisan key:generate
Create an empty SQLite database file at database/database.sqlite if it does not exist.
Make sure .env has:
DB_CONNECTION=sqlite
Run migrations:
php artisan migrate
Start the application:
php artisan serve
AI Usage

AI tools were used for learning Laravel concepts, understanding errors and getting guidance during development. The code was tested and implemented as part of the project development process.
