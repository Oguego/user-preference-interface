### user-preference-interface

##Web interface developed with php. Accessible by the Hybrid-Reasoning-System, and creates/modifys preference ranking
=========================================Requirements and setting-up========================================
XAMPP installation is needed

Download folder (user-preference-interface) to a c: location

Start XAMPP server

Access localhost home page. (localhost/preferences/hmtl/home.php)

=============================================== Usage ================================================
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