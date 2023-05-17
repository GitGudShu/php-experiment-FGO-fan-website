# FGO Servant Website
This is a simple website for Fate/Grand Order (FGO) players to browse and learn about the different Servants in the game. The website is built with PHP and uses a MySQL database to store Servant information.

You can have a look at the website [here](https://tiweb.cgmatane.qc.ca/etudiants/2022/chut/fate/)
# Features
- Browse a list of all Servants in the game
- View detailed information about each Servant, including their name, class, appearance, and lore
- Search for specific Servants by name or class
- Add new Servants to the database via an admin panel
# Getting Started
To run the website locally, you'll need to have PHP and a MySQL server installed. You can download PHP from the official website and install a MySQL server like XAMPP.

Once you have the necessary software installed, you can clone this repository and set up the database by importing the included SQL file:

```bash
git clone https://github.com/your-username/fgo-servant-website.git
cd fgo-servant-website
mysql -u username -p database_name < database.sql
```

You'll also need to configure the database connection in config.php:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'database_name');
define('DB_USER', 'username');
define('DB_PASSWORD', 'password');
```

# Notes

This FGO Servant Website was a project that I pursued as a study exercise in web development when I was in Canada. Through this project, I gained hands-on experience with PHP and MySQL. I also learned about best practices for database design, query optimization, and web security. Overall, this project allowed me to practice my programming skills in a practical setting and gave me a taste of what it's like to develop a web application from scratch. I'm proud of what I accomplished and look forward to applying what I learned in future projects.
