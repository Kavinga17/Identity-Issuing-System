
<!DOCTYPE html>
<html >
 <head>
     <title>Identity Issuing Service</title>
     <link rel ="stylesheet" href="Reqldentity.css">

     <script src="ReqIden.js"></script>

 </head>
 <body>
 <?php
   
     include_once'Header.php';

     session_start();

     // Check if the user is not logged in.

     if (!isset($_SESSION["user_id"])) {
      // Redirect to the login page
      header("Location: Login.php");
      exit();
     } else{
      echo $_SESSION["email"];
     }

  
  if (isset ( $_POST["submitData"])) {
      $district = $_POST['district'];
      $ds_division = $_POST['ds-division'];
      $number_of_division = $_POST['division-count'];
      $id_type = $_POST['id-type'];
      $name = $_POST['name-initials'];
      $gender = $_POST['gender'];
      $civil = $_POST['civil-status'];
      $profession = $_POST['occupation'];
      $dob = $_POST['date-of-birth'];
      $birth_certificate_no = $_POST['birth-certificate'];
      $birth_place = $_POST['place-of-birth'];
      $city = $_POST['birth-city'];
      $division = $_POST['birth-division'];
      $country = $_POST['birth-country'];
      $number_of_house = $_POST['house-number'];
      $road = $_POST['road-street'];
      $village = $_POST['city'];
      $postal_code = $_POST['postal-code'];
      $purpose = $_POST['application-purpose'];
      $last_id = $_POST['last-id-card'];
      $issue_date = $_POST['issue-date'];
      $telephone = $_POST['telephone'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $payment_ = $_POST['payment'];

      include_once "dbc.php";
  
      $sql = "INSERT INTO request_identity (District, DS_Division, Number_of_Division, ID_Type, Name, Gender, Civil, Profession, DOB, Birth_Certificate_No, Birth_Place, City, Division, Country, Number_of_House, Road, Village, Postal_Code, Purpose, Last_ID, Issue_Date, Telephone, Mobile, Email, Payment_Method)
      VALUES ('$district', '$ds_division', '$number_of_division', '$id_type', '$name', '$gender', '$civil', '$profession', '$dob', '$birth_certificate_no', '$birth_place', '$city', '$division', '$country', '$number_of_house', '$road', '$village', '$postal_code', '$purpose', '$last_id', '$issue_date', '$telephone', '$mobile', '$email', '$payment_')";
  
      if ($conn->query($sql) === TRUE) {
          echo " : Data inserted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
  }

?>

<form method="post" action="ReqIden.php">
    <br>
  <fieldset>

    <legend>Request Identity</legend>

    <div class="form-section">
      <label for="district">District:</label>
      <input type="text" id="district" name="district" required>

      <label for="ds-division">D.S. Division:</label>
      <input type="text" id="ds-division" name="ds-division" required>

      <label for="division-count">Number Of Division:</label>
      <input type="number" id="division-count" name="division-count" required>

      <label for="id-type">Type Of Identity Card:</label>
      <input type="text" id="id-type" name="id-type" required>
    </div>

    <div class="form-section">
      <h3>Should be filled in block letters</h3>

      <label for="name-initials">Name with initials:</label>
      <input type="text" id="name-initials" name="name-initials" required>

      <label for="gender">Select the Gender</label>
      <select id="gender" name="gender"required>
      <option value="male">Male</option>
      <option value="Female">Female</option>
      </select>
      <br><br>
      <label for="civil-status">Civil Status:</label>
      <select id="civil-status" name="civil-status" required>
        <option value="">Select civil status</option>
        <option value="married">Married</option>
        <option value="single">Single</option>
        <option value="widowed">Widowed</option>
        <option value="divorced">Divorced</option>
      </select>
       <br><br>
      <label for="occupation">Profession/Occupation:</label>
      <input type="text" id="occupation" name="occupation" required>
    </div>

    <div class="form-section">
      <h3>Details Of Birth</h3>

      <label for="date-of-birth">Date Of Birth:</label>
      <input type="text" id="date-of-birth" name="date-of-birth" required>

      <label for="birth-certificate">Birth Certificate No:</label>
      <input type="text" id="birth-certificate" name="birth-certificate" required>

      <label for="place-of-birth">Place Of Birth:</label>
      <input type="text" id="place-of-birth" name="place-of-birth" required>

      <label for="birth-city">City:</label>
      <input type="text" id="birth-city" name="birth-city" required>

      <label for="birth-division">Division:</label>
      <input type="text" id="birth-division" name="birth-division" required>

      <label for="birth-country">Country Of Birth:</label>
      <input type="text" id="birth-country" name="birth-country" required>
    </div>

    <div class="form-section">
      <h3>Details Of Residence</h3>

      <label for="house-number">Name/Number of the house:</label>
      <input type="text" id="house-number" name="house-number" required>

      <label for="road-street">Road/Street:</label>
      <input type="text" id="road-street" name="road-street" required>

      <label for="city">Village/City:</label>
      <input type="text" id="city" name="city" required>

      <label for="postal-code">Postal Code:</label>
      <input type="text" id="postal-code" name="postal-code" required>
    </div>

    <div class="form-section">
      <h3>If the duplicate of identity card apply for</h3>

      <label for="application-purpose">Purpose for application:</label>
      <textarea id="application-purpose" name="application-purpose" ></textarea>

      <label for="last-id-card">Last ID Card number:</label>
      <input type="text" id="last-id-card" name="last-id-card">

      <label for="issue-date">Date of the issue of the Identity Card:</label>
      <input type="text" id="issue-date" name="issue-date" >
    </div>

    <div class="form-section">
      <h3>Details Request for inquiries</h3>

      <label for="telephone">Telephone no:</label>
      <input type="text" id="telephone" name="telephone" required>

      <label for="mobile">Residence mobile:</label>
      <input type="text" id="mobile" name="mobile" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
  
     </div>
    <br>
    <label>Select your payment method</label>

    <input type="radio" id="paypal" name="payment" value="paypal" >
    <label for="paypal">PayPal</label>
    <br>

    <input type="radio" id="creditdebit" name="payment" value="creditdebit" >
    <label for="creditdebit">Credit/Debit </label>
    <br>
    <input type="radio" id="offline" name="payment" value="offline">
    <label for="offline">Offline Payment</label>
    <br><br>
         
    <center>
         <button type="submit" name = "submitData" onclick="submitPayment()" >Submit</button>
     </center>

  </fieldset>
</form>
</body>
</html>
