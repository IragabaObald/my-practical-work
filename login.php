<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['student_name'])) {
        $name = trim($_POST['student_name']);
        
        // 1. Store name in session
        $_SESSION['student_name'] = $name;
        
        // 2. Store name in cookie for 7 days
        setcookie('saved_student_name', $name, time() + (7 * 24 * 60 * 60), "/");
        
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Please enter your name.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student form Login</title>
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
        .login-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .error-message {
            color: #d9534f;
            text-align: center;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #5bc0de;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #31b0d5;
        }
        .cookie-welcome {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
            background-color: #e9f7fe;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Student form Login</h2>
        
        <?php if (!empty($message)): ?>
            <p class="error-message"><?php echo $message; ?></p>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
            <label for="student_name">Student name:</label>
            <input type="text" id="student_name" name="student_name" required>
            <button type="submit">Login</button>
        </form>

        <?php
        // If a cookie exists from a previous visit, display it
        if (isset($_COOKIE['saved_student_name'])) {
            echo "<div class='cookie-welcome'>Welcome back! We remember you, <strong>" . htmlspecialchars($_COOKIE['saved_student_name']) . "</strong>.</div>";
        }
        ?>
    </div>
</body>
</html>