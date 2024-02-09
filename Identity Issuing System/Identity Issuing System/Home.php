<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href ="Home.css">
    </head>
    <body>

    <?php

    include_once 'Header.php';

    ?>

    <br><br>
        <div class="imagecenter">
            <img src="img/DSC_0022.jpeg" alt="Identity Issuing Picture" width="900" height="500">
        </div>
        <div class="newsbox">
            <div class="rectanglecover">
                <h1><u>The latest news</u></h1>
                <br>
                <h3 class="textleft">11/05/2023 <br> Website maintanance will start at 19:00. All services will be halted until maintanance completes</h3>
                <br>
                <h3 class="textleft">09/05/2023 <br> Guideline sheet has been updated. Refer to the new variant from the downloads page</h3>
                <br>
                <h3 class="textleft">04/05/2023 <br> Paypal has been added as an accepted payment method option</h3>
                <br>
                <h3 class="textleft">30/04/2023 <br> FAQ page has undergone improvements. Visit FAQ page to see the updated features</h3>
            </div>
        </div>
        <div class="squarebox">
        <h3 class="alignleft"> Click below to <br> request the issuing <br> of your personal <br> identity document</h3>
        <div class="imagecenter1">
        <img src="img/R (1).png" alt="downward facing arrow" width="50", length="75">
        </div>
        <a href = "ReqIden.php"><button class = "buttonalign"> Click Here </button></a>
        </div>
        <div class="rightbox1">
            <h3> Visit our FAQ page </h3>
        <a href="FAQ.php"><button class="rightboxbutton"> Click Here </button></a>
        </div>
        <div class="rightbox2">
            <h3> Download all the necessary documents </h3>
            <a href="Download.php"><button class="rightboxbutton"> Click Here </button></a>
        </div>
    </body>

  
</html>

<?php
    include_once'footer.php';
 ?>