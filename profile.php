<?php
include 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM mamber WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile - <?php echo $data['name']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f2f2f2;
      font-family: 'Segoe UI', sans-serif;
    }
    .profile-card {
      max-width: 500px;
      margin: 40px auto;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .profile-header {
      background: linear-gradient(to right, #4e54c8, #8f94fb);
      color: white;
      padding: 30px;
      text-align: center;
    }
    .profile-header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid white;
      margin-bottom: 10px;
    }
    .profile-body {
      padding: 20px 30px;
    }
    .profile-body p {
      margin-bottom: 10px;
    }
    .id-tag {
      background: #fff;
      color: #333;
      padding: 5px 10px;
      display: inline-block;
      border-radius: 20px;
      font-weight: bold;
      font-size: 14px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <div class="profile-header">
  <img src="https://via.placeholder.com/150" alt="Profile Photo" 
     style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid white;">
    <h3><?php echo $data['name']; ?></h3>
    <div class="id-tag">ID: <?php echo $data['id']; ?></div>
  </div>
  <div class="profile-body">
    <p><strong>📞 Phone:</strong> <?php echo $data['phone']; ?></p>
    <p><strong>📧 Email:</strong> <?php echo $data['email']; ?></p>
    <p><strong>📍 Address:</strong> <?php echo $data['address']; ?></p>
    <p><strong>🔘 Status:</strong> 
  <span class="badge bg-<?php echo $data['status'] == 'active' ? 'success' : 'secondary'; ?>">
    <?php echo ucfirst($data['status']); ?>
  </span>
</p>
  </div>
</div>

</body>
</html>
