# Student CRUD Application Setup with WAMP, MySQL, and PHP

---

## Step 1: Access phpMyAdmin

1. Open phpMyAdmin by clicking [this link](http://localhost/phpmyadmin/).  
2. Log in with the following credentials:  
   - **User:** root  
   - **Password:** (leave blank)  
3. Select the service you need (**MySQL** for the backend).  

![phpMyAdmin login](https://github.com/user-attachments/assets/82422359-0a01-42df-88b2-09a73f663883)

---

## Step 2: Create a Database and Table

Once logged in, you will see the phpMyAdmin dashboard:  

![phpMyAdmin dashboard](https://github.com/user-attachments/assets/d22f55e7-7c21-4fd0-8603-f66b671ceef8)

1. Click **New** to create a new database.  
2. In this example, the database name is `student_db`.  
3. Create a table named `users` with the following SQL:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);
### Step 3: Create Database Connector in PHP
Create a project folder in WAMP:

C:\wamp64\www\student_crud
Inside this folder, create a file named connect.php.

This file will handle the database connection.

Example code can be found in the project files.



### Step 4: Insert Data from PHP
Create a file named insert.php in the same folder as connect.php.

This file will handle inserting data into the database.

Refer to your project files for example code.

##Step 5: Run the Application
Ensure all files are saved under:

C:\wamp64\www\student_crud\
Start WAMP (make sure Apache and MySQL services are green).

Visit the app in your browser:
<img width="637" height="289" alt="image" src="https://github.com/user-attachments/assets/63a8bced-0631-4e03-a9be-21dc58cc5845" />

arduino
Copy code
http://localhost/student_crud/
✅ You can now:

-Add new students

-View all records

-Edit a record

-Delete a record

# NOTE make sure the wamp is color green to run smoothly

<img width="255" height="149" alt="image" src="https://github.com/user-attachments/assets/7233d2b1-c6f7-4294-b391-d187a12e49c6" />

