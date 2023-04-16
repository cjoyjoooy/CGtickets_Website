<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/clientPaymentPageStyle.css">
    <title>Payment</title>
</head>
<body>
    @include('components.navbar')
    <main class="body-container">
        <div class="content-container">
            <section class="summary-container">
                <h2>Summary of Transaction</h2>
                <div class="summary-content">
                    <div class="summary-info">
                        <span>Net Charges:</span>
                        <span>PHP 550</span>
                    </div>
                    <div class="summary-info">
                        <span>Payment To:</span>
                        <span>CGTickets, INC.</span>
                    </div>
                    <div class="summary-info">
                        <span>Payment of:</span>
                        <span>Cinema Tickets</span>
                    </div>
                </div>
            </section>
            <section class="details-container">
                <h2>Personal Details</h2>
                <div class="input-box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="input-box">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
            </section>
            <section class="details-container">
                <h2>Card Details</h2>
                <div class="input-box">
                    <label for="cardname">Card Holder Name</label>
                    <input type="text" name="cardname" id="cardname" required>
                </div>
                <div class="input-box">
                    <label for="CardNum">Credit Card Number</label>
                    <input type="text" name="CardNum" id="CardNum" required>
                </div>
                <div class="input-box">
                    <label for="cvc">CVC/CVV2</label>
                    <input type="text" name="cvc" id="cvc" required>
                </div>
                <div class="input-box">
                    <label for="expirydate">Expiry Date</label>
                    <input type="month" name="expirydate" id="expirydate" required>
                </div>
            </section>
            <div class="action-button-container">
            <a href="clientHomepage.php"><button type="button" class="btn btn-cancel">Cancel</button></a>
            <button type="button" class="btn btn-checkout">Confirm</button>
            </div>
        </div>
    </main>
    @include('components.footer')

    <script src='jsfile/homepage.js'></script>
</body>

</html>