# CodeIgniter 4 Application for Contact Management

- This is a basic CRUD (Create, Read, Update, Delete) application developed in the PHP CodeIgniter 4 framework.
- This is a simple contact management system where users can add, view, update, and delete contacts.
- There are some default groups that can be assigned to specific contacts.

## Setup

- There is a database schema with two tables: "contacts" and "groups". The "contacts" table has fields for id, name, email, phone, and group_id (foreign key referencing the "groups" table).

- Go to the root location on this application

- Find the folder: db_files

- Find the "contact_management.sql" file.

- import this in your local phpmyadmin. 

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
