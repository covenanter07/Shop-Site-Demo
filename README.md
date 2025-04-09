# Getting Started with E-Commerce Website

![Demo](https://github.com/covenanter07/Shop-Site-Demo/blob/main/assets/images/slider2.jpg)

## E-Commerce Website Overview
The E-Commerce Website is a PHP-based web application with MySQL as the database, built using the XAMPP stack. It offers a complete shopping experience with features for customers and administrators. The project includes frontend functionality for customers and a secure admin backend for managing categories, products, and orders.

## Features
- **Shopping Cart**: Add, update and remove products from the cart.
- **Checkout** : Supports secure online payments via PayPal API (including credit card payment options) and cash payment options.
- **Order History** : View past orders and track statuses.

## Admin Features
- **Category Management** : Add, edit, or delete product and categories.
- **Product Management** : Manage products with images and detailed descriptions.
- **Order Managemnt** : Update order statuses and view order details.

## Prerequisites

* PHP: Version 7.4 or later
* Apache: Version 2.4 or later
* MySQL: Version 5.7 or later
* Composer: Version 2.x or later
* PayPal Developer Account: Required for API integration

## Installation

1. Clone the repository:
   `git clone https://github.com/covenanter07/Shop-Site-Demo `

2. Install dependencies:
   `composer install`

3. Configure the .env file:
   Create a `.env` file in the root directory and add the following:

   DB_HOST=localhost
   
   DB_USERNAME=username
   
   DB_PASSWORD=yourpassword
   
   DB_DATABASE=dbname
   
   PAYPAL_CLIENT_ID=your_client_id

4. Set up the database:
   Start XAMPP and enable MySQL.
   Import the db.sql file into phpMyAdmin: Create a new database.


5. Run the application:
   Start Apache in XAMPP.
   Access the site to Index Page.

## Deployment
This project is deployed using Zeabur. You can access the Deployed version at:

https://shop-site-demo.zeabur.app/

## Project Structure

|-- /admin                                                   # Admin backend files                                                                                     
|-- /assets                                                  # Frontend assets  
|     |-- /css                   
|     |-- /images                
|     |-- /js                   
|-- /config                    
|      |-- db.php                 
|-- /functions                 
|-- /includes                  
|-- /middleware                 
|-- /uploads                    
|--.gitignore                    
|--authencticate.php              
|--cart.php                                                  # Shopping cart page  
|--category.php                                              # Product categories  
|--checkout.php                                              # Checkout logic with PayPal integration  
|--composer.json                    
|--composer.lock                   
|--db.sql                        
|--index.php                                                 # Homepage  
|--login.php                      
|--logout.php                     
|--my-orders.php                                             # order history  
|--product-view.php                                          # Product details  
|--products.php                                              # Products page  
|--register.php                   
|--view-order.php                                            # order view  

## Features

* Frontend: Built with HTML, CSS, and Javascript.
* Backend: PHP
* Database: MySQL stores all data, including users, categories, products, orders, order_items and carts.
* Payment: PayPay API for secure transactions (supports credit cards).
* Admin Management: Role-based access to secure backend features.

## Dependencies

* PHP Packages (via Composer):
