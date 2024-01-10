## Employee Performance Monitoring Website
This website is used to monitor employee performance at low level management with 3 account roles:
admin, manager, and staff. 

## Tech stack
CodeIgniter4 PHP framework, Mysql database, Stisla bootstrap template, CSS, Js.

## Minimum requirement
PHP version 7.4 or higher is required.
For more information about this website visit:
<p>https://drive.google.com/drive/folders/13f6El7Ff9xOeyfQTzYBat49EKg4tWaut 

## Demo and role scope
1. Admin 

- [x] CRUD control on employee entities, and periodic entities

- [x] Admin can set the start time for the KPI target period by creating active time period, maximum one active period, to allow managers to create target. And archive that time period in the final days of the assessment for the manager can achieve goals and get KPI score, percentage and grade results KPIs

<video width="800" src="https://github.com/alfiziaulhaq/emp_performance_monitoring_web/assets/90314126/2eba4bba-8659-4a6b-8803-d64ccf94b333"></video>

2. Manager

- [x] Add goals (targets) to the staff under him, determine the weight of KPIs, determine the deadline for goals (targets), assess the percentage of targets achieved and approved the final results of a staff's KPI score which will be recorded in a monthly period

- [x] Displays the results of the KPI rating scores of staff and those under them in the period monthly

<video width="800" src="https://github.com/alfiziaulhaq/emp_performance_monitoring_web/assets/90314126 cb483c57-d6d5-46d7-8d16-4e896d5e9444"></video>

3. Staff

- [x] Display the staff's profile and goals for the current active period

- [x] Displays the KPI results themselves after being approved by the user manager as
evaluator. And see the history of his KPI results from time to time

<video width="800" src="https://github.com/alfiziaulhaq/emp_performance_monitoring_web/assets/90314126/a7da516a-cd6d-4c17-9ce6-50572f82ff86"></video>

## How to try this website in localhost :
1. download Xampp 
2. extract zip file of source code in the folder naming 'htdocs'
3. click config of Apache module and open PHP.ini file and delete the semicolon on statement line: ;extension=intl
4. run/start module of Apache and Mysql from xampp
5. open browser, go to URL: http://localhost/phpmyadmin
6. create database naming 'monitoring_web'
7. import 'monitoring_web.sql' file from zip file of source code to database 'monitoring_web' 
8. from your IDE, open the folder of source code naming'emp_performance_monitoring_web' in htdocs folder
9. from your IDE, open terminal and run: php spark serve
10. open browser, go to URL: http://localhost:8080/
11. website ready to use

## Default password
How to login first as... :
1. admin user
	<p>one of the username : alfiziaulhaq
	<p>default password    : admin
2. manager user
	<p>one of the username : manager1
	<p>default password    : manager
3. staff user
	<p>one of the username : staff1
	<p>default password    : staff


