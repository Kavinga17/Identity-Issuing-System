<?php
// Check if the form is submitted
if (isset($_POST["submit"]))  {
  // Retrieve the form data
  $cardNumber = $_POST['cardNumber'];
  $cardName = $_POST['cardName'];
  $email = $_POST['email'];
  $contactNo = $_POST['ContactNo'];
  $Amount = $_POST['amount'];

  // Connect to the database
  include_once "dbc.php";

  // Prepare and execute the SQL query
  $insertSql = "INSERT INTO credit_debitpayment (CardNumber, CardName, Contact_Number, email, Amount) VALUES ('$cardNumber', '$cardName', '$contactNo', '$email', '$Amount')";
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
    <title>Credit Card Payment</title>
    <link rel = "stylesheet" href="CreditCardPayment.css">
</head>
<body>

<?php

include_once'Header.php';

?>
  <h1>Credit Payment Form</h1>
  <form Method="POST" action="creditCardPayment.php">

  <h3><i><u>Card Details</u></i></h3>
      <div class="div1">
      <label for="cardNumber">Card Number : </label>
      <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter card number" required>
      </div>
      <br>

      <div class="div2">
      <label for="cardName">Cardholder Name : </label>
      <input type="text" id="cardName" name="cardName" placeholder="Enter cardholder name" required>
      </div>
      <br>

      <div class="div3">
      <label for="expiryDate">Expiry Date : </label>
      <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
      </div>
      <br>

      <div class="div4">
      <label for="cvv">CVV : </label>
      <input type="password" id="cvv" name="cvv" placeholder="Enter CVV" required>
      </div><br>

    <br>


      <br><br>

      <h3><i><u>Billing Details</u></i></h3>

      <div class="div5">
      <label for="billingAddress2"> Address 1 : </label>
      <textarea id="billingAddress1" name="billingAddress1" placeholder="Enter billing address" required></textarea>
      </div>
      <br>
      
      <div class="div6">
      <label for="billingAddress2"> Address 2 : </label>
      <textarea id="billingAddress2" name="billingAddress2" placeholder="Enter billing address" ></textarea>
      </div>
      <br>

      <div class="div6">
      <label for="city">City : </label>
      <input type="text" id="city" name="city" placeholder="Enter city" required>
      </div>
      <br>

      <div class="div7">
      <label for="Province">Province : </label>
      <input type="text" id="province" name="province" placeholder="Enter Province" required>
      </div>
      <br>

      <div class="div8">
      <label for="zip">Post Code : </label>
      <input type="text" id="post" name="post" placeholder="Enter Post code" required>
      </div>
      <br>

      <div class="div9">
      <label for="ContactNo">Contact number : </label>
      <input type="text" id="number" name="ContactNo" placeholder="Enter Contact Number" required>
      </div>
      <br>

      <div class="div10">
      <label for="email">Email : </label>
      <input type="email" id="email" name="email" placeholder="Enter Email" required>
      </div>
      <br><br>

      
      <div class="div11">
    <label for="amount">Amount : </label>
    <input type="text" id="amount" name="amount" placeholder="Enter amount" required>
    </div>
    <br><br>

    <button  class="btn" name="submit"><b>Submit Payment</b></button>
    
</form>
</body>
</html>


<?php
    include_once'footer.php';
 ?>