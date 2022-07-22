# booking_system
 
# BikeRental

I have developed the Bike Rental project using CakePHP3.

Since a maximum of 6 hours is needed to accomplish this task, I will be looking into Symfony 5 framework later and will develop this project using Symfony 5. 
By doing this I will have a great understanding on how Symfony framework works.

Since I'm experienced in an MVC framework, I think i will find learning Symfony 5 or any other MVC framework easy. Similar to how I learned Laravel8 framework.

The project has two main views, the frontend portal that lists the available vechicles for renting and booking, and the rented vehicles that are Not available for renting.
A backend portal that allows the administator to make the CRUD for this system and manage data.

TO RUN THIS PROJECT:

1- Create a MySql Database called "bookingsystem" and import the "bookingsystem" file

The MySql Database file "bookingsystem.sql" consists of 7 tables:


Vehicles (Belongs to vehicletypes and brands tables)

Vehicletypes (Bike or Scooter)

Brands (Added some dummy brands)

Attributes (The admin can add unlimited dynamic attributes to Vehicles

Attributes_vehicles (A many to Many table)

users (contains the administrator who will be making the necessary CRUD for this booking system)

acos (Access Control Objects) Necessary in cakephp3


Each of those tables have corresponding Table and Entity files in Models folder inside 'src'

2- Download the Files and place them under (wamp/www/bookingsystem/)

3- To Access the admin portal add (/admin) and login as (superadmin/123456)

Happy to discuss the database and my code work furthor
