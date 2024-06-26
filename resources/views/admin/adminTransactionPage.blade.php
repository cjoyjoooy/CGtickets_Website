<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- fontawesome and fonts  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- page css  -->
  <link rel="stylesheet" href="css/adminTableStyle.css">
  <link rel="stylesheet" href="css/adminComponents.css">
  <link rel="stylesheet" href="css/adminMoviesStyle.css">
    <link rel="stylesheet" href="css/adminShowScheduleStyle.css">
    <title>Transaction</title>
</head>

<body>
    <div class="grid-container">
        @include('components.adminNavbar')
        <section class="info-container">
            <div class="info-content">
                <h2>Transactions</h2>
                <div class="table-responsive" style="margin-top:80px">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Customer ID</th>                                
                                <th>Schedule ID</th>
                                <th>Quantity</th>
                                <th>Payment ID</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)                                
                            <tr>
                                <td data-cell='Transaction ID'>{{$transaction->id}}</td>
                                <td data-cell='Date'>{{$transaction->date}}</td>
                                <td data-cell='Customer ID'>{{$transaction->customer_id}}</td>
                                <td data-cell='Schedule ID'>{{$transaction->schedule_id}}</td>
                                <td data-cell='Quantity'>{{$transaction->quantity}}</td>
                                <td data-cell='Payment ID'>{{$transaction->payment_id}}</td>
                                <td data-cell='Total'>{{$transaction->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script src='jsfile/homepage.js'></script>

</body>

</html>