
# Digital Study Resources Store


## Project Overview
This project is a basic PHP web application where users can browse digital study resources, add them to a cart, and place an order. The main goal of the project was to practice working with PHP, MySQL, and organizing a project using an MVC-style structure.


## What the App Does
- Displays digital study resources from a database  
- Allows users to add items to a cart  
- Lets users update or remove items from the cart  
- Saves order information when a user checks out  
- Shows an order confirmation page  
- Displays past orders  

## Project Structure

config/ database connection
includes/ header and footer files
public/ main pages (catalog, cart, checkout, etc.)
assets/ CSS and static files
models/ database-related logic
controllers/ application logic

## Technologies Used
- PHP  
- MySQL  
- HTML and CSS  
- phpMyAdmin  
- XAMPP (for local testing)

## Development Process
I started by setting up the database and creating the main pages. After that, I added cart functionality using sessions and connected the pages to the database. Later in the project, I refactored the code into an MVC-style structure. This caused several issues at first, especially with file paths and database logic, which required debugging.

## Testing
The application was tested locally on my computer using localhost. I tested browsing products, adding items to the cart, placing orders, viewing the confirmation page, and checking the Past Orders page. I also tested the application after restructuring the files to make sure everything still worked.

## What I Learned
- How to work with PHP and MySQL together  
- How sessions work for cart functionality  
- How MVC structure helps organize code  
- How refactoring can break existing code  
- How to debug file path and database issues  

## Notes
This project is designed to run locally using XAMPP. The database must be set up before running the application.


