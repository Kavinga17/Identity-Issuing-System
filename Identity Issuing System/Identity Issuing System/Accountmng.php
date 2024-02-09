<!DOCTYPE html>
<html>
<head>
    <title>Account Management</title>
    <link rel="stylesheet" href="Accountmng.css">
</head>
<body>


    <div class="container">
        <h1>Account Management</h1>

        <div class="search-form">
            <form action="Accountmng.php" method="GET">
                <input type="text" name="search" placeholder="Search by email">
                <button type="submit">Search</button>
                <br><br>
                <a href="Login.php" id="l">Login?</a>
            </form>
        </div>
      
        
     <?php

     include_once"dbc.php";

    if (isset($_GET["search"])) {
        $search = $_GET["search"];
        $query = "SELECT * FROM users WHERE Is_Admin = 0 AND email LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Email</th><th>Username</th><th>Contact No</th><th>Action</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["User_Name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["Contact_No"] . "</td>";
                echo "<td><a href='delete.php? email=" . $row["email"] . "'>Delete</a></td>";
                echo "</tr>";  
            }

            echo "</table>";
        } else {
            echo "No user accounts found.";
        }
    } else {
        echo "Please enter an email to search.";
    }

    mysqli_close($conn);
    ?>

    
    </div>



</body>
</html>
