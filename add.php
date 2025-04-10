<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add New Student</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Add Student</button>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];

    $query = "INSERT INTO mamber (name, phone, email, address) VALUES ('$name', '$phone', '$email', '$address')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student added successfully!"); window.location.href="index.php";</script>';
    } else {
        echo '<div class="alert alert-danger mt-3">Failed to add student!</div>';
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
