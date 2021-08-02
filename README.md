# ambulance
**Server used** Xampp
## Ambulance management system

  Goal of this project is to help the ambulances to reachout nearest hospital with available beds. There are 4 views in this project the **admin** view, **hospital** view, **driver** view and the **user** view.  
#### Admin ####
The admin can 
  - Edit details.
  - Add new ambulance or a hospital.
  - Manage areas managed by the ambulance.
  - Get ambulance nearest to the patient.
#### Hospital ####
  The hospital admin is provided with a Log in account to update beds available in their hospital.
#### Driver ####
  The driver is provided with the details about the hospitals in their areas with number of available beds. They can available their status as available,  not available, or in service(if the vehicle is in service).
#### User ####
  Any user can search any ambulance in their area if it is available the status of the ambulance is updated by the driver.
 
## INSTALLATION ##
1. Download and install [xampp server](https://www.apachefriends.org/download.html)
2. Clone **ambulance** to htdocs in xampp folder
  > ./xampp/htdocs/ambulance
3. Open xampp control panel (v3.3.0 was used while building this) start Apache and MySQL.
4. Open [phpmyadmin](http://localhost/phpmyadmin) in browser.
  > http://localhost/phpmyadmin
5. Create a database ambulance and Import ambulance.sql alter table datas as your need if needed without changing table name, column name or its property.
6. open [ambulance](http://localhost/ambulance)
  > http://localhost/ambulance   remember the url path is as of the directory path. 
  
