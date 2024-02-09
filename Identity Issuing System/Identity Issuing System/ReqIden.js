

function submitPayment(){

    var paymentOption = document.querySelector('input[name="payment"]:checked').value;
      
    if (paymentOption === "paypal") {
        window.location.href = "paypal.php";
        alert("Please Refer Following paypal form to make the payment. ");
      }
       else if (paymentOption === "creditdebit") {

        window.location.href = "creditCardPayment.php";
        alert(" Please Refer Following Credit/Debit form to make the payment. ");
      } 

      else if (paymentOption === "offline") {
        
        window.location.href = "offlinePayment.php";
        alert("Please Refer Following Ofline payment form to make the payment. ");
      }
      else{
        alert ("Select the coorect payment method");
      }

 }
