
<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php



$products = $conn->query("select * from cart where user_id ='$_SESSION[user_id]'");
$products->execute();

if(isset($_SESSION['saleprice'])){
    $_SESSION['total_price'] = $_SESSION['saleprice'] + 20 ;
}

$allproducts = $products->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST['save'])) {
{
        $username = $_POST['username'];
        $card_number = $_POST['card_number'];
        $expiration_month = $_POST['expiration_month'];
        $expiration_year = $_POST['expiration_year'];
        $cvv = $_POST['cvv'];
        $saleprice = $_SESSION['total_price'];
        $user_id = $_SESSION['user_id'];

$insert = $conn->prepare("insert into payments(username,card_number,expiration_month,expiration_year,cvv,price,user_id)
        VALUES(:username,:card_number,:expiration_month,:expiration_year,:cvv,:saleprice,:user_id)");
        
        $insert->execute([
            ":username"=> $username,
            ":card_number"=> $card_number,
            ":expiration_month"=> $expiration_month,
            ":expiration_year"=> $expiration_year,
            ":cvv"=> $cvv,       
            ":saleprice"=> $saleprice,
            ":user_id"=> $user_id,
        ]);       

        echo "<script> window.location.href='".APPURL."/products/confirm.php'; </script>";
    }
}



?>


<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">Bootstrap Payment Forms</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" id="paymentForm" class="tab-pane fade show active pt-3">
                            <form role="form"  method="post" action="payment.php">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" id="cardOwner"  name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" id="cardNumber" name="card_number" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> 
                                                <input type="number" placeholder="MM" id="expiryMonth" name="expiration_month" class="form-control" required>
                                             <input type="number" placeholder="YY" id="expiryYear" name="expiration_year"  class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text"  id="cvv" name="cvv"  required class="form-control"> </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                     <button name="save" type="submit" onclick="onSubmit()" class="subscribe btn btn-success btn-block shadow-sm"> Confirm Payment </button>
                            </form>
                        </div>
                    </div>
                    <br />
                    <i class="bi bi-calculator"></i><h2 class="btn btn-dark col-md-6">Final total IN USD  <h2>$<?php echo $_SESSION['saleprice'] +20; ?></h2></h2>
                
                     <!-- End -->
                    <!-- Paypal info -->
                    <div id="paypal" class="tab-pane fade pt-3">
                        <h6 class="pb-2">Select your paypal account type</h6>
                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- bank transfer info -->
                    <div id="net-banking" class="tab-pane fade pt-3">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Select your Bank</h6>
                            </label> <select class="form-control" id="ccmonth">
                                <option value="" selected disabled>--Please select your Bank--</option>
                                <option>Bank 1</option>
                                <option>Bank 2</option>
                                <option>Bank 3</option>
                                <option>Bank 4</option>
                                <option>Bank 5</option>
                                <option>Bank 6</option>
                                <option>Bank 7</option>
                                <option>Bank 8</option>
                                <option>Bank 9</option>
                                <option>Bank 10</option>
                            </select> </div>
                        <div class="form-group">
                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                        </div>
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>

 

<?php require "../includes/footer.php"; ?>


<script>
    // Function to validate credit card number
    function validateCardNumber() {
        // Get the value of the credit card number input field
        var cardNumber = document.getElementById("cardNumber").value;
        // Basic validation: Check if the input consists of 16 digits
        if (!/^\d{16}$/.test(cardNumber)) {
            alert("Please enter a valid 16-digit credit card number");
            return false;
        }
        return true;
    }

    // Function to validate expiration date
    function validateExpirationDate() {
        // Get the values of the month and year input fields
        var month = document.getElementById("expiryMonth").value;
        var year = document.getElementById("expiryYear").value;
        // Basic validation: Check if the month is between 1 and 12 and the year is greater than or equal to the current year
        if (!(month >= 1 && month <= 12) || year < new Date().getFullYear()) {
            alert("Please enter a valid expiration date");
            return false;
        }
        return true;
    }

    // Function to validate CVV
    function validateCVV() {
        // Get the value of the CVV input field
        var cvv = document.getElementById("cvv").value;
        // Basic validation: Check if the input consists of 3 digits
        if (!/^\d{3}$/.test(cvv)) {
            alert("Please enter a valid 3-digit CVV");
            return false;
        }
        return true;
    }

    // Function to validate card owner name
    function validateCardOwner() {
        // Get the value of the card owner name input field
        var cardOwner = document.getElementById("cardOwner").value;
        // Basic validation: Check if the input is not empty
        if (cardOwner.trim() === "") {
            alert("Please enter the card owner's name");
            return false;
        }
        return true;
    }

    // Function to handle form submission
    function onSubmit() {
        // Perform validation for each input field
        if (validateCardNumber() && validateExpirationDate() && validateCVV() && validateCardOwner()) {
            // If all validations pass, submit the form
            document.getElementById("paymentForm").submit();
        }
       
    }
</script>

