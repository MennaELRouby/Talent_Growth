<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Talent_Growth Web Application

# Thanks for checking out the Talent Growth Blog, the user / author has a dashboard

to add posts, edit, delete and show the their own blog posts, or delete the data , show all blog posts in the table, can attached their own comments to blog posts, update or delete their own comments.

# customers

on the other side, the web app has [Home, Listing, Info for each post,] pages, and users can [Comments, Register to the blog, login after sending verified email and activate their acount].

# Acknowledgements

-   [Talent Growth Repo](https://github.com/MennaELRouby/Talent_Growth.git)

-   [Talent Growth README](https://github.com/MennaELRouby/Talent_Growth/blob/main/README.md)

**Use this workspace to list resources you find helpful and would like to give credit to. I've included the following**

## Requirements workspace

-   Git bash
-   visual studio code - XAMPP control panel Apache HTTP Server - Composer php dependency manager
-   OpenSSL PHP
-   Laravel breeze

---

# Roadmap

# Install Project

## Clone repo in Visual Studio code

    $gh repo clone MennaELRouby/Talent_Growth
    cd xampp/htdocs/

## install project dependencies

### Composer

     composer install

### install npm

    npm install
    npm run dev

## Create environment config file

    cp .env .example .env

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

## Set Environment Variables

### Path :

    - Git\cmd
    - xampp\php
    - ComposeSetup\bin
    - mysql\bin

### Create environment config file

    - cp .env .example .env
    - vim .env

### Edit Configuration in .env:

    - mail smtp:
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=587
    MAIL_USERNAME=84afc2122d0c86
    MAIL_PASSWORD=b2ff23c87f3213
    MAIL_ENCRYPTION=STARTTLS
    MAIL_FROM_ADDRESS="roubymenna@gmail.com"
    MAIL_FROM_NAME="${APP_NAME}"

    - Database Configuration
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=Talent_Growth
    DB_USERNAME=root
    DB_PASSWORD=

    - Vite
    VITE_APP_NAME="${APP_NAME}"
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

## Configure Authentication

    - composer require laravel/ui
    - $php artisan ui bootstrap --auth

---

# Migrate

## AppServiceProvider

**Make sure to comment on the following function before running the migrations**

    //public function boot(): void{}

## Run db migration

    - $php artisan migrate

---

# Mail:

    - mailtrap.io

---

# Run the Development server through XAMPP-Control

    	- http://localhost/Talent_Growth/public/		        # access Talent Growth blog

# or artisan serve

        php artisan serve
            -http://127.0.0.1:8000                            #access Talent Growth  web app

---

# Code overview

## Development main folders

    -CRUD Controllers
    	- app\Http\Controllers\PostController            # contains Posts Blog (show, Add, Update, Delete)
        - app\Http\Controllers\Auth			            # contains Comment controllers (Add , Update, Delete)
    	- app\Http\Controllers\Auth			            # contains Authentications controllers
    	 - database\migrations			                # contains all the database schema migrations
    	 - app\Models\				                    # contains all the Eloquent models
                - Comment
                - Post
                - User
    	 - app\Mail\contactMail.php			            # contains Envelope & email template
    - Routes: routes\web.php
    	- Show All Routes
    		- $php artisan route:list

## Environment variables

    - `.env` - Environment variables can be set in this file

## Parameters

    - user_id: in posts table:
        User is associated  with their own posts , can control thier own posts (update - show - Delete).

                    | column     | Type  | Description                       |
        			| :--------- | :-----| :-------------------------------- |
        			| `user_id`  | bigint| **Required**,  **foreign key**.

    -email_verified_at: in user tabel:
        User Can only login if user recieved email and activate their account at timestamp

                    | column               | Type     | Description                       |
        			| :------------------- | :--------| :-------------------------------- |
        			| `email_verified_at`  | timestamp| **Defulat is null until the user verify their account**. If user verified their accounts the value changed to the specific verified time.

## **_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

# DataBase overview

## Tables names

    (cars, categories, comments, messages, testimonials, users)

## DB Design:

    - Eloquent ORM through
            Database/Eloquent/Models
    - check db config:
            config/database.php

    - DB Relationship
        	- users - posts one to many

        		users table
        			| column     | Type     | Description                       |
        			| :-------- | :------- | :-------------------------------- |
        			| `id`      | interger| **Required**. Id Autoincrement
        		posts table
        			| column    | Type     | Description                       |
        			| :-------- | :------- | :-------------------------------- |
        			| `user_id`  | integer | **Required**. foreign key

        	- posts - comments one to many

        		posts table
        			| column    | Type     | Description                       |
        			| :--------| :------- | :-------------------------------- |
        			| `id`     | interger | **Required**. Id Autoincrement
        		comments table
        			| column     | Type     | Description                       |
        			| :--------- | :------- | :-------------------------------- |
        			| `post_id`   | integer  | **Required**. foreign key

            - users - comments one to many

        		users table
        			| column    | Type     | Description                       |
        			| :--------| :------- | :-------------------------------- |
        			| `id`     | interger | **Required**. Id Autoincrement
        		comments table
        			| column     | Type     | Description                       |
        			| :--------- | :------- | :-------------------------------- |
        			| `user_id`   | integer  | **Required**. foreign key

---

# Route List

## [CMD] php artisan route:list --json

---

# Contact

# Menna Elrouby

-   E-Mail: roubymenna@gmail.com

-   [LinkedIn](https://www.linkedin.com/in/menna-rouby)
-   [Github](https://github.com/MennaELRouby)
