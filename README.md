# COSC 386 Final Project: Honor Societies Database
## Group Members: Ryan Rosiak, Travis Gopaul, Cody Murrer, Keith Flagg, Sam David
## Project Description:
This project uses a relational database to store information for Salisbury University’s honor societies that will be accessible from each honor society’s web page. From faculty advisers, officers and members, to scholarships and more, each society has multiple series of relationships between its entities to consider. This database will organize this data to be accessed, stored, and updated while preserving the data’s integrity.
The database will be available to be searched by the general public. Visitors to the site are able to search the database and filter queries for more specific results. With security in mind, sensitive information will only be available to users with login credentials, namely officers, faculty advisors and the super admin. The aforementioned users are able to update, insert, and delete information in the database. The intention is to publish this database online with the ultimate goal being that every honor society at Salisbury University utilizes the database on their respective websites.
The need for this database application stems from the desire to be able to access various points of data pertaining to Salisbury University’s honor societies accurately and in a timely manner. As the chapter adviser for Upsilon Pi Epsilon, our client, Dr. Jing, having such a database would be a valuable tool. Ideally, this project will meet this need for chapter advisors of all honor societies at Salisbury University.

## How To Use:
* Home page 
  * Navigate between important Salisbury University pages in SU tab Helpful Links
  * Navigate between organization websites for Honor Societies chapters at SU in HSO tab Helpful Links
  * Look at twitter through embedded link
  * Read about the website on main page
* Search page
  * Query database using various filters
* Login page
  * Login with admin credentials
  * Navigate to create login page
* Create Login page
  * Create login with valid login credentials (can be obtained from chapter faculty advisors)
* Edit page (when logged in)
  * Update single tuples in the database
  * Insert single tuples into the database
  * Delete single tuples in the database
* Footer
  * Navigate to all contributor's github pages
  * Secondary navbar to navigate pages
  * Navigate to helpful SU pages

## Future Improvements:
* Implement session variable for logged in user’s honor society

  * This will restrict update/insert/edit capabilities of the user to only be able to make changes to the honor society to which they belong , including if they are in multiple    societies

* New user creation notification email

  * Notify the primary faculty advisor whenever a new user is created for the respective honor society
  * Faculty advisor must grant permission for the account to be made

* Forgot/change password functionality
* Allow super admin to be able to change login information of other users
* Ability to add images from the insert page
* The website currently does not have this capability
