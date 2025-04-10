<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM mamber WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $row['name']; ?>'s Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f7f9fc;
      padding: 40px;
    }
    .card {
      max-width: 500px;
      margin: auto;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .profile-img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
      margin-top: -60px;
    }
  </style>
</head>
<body>

<div class="card text-center p-4">
  <div class="card-body">
    <img src="https://i.pravatar.cc/150?img=<?php echo $id; ?>" alt="Profile Image" class="profile-img">
    <h3 class="mt-3"><?php echo $row['name']; ?></h3>
    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
    <a href="index.php" class="btn btn-outline-primary mt-2">Back to List</a>
  </div>
</div>

</body>
</html>
