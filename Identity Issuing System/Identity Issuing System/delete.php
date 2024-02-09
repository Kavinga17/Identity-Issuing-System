<?php
include_once "dbc.php";

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    // Delete the user from the database
    $query = "DELETE FROM users WHERE email = '$email'";
    mysqli_query($conn, $query);

    // Redirect back to the Account Management page
    header("Location: Accountmng.php");
    exit();
}
?>
