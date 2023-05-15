<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clientTicketDetailsStyle.css') }}">
    <title>Ticket Details</title>
</head>

<body>
    @include('components.navbar')
    <main class="body-container">
        <div class="content-container">
            <section class="movielist-details-container">
                <div class="movie-img-container">
                    <img class="movie-img" src="{{ asset('/uploads/' . $scheduledatas->movie->MoviePoster) }}"
                        alt="movie img">
                </div>
                <div class="movielist-details">
                    <h2>Ticket Details</h2>
                    <div class="movielist-info">
                        <span>Movie:</span><span>{{ $scheduledatas->movie->MovieTitle }}</span>
                    </div>
                    <div class="movielist-info">
                        <span>Date:</span> <span>{{ $scheduledatas->date_schedule }}</span>
                    </div>
                    <div class="movielist-info">
                        <span>Time:</span> <span>{{ $scheduledatas->time_start }} -
                            {{ $scheduledatas->time_end }}</span>
                    </div>
                    <div class="movielist-info">
                        <span>Cinema:</span> <span>{{ $scheduledatas->cinema->cinema_number }}</span>
                    </div>
                    <div class="movielist-info">
                        <span>Location:</span> <span>{{ $scheduledatas->location->location_name }}</span>
                    </div>
                    <div class="movielist-info">
                        <span>Seat Available:</span> <span>{{ $scheduledatas->cinema->seat_number }}</span>
                    </div>
                </div>
            </section>
            <section class="ticket-details-container">
                <div class="ticket-details">
                    <div class="ticket-info">
                        <h3>Ticket</h3>
                        <p>{{ $scheduledatas->movie->MovieTitle }}</p>
                    </div>
                    <div class="ticket-info">
                        <h3>Price</h3>
                        <p id="price">{{ $scheduledatas->price }}</p>
                    </div>
                    <div class="ticket-info">
                        <h3>Quantity</h3>
                        <form id="quantity-form" method="post">
                            <div class="ctrl">
                                <div class="ctrl__button ctrl__button--decrement">&ndash;</div>
                                <div class="ctrl__counter">
                                    <input class="ctrl__counter-input" name="quantity" id="quantity-input"
                                        maxlength="10" type="number" value="1">
                                    <div class="ctrl__counter-num">1</div>
                                </div>
                                <div class="ctrl__button ctrl__button--increment">+</div>
                            </div>
                        </form>
                    </div>
                    <div class="ticket-info">
                        <h3>Subtotal</h3>
                        <p id="subtotal">{{ $scheduledatas->price }}</p>
                    </div>
                </div>
                <div class="ticket-details">
                    <div class="ticket-info">
                        <span>Booking Fee:</span>
                        <span>20</span>
                    </div>
                    <div class="ticket-info">
                        <span>Total:</span>
                        <span ><input type="text" id="total" name="total" readonly></span>
                    </div>
                </div>
            </section>
            <div class="action-button-container">
                <a href='{{ url('Homepage') }}'><button type="button" class="btn btn-cancel">Cancel</button></a>
                <a href="{{url('Payment', $scheduledatas->id)}}"><button type="button" class="btn btn-checkout" onclick="setCharges()">Checkout</button></a>
            </div>

        </div>

    </main>
    @include('components.footer')
    <script src={{ asset('jsfile/homepage.js') }}></script>

    <script>
        function setCharges() {
            var total = document.getElementById('total').value;
            sessionStorage.setItem('charges', total);
        }
    </script>
    <!-- calculate subtotal -->
    <script>
        // Get the quantity input element
        var quantityInput = document.getElementById('quantity-input');

        // Get the increment and decrement buttons
        var decrementButton = document.querySelector('.ctrl__button--decrement');
        var incrementButton = document.querySelector('.ctrl__button--increment');

        // Get the subtotal element
        var subtotalElement = document.getElementById('subtotal');

        // Get the initial price value
        var price = {{ $scheduledatas->price }};

        // Calculate the initial subtotal
        var subtotal = price;
        var lastChanged = Date.now();

        // Define a debounce function to limit how frequently the calculation is performed
        function debounce(func, delay) {
            var timer;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    func.apply(context, args);
                }, delay);
            };
        }

        // Define a function to update the subtotal whenever the quantity value changes
        function updateSubtotal() {
            var quantity = quantityInput.value;
            subtotal = price * quantity;
            subtotalElement.textContent = subtotal;
            console.log("price: " + price)
            console.log("quantity: " + quantity)
            console.log("subtotal: " + subtotal)
            console.log(subtotalElement.textContent)
        }

        // Update the subtotal whenever the quantity value changes, using the debounce function to limit the frequency
        quantityInput.addEventListener('change', debounce(function() {
            var now = Date.now();
            if (now - lastChanged > 300) {
                lastChanged = now;
                updateSubtotal();
            }
        }, 500));
        // Update the subtotal whenever the quantity value changes
        quantityInput.addEventListener('input', function() {
            var quantity = quantityInput.value;
            subtotal = price * quantity;
            subtotalElement.textContent = subtotal;
        });


        // Update the quantity whenever the increment or decrement buttons are clicked
        decrementButton.addEventListener('click', function() {
            var quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
                quantityInput.dispatchEvent(new Event('change'));
                console.log("price: " + price);
                console.log("subtotal: " + subtotal);
                console.log(subtotalElement.textContent);
                console.log(quantity);
            }
        });

        incrementButton.addEventListener('click', function() {
            var quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
            quantityInput.dispatchEvent(new Event('change'));
            console.log("price: " + price);
            console.log("subtotal: " + subtotal);
            console.log(subtotalElement.textContent);
            console.log(quantity);

        });
    </script>
    <!-- calculate total -->

    <script>
        var totalElement = document.getElementById('total');
  var price = document.getElementById('price').innerText;
  
  // Define the quantityInput variable
  var quantityInput = document.getElementById('quantity-input');
  
  // Calculate the initial total
  var total = parseInt(price) + 20;
  
  // Define the debounce function
  function debounce(func, wait) {
    var timeout;
    return function executedFunction() {
        var context = this;
        var args = arguments;
        var later = function() {
            timeout = null;
            func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
  }
  
  // Wrap the event listener inside the debounce function
  quantityInput.addEventListener('change', debounce(function() {
      var quantity = quantityInput.value;
      var subtotal = price * quantity;
      var total = subtotal + 20;
      totalElement.value = total;
  }, 500));
  
  // Display the initial total
  totalElement.value = total;

    </script>
    <script>
        // Get the total element
        (function() {
            'use strict';

            function ctrls() {
                var _this = this;

                this.counter = 1;
                this.els = {
                    decrement: document.querySelector('.ctrl__button--decrement'),
                    counter: {
                        container: document.querySelector('.ctrl__counter'),
                        num: document.querySelector('.ctrl__counter-num'),
                        input: document.querySelector('.ctrl__counter-input')
                    },
                    increment: document.querySelector('.ctrl__button--increment')
                };

                this.decrement = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (_this.counter > 1) ? --counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.increment = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (counter < 9999999999) ? ++counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.getCounter = function() {
                    return _this.counter;
                };

                this.setCounter = function(nextCounter) {
                    _this.counter = nextCounter;
                };

                this.debounce = function(callback) {
                    setTimeout(callback, 100);
                };

                this.render = function(hideClassName, visibleClassName) {
                    _this.els.counter.num.classList.add(hideClassName);

                    setTimeout(function() {
                        _this.els.counter.num.innerText = _this.getCounter();
                        _this.els.counter.input.value = _this.getCounter();
                        _this.els.counter.num.classList.add(visibleClassName);

                    }, 100);

                    setTimeout(function() {
                        _this.els.counter.num.classList.remove(hideClassName);
                        _this.els.counter.num.classList.remove(visibleClassName);
                    }, 1100);
                };

                this.ready = function() {
                    _this.els.decrement.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.decrement();
                            _this.render('is-decrement-hide', 'is-decrement-visible');
                        });
                    });

                    _this.els.increment.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.increment();
                            _this.render('is-increment-hide', 'is-increment-visible');
                        });
                    });

                    _this.els.counter.input.addEventListener('input', function(e) {
                        var parseValue = parseInt(e.target.value);
                        if (!isNaN(parseValue) && parseValue >= 0) {
                            _this.setCounter(parseValue);
                            _this.render();
                        }
                    });

                    _this.els.counter.input.addEventListener('focus', function(e) {
                        _this.els.counter.container.classList.add('is-input');
                    });

                    _this.els.counter.input.addEventListener('blur', function(e) {
                        _this.els.counter.container.classList.remove('is-input');
                        _this.render();
                    });
                };
            };

            // init
            var controls = new ctrls();
            document.addEventListener('DOMContentLoaded', controls.ready);
        })();
    </script>
</body>

</html>
