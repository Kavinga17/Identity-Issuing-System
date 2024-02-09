<!DOCTYPE html>
<html >
 <head>

     <title>Identity Issuing Service</title>
     <link rel = "stylesheet" href="Download.css">

</head>   

 <body>
 <?php

     include_once'Header.php';

  ?>

  <div class="container">
    <br><br><br>
        <center>
        <div class="shape">
        <h1><u> Application Download </u></h1>
        <img src = "img/Download.png" width="100" length="150">
        <h2> Select the personal identity document you wish to request</h2>
        <h3> <a href = "Download_Docs/NIC_Application.pdf" download> <button class="hover_button"> NIC </button> </a> <a href = "Download_Docs/DrivingLicense_Application.pdf" download> <button class = "hover_button"> Driving License </button> </a> <a href="Download_Docs/Passport_Application.pdf" download> <button class="hover_button"> Passport </button> </a> </h3>
        </div>
        </center>
        <h3 class="alignmenthead"><b> Additional Downloads </b></h3>
        <a href = "Download_Docs/Guideline_Sheet.pdf" download>
        <h4 class="alignment">Guideline Sheet </h4>
        </a>
        <a href = "Download_Docs/TermsAndConditions.pdf" download>
        <h4 class="alignmentalt">Terms and Conditions </h4>
        </a>
        <a href="Download_Docs/Camera_Studio_List.pdf" download>
        <h4 class="bottom_center">List of accepted camera studios for photos</h4>
        </a>
    </div>
 </body>
</html>

<?php
    include_once'footer.php';
 ?>