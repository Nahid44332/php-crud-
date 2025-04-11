<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Member</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <a href="add.php" class="btn btn-success mb-3">+ Add New Member</a>
  <input type="text" id="searchInput" class="form-control form-control-lg mb-3" placeholder="🔍 Search by name, email or phone...">
  <h1>Member</h1>

  <table class="table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM mamber";
        $member = mysqli_query($conn, $query);
        $serial = 1;

        if ($member && mysqli_num_rows($member) > 0) {
          while($row = mysqli_fetch_assoc($member)) {
            $id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
            $status = $row['status'];

            echo "<tr>
              <th scope='row'>{$serial}</th>
              <td>{$name}</td>
              <td>{$phone}</td>
              <td>{$email}</td>
              <td>{$address}</td>
              <td>
                <a href='profile.php?id={$id}' class='btn btn-info btn-sm'>Profile</a>
                <a href='edit.php?id={$id}' class='btn btn-primary btn-sm'>Edit</a>
                <a href='delete.php?id={$id}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this?\")'>Delete</a>
              </td>
              <td>
                ". ($status == 'Active' 
                  ? "<a href='toggle.php?id={$id}&status=Inactive' class='btn btn-warning btn-sm'>Inactive</a>"
                  : "<a href='toggle.php?id={$id}&status=Active' class='btn btn-success btn-sm'>Active</a>") ."
              </td>
            </tr>";
            $serial++;
          }
        } else {
          echo "<tr><td colspan='7' class='text-center'>No members found!</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>
<script>
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('keyup', function () {
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll("table tbody tr");

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
</script>

</body>
</html>
