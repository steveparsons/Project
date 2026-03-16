Task 1 

Due to the classes specified not having all the functionallity of the inBuilt interfaces like SplObserver I created
interfaces to mirror the defined classes in the test.

The basic output of task 1 is outputted using the index.php file.

Task 2

dashboards.php  main file to run the dashboard.

the socket-server.php file first needs to be run beforehand for the dashboards.php file to connect to.

Creating the realtime dashboard - I used Ratchet, To simulate how the dashboard would work I used a poller in the dashnoards.php to send a message to 
trigger the updating of the state and then returning this back to the dashboard.  
Ideally in a real world situation the state changes would be stored in a db and then a notificaiton trigger would then be sent of the update to 
current watchers of the dashboard in a more PUB / SUB consturction.
