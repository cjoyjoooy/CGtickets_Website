<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/clientTicketDetailsStyle.css">
    <title>Ticket Details</title>
</head>

<body>
    @include('components.navbar')
    <main class="body-container">
        <div class="content-container">
            <section class="movielist-details-container">
                <div class="movie-img-container">
                    <img class="movie-img" src="/resource/asssasin.jpg" alt="">
                </div>
                <div class="movielist-details">
                    <h2>Ticket Details</h2>
                    <div class="movielist-info">
                        <span>Movie:</span><span>The Assasin </span>
                    </div>
                    <div class="movielist-info">
                        <span>Date:</span> <span>March 13, 2023</span>
                    </div>
                    <div class="movielist-info">
                        <span>Time:</span> <span>3:00 pm - 6:00 pm</span>
                    </div>
                    <div class="movielist-info">
                        <span>Cinema:</span> <span>Cinema 5</span>
                    </div>
                    <div class="movielist-info">
                        <span>Location:</span> <span>Abreeza</span>
                    </div>
                    <div class="movielist-info">
                        <span>Seat Available:</span> <span>87</span>
                    </div>
                </div>
            </section>
            <section class="ticket-details-container">
                <div class="ticket-details">
                    <div class="ticket-info">
                        <h3>Ticket</h3>
                        <p>Wakanda Forever</p>
                    </div>
                    <div class="ticket-info">
                        <h3>Price</h3>
                        <p>299</p>
                    </div>
                    <div class="ticket-info">
                        <h3>Quantity</h3>
                        <input type="number" name="quantity" id="quantity" min="1" value="1">
                    </div>
                    <div class="ticket-info">
                        <h3>Subtotal</h3>
                        <p>299</p>
                    </div>
                </div>
                <div class="ticket-details">
                    <div class="ticket-info">
                        <span>Booking Fee:</span>
                        <span>20</span>
                    </div>
                    <div class="ticket-info">
                        <span>Total:</span>
                        <span>299</span>
                    </div>
                </div>
            </section>
            <div class="action-button-container">
            <a href='clientshowListPage.php?'><button type="button" class="btn btn-cancel">Cancel</button></a>
            <a href="clientPaymentPage.php"><button type="button" class="btn btn-checkout">Checkout</button></a>
            </div>
            
        </div>
    </main>
    @include('components.footer')
    <script src='jsfile/homepage.js'></script>
</body>

</html>