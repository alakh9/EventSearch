# EventSearch

Event-Search
Description: This web app lets users create their own profile. Then they can search up events based on their city of interest and which ever event they like can be saved to a personal save events page where they can keep track of future events.
1.	http://localhost/Eventful/index.html 
-	this is the entry file to run the project, user can choose to log in or register.
-	Test the login form with right username and wrong username.
-	If a wrong username is entered then it goes to the register page.
-	Saves the new username and takes them to the login page. 
2.	Once user is logged in:
-	The username will be displayed on the top right corner
-	Ajax is catching the default events on the screen. User can save any event you like. 
-	User can search any city for upcoming events  through ajax and jquery. Every event that shows will have a save functionality with it. On click of save an alert comes on the screen to notify the user that the event has been saved. 
3.	Data-tables show the events:
-	Can search any of the events for a specific character in the name or date.
-	Provides the pageination.
-	It is also giving the flexibility to set the page limits on the top right. 
-	For the data-table Meanjs and Bootstrapjs was used.
4.	There is also a saved event page where user can manage the events they have saved and delete them as well as keep track of them.  

User Authentication: 
-	First Name 
-	Last Name 
-	Username 
-	Password
API: 
-	Ticket-Master API was used to pull the events based on the users city interests.
DataBase:
-	 MySQL was used to create 2 tables. 
-	One for registration.
-	Second for the events that the user decides to save.
Technologies Used:
-	MySQL 
-	PHP 
-	Laravel 
-	Bootstrap 
-	CRUD
-	Ajax
-	jQuery
-	Json
-	JavaScript
-	CSS
-	HTML5



