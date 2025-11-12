<?php 
// Include database connection
include 'connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student CRUD</title>
  <style>
    /* Basic page styling */
    body { font-family: Arial; margin: 40px; }
    form { margin-bottom: 20px; }
    input, select { padding: 6px; margin-right: 8px; }
    table { border-collapse: collapse; width: 80%; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    th { background-color: #f4f4f4; }
    a { text-decoration: none; color: blue; }
  </style>
</head>
<body>
  <h2>Student Management System (PHP CRUD)</h2>

  <!-- Add Student Form -->
  <form method="POST" action="">
    <!-- Input fields for student name, date, and status -->
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="date" name="date" required>
    <select name="status" required>
      <option value="Present">Present</option>
      <option value="Absent">Absent</option>
      <option value="Late">Late</option>
    </select>
    <button type="submit" name="add">Add Student</button>
  </form>

  <?php
  // CREATE: Insert new student when 'Add' button is clicked
  if (isset($_POST['add'])) {
    $name = $_POST['name'];      // Get student name from form
    $date = $_POST['date'];      // Get date from form
    $status = $_POST['status'];  // Get status from form

    // Insert data into 'students' table
    $sql = "INSERT INTO students (name, date, status) VALUES ('$name', '$date', '$status')";
    $conn->query($sql);

    // Refresh page to show updated data
    header("Location: index.php"); 
  }

  // DELETE: Remove a student when 'Delete' link is clicked
  if (isset($_GET['delete'])) {
    $id = $_GET['delete']; // Get student ID from URL
    $conn->query("DELETE FROM students WHERE id=$id"); // Delete record
    header("Location: index.php"); // Refresh page
  }

  // UPDATE: Update student data when 'Update' button is clicked
  if (isset($_POST['update'])) {
    $id = $_POST['id'];       // Get student ID
    $name = $_POST['name'];   // Get updated name
    $date = $_POST['date'];   // Get updated date
    $status = $_POST['status']; // Get updated status

    // Update record in database
    $conn->query("UPDATE students SET name='$name', date='$date', status='$status' WHERE id=$id");
    header("Location: index.php"); // Refresh page
  }

  // READ: Fetch all students from database
  $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
  ?>

  <!-- Display student data in a table -->
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['date'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <!-- Edit and Delete links -->
          <a href="?edit=<?= $row['id'] ?>">Edit</a> |
          <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

  <?php
  // EDIT FORM: Show edit form if 'Edit' link is clicked
  if (isset($_GET['edit'])):
    $id = $_GET['edit']; // Get student ID from URL
    $editResult = $conn->query("SELECT * FROM students WHERE id=$id"); // Fetch student data
    $editRow = $editResult->fetch_assoc(); // Store data in variable
  ?>
  <h3>Edit Student</h3>
  <form method="POST" action="">
    <!-- Hidden field to store student ID -->
    <input type="hidden" name="id" value="<?= $editRow['id'] ?>">
    <!-- Input fields pre-filled with existing data -->
    <input type="text" name="name" value="<?= $editRow['name'] ?>" required>
    <input type="date" name="date" value="<?= $editRow['date'] ?>" required>
    <select name="status" required>
      <option value="Present" <?= ($editRow['status']=="Present")?'selected':'' ?>>Present</option>
      <option value="Absent" <?= ($editRow['status']=="Absent")?'selected':'' ?>>Absent</option>
      <option value="Late" <?= ($editRow['status']=="Late")?'selected':'' ?>>Late</option>
    </select>
    <button type="submit" name="update">Update</button>
  </form>
  <?php endif; ?>

</body>
</html>
