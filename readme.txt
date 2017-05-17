App will run on Linux on an Apachi Web server with MySql and PHP

Styling: Bootstrap CSS framework used as it works well in a rapid development environment and also has cutting edge stylesheets. App is fully responsive so will render well on mobile devices which is good for staff who may well access app from mobile devices/tablets.

Programming Language: I chose to develop the app in HTML, Javascript and PHP. Stack overflow was used to ensure clean code was used.

Database: MySql

Connection details to run app on Wamp or something similar.

$ser="localhost";
$user="root";
$pass="";
$dbn="receptiondesk_db";

I should have used a join to retrieve data from the service table.

Security: I created a login section so only admin staff can enter data into the reception desk queuing system. I have guarded against MySql Injection when submitting form data to database. There are also some additional features which allow the queing system to be managed so that as customers are seen the current list will be updated accordingly. Customers have a restricted view but staff can make changes to the queue.

App Login Details:
Username: myideashub@gmail.com 
Password: Qwerty