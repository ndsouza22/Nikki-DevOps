<?php
// Start the session
session_start();

// Define valid username and password
$valid_username = 'user';
$valid_password = 'password';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match the predefined credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful, redirect to welcome page
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        // Authentication failed, display error message
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
</body>
</html>
