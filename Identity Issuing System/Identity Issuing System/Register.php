<?php
   if (isset($_POST["Register"])) {
    $userName = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["useremail"];
    $Cno = $_POST["contactno"];
    $cPassword = $_POST["cpassword"];

    // Validate password length
    if (strlen($password) < 5) {
        echo "<div class='alert alert-danger'>Password must be at least 8 characters long</div>";
        exit();
    }

    // Validate username length
    if (strlen($userName) <5) {
        echo "<div class='alert alert-danger'>Username must be at least 8 characters long</div>";
        exit();
    }

    // Validate password and confirm password match
    if ($password !== $cPassword) {
        echo "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
        exit();
    }

    // Check if the email already exists in the database
    require_once "dbc.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='alert alert-danger'>Email already exists</div>";
        exit();
    }

    // Insert data into the user table
   // Insert data into the user table

   // Set $isAdmin to 1 for admin users
     $isAdmin = 0;
      
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     $insertSql = "INSERT INTO users (User_Name, Password, email, Contact_No, Is_Admin) VALUES ('$userName', '$hashedPassword', '$email', '$Cno', $isAdmin)";

    if (mysqli_query($conn, $insertSql)) {
        echo "<div class='alert alert-success'>Registration successful</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html >
 <head>

    <title>Registration</title>
    <link rel="stylesheet" href="Register.css">

 </head>
 <body>

    
    <h2>Registration</h2>
<Form action="Register.php" method="post">
        <fieldset>
            <legend>Registration</legend>
        <div class="containeer">

            <p id="ParaMain">
            <label ><b>Username :<b></label><br>
            <input type="text" placeholder="Enter Username" name="username" required ><br><br><br>

            <label ><b>Password :<b></label><br>
            <input type="password" placeholder="Enter Password" name="password" required><br><br><br>

            <label ><b>Confirm Password :<b></label><br>
            <input type="password" placeholder="Enter confirm Password" name="cpassword" required><br><br><br>

            <label ><b>Email :<b></label><br>
            <input type="email" placeholder="Enter Email" name="useremail" required><br><br><br>

            <label ><b>Contact Number :<b></label><br>
            <input type="text" placeholder="Enter Contact Number" name="contactno" required><br><br><br>
            </p>
    
        <center>
            <button class="btnreg" name="Register">Register</button>
         <br><br>
        <a href ="Login.php">Already Have an Account</a>
       </center>
</Form>
        </div>
        </feildset>
    </form>

 </body>
</html>