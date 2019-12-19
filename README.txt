### user-preference-interface

##Web interface developed with php. Accessible by the Hybrid-Reasoning-System, and creates/modifies preference ranking
=========================================Requirements and setting-up==============================================
XAMPP installation is needed. Install XAMPP in the c: drive

Download folder (user-preference-interface) to the c:/xampp/htdocs location

Xampp installer can be found here: https://www.apachefriends.org/download.html

current folder location should be c:/xampp/htdocs/user-preference-interface-master/Preferences

Open the connection.php file change the login acces to give access to your MySQL Database.
       Currently looks like:
          $servername = "localhost";
          $username = "mysql";
          $password = "123456";
          $dbname = "preferences";
          
       Should be:
          $servername "localhost"
          $username = "" (your DB username)
          $password = "" (your DB password)
          $dbname = "preferences"
Save and start XAMPP server

Access localhost home page using, localhost/user-preference-interface-master/Preferences/html/home.php
This should lunch the home page of the preference interface.
=============================================== Usage ========================================================
#(Home: RETRIEVE OR SETUP USER)

"New User": Accept any user name

"Submit":
#(SELECT YOUR PREFERENCES) 
Provides list of avaliable set preferences to choose from and manage

#(PRIORITIZE SELECTED PRERENCES) Allow you to rank selected preferences from 1-10 (10 being highest priority)

Records of the user are saved in the DB (currently connected to MySQL)

-------------------------------------------------------------------------------------------------------------

#(Home: RETRIEVE OR SETUP USER)

"Existing User": Select from an existing user from the list

"Submit": Retrieves the records of the selected user

#(MODIFY SELECTED PREFERENCES): Modify/edit preference ranking or assign ranking to a preference without a ranking

Records are updated in DB
