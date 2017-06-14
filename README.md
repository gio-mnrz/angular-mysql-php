# angularjs-mysql-php
Angular example with Angular 1.6.x, Angular-UI-Bootstrap-Bower; Font-Awesome; connecting to a MySql database through PHP.

# What is &#60;Todo List&#47;&#62;?
A maintenance of a list of goals with descriptions. Functionallity: Add, Delete, Edit, List All. An a web application based on Angular with MySql and PHP and the front based on Angular-Ui-Bootstrap-Bower and Font-Awesome's icons.

# &#60;Todo List&#47;&#62; in Details
Part of the angular concepts worked here: angular-ui-bootstrap-bower ( alerts and modals ), controllers, components, data binding ( isolated scope, root scope, scope ), dependency injection, directives, expressions, forms validation, interpolation, modules, ngRoute, services and templates.

# Requirements
1. MySql and PHP:

	1.1. WAMP or
	1.2. LAMP or
	1.3. XAMP

*Just one of these above is required*

2. Dependencies:

	1.1. Angular 1.6.x
	1.2. Angular-Animate
	1.3. Angular-Ui-Bootstrap-Bower
	1.4. Angular-Route
	1.5. Bootstrap *CSS Only*
	1.6. Bower
	1.7. Font-Awesome
	1.8. NodeJS

# Installation
1. For MySql and PHP install:

	1.1. LAMP (Linux, Apache, MySql and PHP) OR
	1.2. WAMP (Windows, Apache, MySql and PHP) OR
	1.3. XAMP

2. If WAMP was chosen:

	2.1. Start the service
	2.2. Change ports if required *Skype app also runs on port:80 and that can generate a conflict*
	2.3. Copy example files to "C://wamp/www" folder. The others work similar

3. For dependencies, open the system console (cmd) then go to the example folder located in "C://wamp/www/angular-mysql-php" and type:
	
	3.1. npm install

4. On the web browser, locate your phpmyadmin page [ localhost:8080/phpmyadmin ] and import the database:

	4.1. Create a database with the name: "db-todo-list"
	4.2. Click on "db-todo-list"
	4.3. Click on "Import" menu option
	4.4. Select the file: "db-todo-list.sql" in the "app" folder of the example
	4.5. Click on "Go" button
	
5. Run the application: [ http://localhost:9980/angular-mysql-php/app/ ] *Port can diferent*

6. Example ready for testing purposes.