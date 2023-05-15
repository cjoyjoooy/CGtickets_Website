<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/clientTicket.css')}}">
    <title>Ticket</title>
</head>
<body>
    <div class="ticket">
        <div class="ticket-content">
            <div class="header">CINEMA TICKET</div>
            
            <div class="flex-container">
                <div class="movie-img ticket-info-container">
                    <img src="{{ asset('/uploads/1682782980.jpg') }}"  class="poster" alt="Movie Poster">
                </div>
                <div class="ticket-info-container">                
                    <div class="title info-content-container">
                    <h3>John Wick</h3>
                </div>
                <div class="info-content-container">
                    <div class="info-group">
                        <p>Location</p>
                        <p>{{$schedule_id}}</p>                
                    </div>
                    <div class="info-group">
                        <p>Cinema</p>
                        <p>Cinema 5</p>
                    </div>
                </div>
                <div class="info-content-container">
                    <div class="info-group">
                        <p>Date</p>
                        <p>March 14, 2022</p>
                    </div>
                    <div class="info-group">
                        <p>Time</p>
                        <p>3:00pm - 5:00pm</p>
                    </div>
                </div>
            </div>
           
                <div class="divider"></div>
                <div class="ticket-info-container transaction details">
                    <div class="info-group">
                        <p>Name</p>
                        <p>{{$name}}</p>
                    </div>
                    <div class="info-group">
                        <p>Price</p>
                        <p>{{$totalAmount}}</p>
                    </div>
                    <div class="info-group">
                        <p>Ticket Quantity</p>
                        <p>{{$quantity}}</p>
                    </div>
                    <div class="info-group transaction-num">
                        <p>barcode</p>
                        <p>{{$transactionId}}</p>
                        <p>Transanction number</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>