<?php
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $branch = $_POST['branch'];
    $bank = $_POST['bank'];
    $depositAmount = $_POST['deposit-amount'];
    $dateOfPayment = $_POST['date-of-payment'];
    $slip = $_FILES['file']['name'];

    // Connect to the database
    include_once "dbc.php";

    // Prepare and execute the SQL query
    $insertSql = "INSERT INTO offline_payment (Branch, Bank, Deposit_Amount, Date_of_Payment, Slip) VALUES ('$branch', '$bank', '$depositAmount', '$dateOfPayment', '$slip')";
    
    if (mysqli_query($conn, $insertSql)) {
        // Move the uploaded file to a location
        $targetDir = "slips/";
        $targetFilePath = $targetDir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

        echo "<div class='alert alert-success'>Payment details successfully submitted, We will verify and inform you later.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>

  <title>Offline Payment Page</title>
  <link rel="stylesheet" href="offlinePayment.css">
</head>
<body>

<?php
   include_once'Header.php';
?>

  <div class="container">
  <h2><b><i>Offline Payment</i></b></h2>

    <form method="POST" action="offlinePayment.php" enctype="multipart/form-data">
      <div class="grp1">
      <label for="branch">Branch : </label>
      <input type="text" id="branch" name="branch" placeholder="Enter Branch" required>
      </div>

      <div class="grp2">
      <label for="bank">Bank : </label>
      <select id="bank" name="bank">
      <option>BOC</option>
      <option>Sampath Bank</option>
      <option>COM Bank</option>
      <option>Sampath Bank</option>
      <option>HNB</option>
      <option>Pepoles Bank</option>
      <option>NSB</option>
      <option>NTB</option>
      <option>PanAsia Bank</option>
      </select>
      </div>

      <div class="grp3">
      <label for="deposit-amount">Deposit Amount : </label>
      <input type="text" id="deposit-amount" name="deposit-amount" placeholder="Enter Deposit Amount " required>
      </div>

      <div class="grp4">
      <label for="date-of-payment">Date of Payment : </label>
      <input type="date" id="date-of-payment" name="date-of-payment" required>
      </div>

      <div class="grp5">
      <label for="files">File : </label>
      <input type="file"  name="file" required>
      </div>
      
      <center>
      <button type="submit" name="submit">Submit</button>
      </center>
    </form>
  </div>
</body>
</html>

</body>
</html>


<?php
    include_once'footer.php';
 ?>