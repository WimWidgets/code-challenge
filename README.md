# Code Challenge
### Installation
#### Vendor packages
```
composer install
```
#### Database
Update the settings in your `.env` file.
```
DATABASE_URL=mysql://{user}:{pass}@{host}:{port}/{name}
```
Create your database and all the tables.
```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
### Server
The default server address is `localhost:8000`. Append `{host}:{port}` to change this to your taste.
<br><br>
Run the built-in server with:
```
php bin/console server:start [{host}:{port}]
```
or:
```
php bin/console server:run [{host}:{port}]
```
### Import
Run the data import with the following command:
```
php bin/console challenge:data-import {file}
```
