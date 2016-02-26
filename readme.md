# _Hair Salon_

#### _This is a tracker of stylists working at the salon and the customers who see each stylist, 2-26-16_

#### By _**Matt Knutson**_

## Description

_The Assignment:

Create an app for a hair salon. The owner should be able to add a list of their stylists, and for each stylist, add clients who see that stylist. The stylists work independently, so each client only belongs to a single stylist.


## Setup/Installation Requirements

* _Clone the repository from github_
* _Import the database to phpMyAdmin_
* _In terminal, run "composer install" to get silex and twig engaged_
* _Enter localhost:8000 into your browser to see the application_

## Mysql commands Used

_CREATE DATABASE hair_salon;_
_USE hair_salon;_
_CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255));_
_CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), phone VARCHAR (255), email VARCHAR (255) stylist_id int);_
_CREATE DATABASE hair_salon_

## Known Bugs

_None_

## Support and contact details

_You can contact me via github with any questions_

## Technologies Used

_HTML, CSS, Bootstrap, phpunit, silex, twig, composer, mysql_

### License

*MIT*

Copyright (c) 2016 **_Matt Knutson_**
