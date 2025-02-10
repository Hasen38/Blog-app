# Ethio-travel 

This repository contains the source code for the Blog app website, this blog app helps users easily create, publish, and share their thoughts and stories with the world.
Built with Laravel 11,React Js,Rest Api, Laravel Sanctum.

## Features

1-user registration and login
2-posts 
2-Categories
3-comment



## Installation <a name="installation"></a>

clone the Repository

```bash
pip install myawesomeproject

2. Go to project directory

```
cd Blog-app

```

3. Install packages with composer

```
composer install

```

4. Install npm packages with 
```
npm install; npm run dev


```
5. Create your database 

6. Rename .env.example to .env Or copy it and paste at project root directory and name the file .env.You can also use this command.

```
cp .env.example ./.env

```
7. Generate app key with this command
```
php artisan key:generate

```

8. Set database connection to your database in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Ethio-Blog-app
DB_USERNAME=root
DB_PASSWORD=

```
9. Import full database sql file in the database folder, or run migrations
Use this command to run migrations

```
php artisan migrate --seed

```
10. Start the local server and browser to your app.
This command will start the development server
```
php artisan serve

```

11. Open the address in the terminal in your browser.Usually address is usually like this:
```
http://127.0.0.1:8000

```
12. Enjoy and make sure to star the repo :).Report bugs,features and also send your pull requests.

