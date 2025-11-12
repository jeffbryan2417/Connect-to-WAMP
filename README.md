# Setting Up MySQL with phpMyAdmin

1. Open phpMyAdmin by clicking [this link](http://localhost/phpmyadmin/).  
2. Log in with the following credentials:  
   - **User:** root  
   - **Password:** (leave blank)  
3. Select the service you need (in this case, **MySQL** for the backend).  

![phpMyAdmin login](https://github.com/user-attachments/assets/82422359-0a01-42df-88b2-09a73f663883)

---

## After Login

Once logged in, you will see the phpMyAdmin dashboard:  

![phpMyAdmin dashboard](https://github.com/user-attachments/assets/d22f55e7-7c21-4fd0-8603-f66b671ceef8)

1. Click **New** to create a new database.  
2. Step 1: Create a table in MySQL.  

   - In this example, the database name is `student_db`.  
   - Create a table named `users` with the following SQL:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);
