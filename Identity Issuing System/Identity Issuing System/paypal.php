<?php
// Check if the form is submitted
if (isset($_POST["submit"]))  {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $Amount = $_POST['amount'];

  // Connect to the database
  include_once "dbc.php";

  // Prepare and execute the SQL query
  $insertSql = "INSERT INTO paypal (Name,email,Amount) VALUES ('$name', ' $email', '$Amount')";
  if (mysqli_query($conn, $insertSql)) {
      echo "<div class='alert alert-success'>Payment successful, We will verify and inform you later.</div>";
  } else {
      echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paypal Payment</title>
    <link rel ="stylesheet" href="paypalc.css">
</head>
<body>

<?php

include_once'Header.php';

?>

<h2 class="hed"><b><u><i>Paypal Payment Form</i></b></h2></u>
<br>

    <form method="POST"  action = "paypal.php">

           <h3><i><b>Billing Details</b></i></h3>
   
           <div class="div1">
           <label> Full Name : </label>
             <input type="text" id="fname" name="name" placeholder="Aluwihare k">
           </div>
             <br><br>

             
                <div class="amount">
                <label for="amount" >Amount : </label>
                <input type="text" id="amm" name="amount" placeholder="Amount">
                </div>
                <br><br>

             <div class="div3">
             <label> Address : </label>
             <input type="text" name="address" placeholder="No 25/2 Claude rd,kandy">
             </div>
             <br><br>

             <div class="div4">
             <label>City : </label>
             <input type="text" id="city" name="city" placeholder="Kandy">
             </div>
             <br><br>
             
             <div class="div5">
             <label>Province : </label>
             <input type="text" id="province" name="province" placeholder="Central Province">
             </div>
             <br><br>
             
             <div class="div6">
             <label for="zip">Postal Code : </label>
             <input type="text" id="post" name="post" placeholder="20000">
             </div>    
             <br><br>
             
             <div class="email">
                 <label for="email">Email :</label>
                 <input type="text" id="email" name="email" required placeholder="Enter Email">
                 </div>
                 <br><br><br>

                 <img src="img/image.jpeg" alt="Payment Method" style="float:right;width:250px;height:100px"> 
                <br><br>

                <div class="div8">
                <label for="userName" id="Uname"> Username : </label>  
                <input type="text" id="Username" name="UserName" placeholder="Email or Username">
                </div>
                <br><br>

                <div class="div9">
                <label for="password" id="passw">Password : </label>
                <input type="password" id="Passw" name="password" placeholder="Password">
                </div>
                <br><br>
                
                <div class="div7">
          
                <button name="submit" id="continueBtn1"><b>Pay With Paypal</b></button>
                </div>       
              
     

        </form> 

  </body>
</html>


<?php
    include_once'footer.php';
 ?>