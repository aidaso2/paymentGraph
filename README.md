# PaymentGraph

Task to create a payment graph

## Installing
- go to project directory and run ```composer install```
- set up ```.env``` file for database connection
- migrate database: ```php bin/Console doctrine:database:create```
- migrate tables: ```php bin/Console doctrine:migrations:migrate```
- insert data directly into database table ```payment_graph```:
- ```INSERT INTO payment_graph (payment_date, credit_part, interest) VALUES('2022-05-20', 10, 3.76);```
- ```INSERT INTO payment_graph (payment_date, credit_part, interest) VALUES('2022-06-20', 10, 3.76);```
- ```INSERT INTO payment_graph (payment_date, credit_part, interest) VALUES('2022-07-20', 10, 3.76);```

## Starting project
- run php server: ```php -S localhost:3000 -t public```
- open page in web browser: ```localhost:3000```
- add payments

## Changing css
- run ```yarn install```
- run ```yarn encore dev --watch```