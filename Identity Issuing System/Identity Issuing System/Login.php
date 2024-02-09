
<!DOCTYPE html>
<html>
<head>
    <title>Identity Issuing Service</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
<?php
session_start();
// Start a session to store logged-in user data

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database
    require_once "dbc.php";

    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["Password"])) {

            $_SESSION["user_id"] = 1;
            $_SESSION["email"] = $email;

            // Check the user's role
            if ($user["Is_Admin"] == 1) {
                // User is an admin, redirect to the AccMng.php file
                header("Location: Accountmng.php");
                exit();
            } else {
                // User is not an admin, redirect to the ReqIden.php file
                header("Location: ReqIden.php");
                exit();
            }
        } else {
            // Password is incorrect
            $error = "Invalid password";
            echo $error;
        }
    } else {
        // Email is not found
        $error = "Invalid email";
        echo $error;
    }
}
?>


 <div class="container">
  <fieldset>
    <h1>Kavinga</h1>
    <img src="img/avatar-3637425_1280.png">
    <form action="login.php" method="post">
      <label for="username">Email :</label>
      <input type="text" id="username" name="email" required>

      <label for="password">Password :</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" name="login">Login</button>
      <p>
        <a href="Reset.php"  id = "passw"> Forget Password?</a>
      </p>
  
      </b><a href="Register.php"  id=reg> click here to register?</b></a></p>
       
</div>  
</fieldset>  
 </form>
</body>
</html>
