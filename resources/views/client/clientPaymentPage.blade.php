<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clientPaymentPageStyle.css') }}">
    <title>Payment</title>
</head>

<body>
    @include('components.navbar')
    <main class="body-container">
        <div class="content-container">
            <section class="summary-container">
                <h2>Summary of Transaction</h2>
                <div class="summary-content">
                    <form action="" method="POST" class="summary-info">
                        <span>Net Charges:</span>
                        <span><input type="text" id="charges" readonly></span>
                    </form>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>
            <form action="{{ url('insertData') }}" method="POST" class="details-container">
                @csrf
                <h2>Personal Details</h2>
                <div class="input-box">
                    <input type="text" name="scheduleID" id="scheduleID" value="{{ $scheduledatas->id }}" hidden>
                    <input type="text" name="totalAmount" id="charges" hidden>
                    <input type="text" name="quantity" id="quantities" hidden>
                </div>
                <div class="input-box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') ?? '' }}">
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') ?? '' }}">
                </div>
                <div class="input-box">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" required value="{{ old('phone') ?? '' }}">
                </div>
                <h2>Card Details</h2>
                <div class="input-box">
                    <label for="cardname">Card Holder Name</label>
                    <input type="text" name="cardname" id="cardname" required value="{{ old('cardname') ?? '' }}">
                </div>
                <div class="input-box">
                    <label for="CardNum">Credit Card Number</label>
                    <input type="text" name="CardNum" id="CardNum" required value="{{ old('CardNum') ?? '' }}">
                </div>
                <div class="input-box">
                    <label for="cvc">CVC/CVV2</label>
                    <input type="text" name="cvc" id="cvc" required>
                </div>
                <div class="input-box">
                    <label for="expirydate">Expiry Date</label>
                    <input type="month" name="expirydate" id="expirydate" required>
                </div>
                <div class="action-button-container">
                    <a href="{{ url('Homepage') }}">
                        <button type="button" class="btn btn-cancel">Cancel</button>
                    </a>
                    <button type="submit" class="btn btn-checkout">Confirm</button>
                </div>
            </form>
        </div>
    </main>
    @include('components.footer')

    <script src={{ asset('jsfile/homepage.js') }}></script>

    <script>
        window.onload = function() {
            // Retrieve the total value from session storage
            var charges = sessionStorage.getItem('charges');

            // Set the retrieved total value in all elements with the ID "charges"
            var chargesElements = document.querySelectorAll('#charges');
            for (var i = 0; i < chargesElements.length; i++) {
                chargesElements[i].value = charges;
                console.log("session: " + charges);
            }

            // Retrieve the quantity value from session storage
            var quantityInput = sessionStorage.getItem('quantity');

            // Set the retrieved quantity value in the element with the ID "quantity"
            var quantityElement = document.getElementById('quantities');
            quantityElement.value = quantityInput;
            console.log("quantity: " + quantityInput);
        };
    </script>


</body>

</html>
