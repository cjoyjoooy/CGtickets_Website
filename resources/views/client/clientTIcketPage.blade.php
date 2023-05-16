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
            
            @foreach ($schedules as $schedule)
            <div class="flex-container">
                <div class="movie-img ticket-info-container">
                    <img src="{{ asset('/uploads/'.$schedule->movie->MoviePoster) }}"  class="poster" alt="Movie Poster">
                </div>
                <div class="ticket-info-container">                
                    <div class="title info-content-container">
                    <h3>{{$schedule->movie->MovieTitle}}</h3>
                </div>
                <div class="info-content-container">
                    <div class="info-group">
                        <p>Location</p>
                            
                        <p>{{$schedule->location->location_name}}</p>                
                    </div>
                    <div class="info-group">
                        <p>Cinema</p>
                        <p>{{$schedule->cinema->cinema_number}}</p>
                    </div>
                </div>
                <div class="info-content-container">
                    <div class="info-group">
                        <p>Date</p>
                        
                        <p>{{ \Carbon\Carbon::parse($schedule->date_schedule)->format('F d, Y') }}</p>
                    </div>
                    <div class="info-group">
                        <p>Time</p>
                        <p>{{ \Carbon\Carbon::parse($schedule->time_start)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->time_end)->format('h:i A') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
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
                        <p>{{$barcode}}</p>
                        <p>Transanction number</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>