<?php
// Database connection file include karo
include "config.php";

// Fetch data from table
$sql = "SELECT id, name, email, phone, message, created_at FROM contact_messages ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container py-5">
  <h2 class="text-center mb-4 text-danger fw-bold">📩 Received Messages</h2>

  <?php if ($result->num_rows > 0): ?>
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
      <thead class="table-danger text-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Message</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i = 1;
        while ($row = $result->fetch_assoc()): 
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['message']) ?></td>
          <td><?= htmlspecialchars($row['created_at']) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <div class="alert alert-warning text-center">No contact messages found yet.</div>
  <?php endif; ?>
</div>

</body>
</html>
