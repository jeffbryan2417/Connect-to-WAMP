<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Student CRUD</title>
  <style>
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
  // CREATE
  if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO students (name, date, status) VALUES ('$name', '$date', '$status')";
    $conn->query($sql);
    header("Location: index.php"); // refresh page
  }

  // DELETE
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: index.php");
  }

  // UPDATE
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $conn->query("UPDATE students SET name='$name', date='$date', status='$status' WHERE id=$id");
    header("Location: index.php");
  }

  // READ
  $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
  ?>

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
          <a href="?edit=<?= $row['id'] ?>">Edit</a> |
          <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

  <?php
  // EDIT FORM
  if (isset($_GET['edit'])):
    $id = $_GET['edit'];
    $editResult = $conn->query("SELECT * FROM students WHERE id=$id");
    $editRow = $editResult->fetch_assoc();
  ?>
  <h3>Edit Student</h3>
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?= $editRow['id'] ?>">
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
