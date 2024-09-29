# EIS-PILOT


# Deploying Instruction

- Domain ()
- PHP (version 8.2 or higher)
- database (php artisan migrate)



This guide provides step-by-step instructions for installing the PHP application. Please follow the instructions below to get started.

## Authors

- [@faisalahmed99240]

## Prerequisites

Before proceeding with the installation, make sure you have the following software installed on your system:

- PHP (version 8.2 or higher)
- MySql (version 8.0 or higher)
- Composer

## Installation Steps

1. Clone the repository:

   ```shell
   git clone <repository_url>
   ```
2. Change to the organogram-builder-dpg directory:

   ```shell
   cd url-shortener
   ```
3. Create a copy of the .env.example file and name it .env:

   ```shell
   cp .env.example .env
   ```
   
4. Edit the ```.env``` file and set the database credentials:

   ```shell
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=url-shortener
    DB_USERNAME=root
    DB_PASSWORD=
   ```
   
5. Install the required dependencies using Composer:

   ```shell
   composer install
   ```
6. Run the following command in the terminal:

   ```shell
   php artisan key:generate
   ```

7. Commnad this line for database

    ```shell
    php artisan migrate
    ```

9. Commnad this line for link with storage

    ```shell
    php artisan storage:link
    ```
9. run the project

    ```shell
    php artisan serve
    ```

## Thank You



