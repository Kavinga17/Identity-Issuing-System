<?php
session_start();

include_once "dbc.php";

if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["new-password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm-password"]);

    // Check if the new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match";
        header("Location: Reset.php");
        exit();
    }

    // Hash the new password for secure storage
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        // Valid email, update the password
        $updatePasswordQuery = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";
        if (mysqli_query($conn, $updatePasswordQuery)) {
            $_SESSION['status'] = "Password updated successfully";
            header("Location: Reset.php");
            exit();
        } else {
            $_SESSION['status'] = "Error updating password: " . mysqli_error($conn);
            header("Location: Reset.php");
            exit();
        }
    } else {
        // Invalid email
        $_SESSION['status'] = "Not a valid email";
        header("Location: Reset.php");
        exit();
    }

  
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <link rel="stylesheet" href="reset.css">
</head>
<body>
<div class="status-message">
    <?php
    if (isset($_SESSION['status'])) {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>
</div>

  <div class="container">
    <h1>Password Reset</h1>

    <form action="reset.php" method="post">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="new-password">New Password:</label>
      <input type="password" id="new-password" name="new-password" required>

      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>

      <button type="submit" name="submit">Reset Password</button>
      <b><a href= "Login.php">Login page</a></b>
    </form>
  </div>
</body>
</html>
