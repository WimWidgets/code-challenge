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
### Import
Run the data import with the following command:
```
php bin/console challenge:data-import {file}
```
