# Laravel_Leave-Request
 This Laravel application allows users to submit, track, and manage their leave requests.


## Requirements
- PHP 8.x or higher
- Composer
- Node.js (for frontend development)
- MySQL or other database management systems

  Installation Steps

1. Clone the Repository
Clone the repository to your local machine

2. Install Dependencies
Navigate to the project folder and install the required PHP and Node dependencies in Terminal
Install PHP dependencies:
cd /path/to/your/project
composer install

Install frontend dependencies:
npm install

3. Set Up Your .env File
Copy the .env.example file to .env

Generate the application key:
php artisan key:generate

4. Configure Database
In the .env file, configure the database settings according to your local environment.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

5. Run Migrations
Run the database migrations to set up your tables:
php artisan migrate

6. Run the Application
Once everything is set up, start the Laravel development server:
npm run dev
php artisan serve

7. Add Admin
as of now there no option to register Admin to add Admin change the role in Database from "user" to "admin" in role column

Troubleshooting
If you encounter any issues during installation, make sure you have all the required PHP extensions installed.

For issues with the database, verify your .env settings and ensure MySQL is running locally.
