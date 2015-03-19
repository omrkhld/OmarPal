# OmarPal
http://omarpal.heliohost.org/

Demonstrating PayPal Express Checkout integration - https://github.com/PayPalLabs/applications-2015

OmarPal is an online store that lists and sells items sold by me, Omar.

It makes use of PayPal's Express Checkout integration to facilitate purchases and payments.

Bootstrap theme from http://www.bootstrapzero.com/bootstrap-template/e-commerce

Free server hosting by http://www.heliohost.com/

# Original Files
1. index.php - The main page.
2. cart.php - Displays the contents of the Shopping cart to the user.
3. config.php - Establishes connection to the MySQL database.
4. head.php - The header for index and cart files. Invokes config.php.
5. foot.php - The footer for index and cart files.
6. navbar.php - Defines the style and functionality of the top navigation bar. Invoked by head.php.
7. add_to_cart.php - Allows adding of items to cart. Called by and redirects to index.php.
8. remove_from_cart.php - Allows removal of items from cart. Called by and redirects to cart.php.

# Files from PayPal
All can be found in Checkout_PHP folder.

Minor modifications were made, specifically linking to main index.php.

# Details
The website uses a MySQL database to store the items that are being sold.

It uses Sessions to ensure that all data among the webpages are consistent. This will be used for the shopping cart.

The only table in the database is "Items".

The fields of this table are:

1. id: int - The Unique and Primary key of the Items table.
2. name: varchar(60) - The name of the item.
3. img: varchar(60) - The name of the image to be used for the item in index.php.
4. short: varchar(60) - The shortened name or abbreviation of the item name.
5. price: decimal(10,2) - The price of the item, default = 0.00

This table is filled up beforehand through the phpMyAdmin interface.

"index.php" makes use of the variables:

1. $action - To denote what type action has been processed (added or exists)
2. $id - ID of item added to cart
3. $name - Name of item added to cart

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