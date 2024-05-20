# PHP test

## Installation

### Database Setup
  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database

### Application Setup
  - Download and install [composer](https://getcomposer.org/)
  - Run `composer install`
  - Run `composer dump-autoload`
  - Rename "example.env" file to ".env"
  - Set necessary data to .env file
  - you can test the demo script in your shell: "php index.php"

## Improvements:
 - Set credentials using .env
 - Incorporate autoloading
 - Use namespacing
 - Move the main function from "index.php" to "app.php"
 - Change static functions to non-static
 - Initialize commonly used functions in the constructor
 - Declare the table names "news" and "comment" as a static property instead of having multiple instances of the table name
 - Rename folder "class" to "classes"