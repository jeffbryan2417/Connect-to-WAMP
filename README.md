# Student CRUD Application Setup with WAMP, MySQL, and PHP

## Table of Contents
1. [Access phpMyAdmin](#step-1-access-phpmyadmin)
2. [Create Database and Table](#step-2-create-database-and-table)
3. [Create Database Connector in PHP](#step-3-create-database-connector-in-php)
4. [Insert Data from PHP](#step-4-insert-data-from-php)
5. [Run the Application](#step-5-run-the-application)

---

## Step 1: Access phpMyAdmin

1. Open phpMyAdmin by visiting: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)
2. Log in with the following credentials:
   - **User:** root
   - **Password:** *(leave blank)*
3. Select **MySQL** as the service.

![phpMyAdmin login](https://github.com/user-attachments/assets/82422359-0a01-42df-88b2-09a73f663883)

---

## Step 2: Create Database and Table

1. Once logged in, click **New** to create a new database.
2. Name the database `student_db`.
3. Create a table named `users` with the following SQL:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);
```

![phpMyAdmin dashboard](https://github.com/user-attachments/assets/d22f55e7-7c21-4fd0-8603-f66b671ceef8)

---

## Step 3: Create Database Connector in PHP

1. Create a project folder in WAMP:

```
C:\wamp64\www\student_crud
```

2. Inside this folder, create a file named `connect.php`.
3. This file will handle the database connection. Example code:

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

---

## Step 4: Insert Data from PHP

1. Create a file named `insert.php` in the same folder as `connect.php`.
2. This file will handle inserting data into the database. Example code:

```php
<?php
include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
```

> You can expand this file to include Edit, Update, Delete, and View operations for a full CRUD.

---

## Step 5: Run the Application

1. Ensure all files are saved under:

```
C:\wamp64\www\student_crud\
```

2. Start WAMP (ensure Apache and MySQL services are **green**).
3. Open your browser and visit:

```
http://localhost/student_crud/
```

✅ You can now:

- Add new students
- View all records
- Edit a record
- Delete a record

> **Note:** Make sure WAMP is green to run smoothly.

![WAMP status](https://github.com/user-attachments/assets/7233d2b1-c6f7-4294-b391-d187a12e49c6)

