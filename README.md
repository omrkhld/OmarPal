# OmarPal
http://omarpal.comli.com/
Demonstrating PayPal Express Checkout integration
https://github.com/PayPalLabs/applications-2015
OmarPal is an online store that lists and sells items sold by me, Omar.
It makes use of PayPal's Express Checkout integration to facilitate purchases and payments.

Bootstrap theme from http://www.bootstrapzero.com/bootstrap-template/e-commerce
Free server hosting by http://www.000webhost.com/

# Original Files
index.php - The main page.
cart.php - Displays the contents of the Shopping cart to the user.
config.php - Establishes connection to the MySQL database.
head.php - The header for index and cart files. Invokes config.php.
foot.php - The footer for index and cart files.
navbar.php - Defines the style and functionality of the top navigation bar. Invoked by head.php.
add_to_cart.php - Allows adding of items to cart. Called by and redirects to index.php.
remove_from_cart.php - Allows removal of items from cart. Called by and redirects to cart.php.

# Files from PayPal
All can be found in Checkout_PHP folder.
Minor modifications were made, specifically linking to main index.php.

# Details
The website uses a MySQL database to store the items that are being sold.
It uses Sessions to ensure that all data among the webpages are consistent. This will be used for the shopping cart.
The only table in the database is "Items".
The fields of this table are:
id: int - The Unique and Primary key of the Items table.
name: varchar(60) - The name of the item.
img: varchar(60) - The name of the image to be used for the item in index.php.
short: varchar(60) - The shortened name or abbreviation of the item name.
price: decimal(10,2) - The price of the item, default = 0.00
This table is filled up beforehand through 000webhost's phpMyAdmin interface.

"index.php" makes use of the variables:
$action - To denote what type action has been processed (added or exists)
$id - ID of item added to cart
$name - Name of item added to cart

When the user clicks on an "Add to cart" button, add_to_cart.php will be called, along with additional information,
which is the id and the name of the item that the user wants to add.
"add_to_cart.php" will then add the item to an array that is stored by the session, returning an "added" $action.
However, if the item already exists in the cart, then it will return an "exists" $action.
Based on what $action is returned to index.php, a notice will be shown to the user indicating a success or failure.

When the user wants to view the shopping cart, cart.php will take the array that was saved by the session and
compare it to the Items table in the database, taking from it the names and prices of items that were added by the user.
It will then display the items selected in a table, along with the individual prices and the accumulated total price.
If the user chooses to remove an item from the cart, remove_from_cart.php will be called, and a similar process
to add_to_cart.php will be executed, i.e. removing from the array stored in the session.

Upon clicking the "Check out with PayPal" button, the user will then be brought through the process of checking out his
purchase using PayPal.