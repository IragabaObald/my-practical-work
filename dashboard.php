<?php
session_start();

// Check if session exists; if not
if (!isset($_SESSION['student_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 25px;
        }
        a {
            display: inline-block;
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <h5>Student name:<?php echo htmlspecialchars($_SESSION['student_name']); ?></h5>
        <p>Welcome,<strong><?php echo htmlspecialchars($_SESSION['student_name']); ?></strong>!<br> You are successfully logged in.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>