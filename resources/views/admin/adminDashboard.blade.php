<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/adminTableStyle.css">
  <link rel="stylesheet" href="css/adminComponents.css">
  <link rel="stylesheet" href="css/adminDashboardStyle.css">
  <title>Dashboard</title>
</head>

<body>
	 <!-- test pull -->
  <div class="grid-container">
    @include('components.adminNavbar')
    <div class="info-container">
      <div class="info-content">
        <h2>Dashboard</h2>
        <div class="info-grid-content">
          <div class="dashboard-grid-item">
            <div class="item-content">
              <h1><i class="fa-solid fa-video"></i><span>{{$schedules}}</span></h1>
              <div>Now Showing</div>
            </div>
          </div>
          <div class="dashboard-grid-item">
            <div class="item-content">
              <h1><i class="fa-solid fa-ticket"></i><span>{{$cinemas}}</span></h1>
              <div>Cinema</div>
            </div>
          </div>
          <div class="dashboard-grid-item">
            <div class="item-content">
              <h1><i class="fa-solid fa-clapperboard"></i><span>{{$movies}}</span></h1>
              <div>Movies</div>
            </div>
          </div>
          <div class="dashboard-grid-item">
            <div class="item-content">
              <h1><i class="fa-solid fa-sack-dollar"></i><span>{{$dailySales}}</span></h1>
              <div>Sales</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="table-container">
      <div class="table-content">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Movie Title</th>
                <th>Location</th>
                <th>Cinema</th>
                <th>Time</th>
                <th>Date</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($scheduledatas as $scheduledata)
              <tr>
                <td data-cell='Movie Title'>{{$scheduledata->movie->MovieTitle}}</td>
                <td data-cell='Location'>{{$scheduledata->location->location_name}}</td>
                <td data-cell='Cinema'>{{$scheduledata->cinema->cinema_number}}</td>
                <td data-cell='Time'>{{ \Carbon\Carbon::parse($scheduledata->time_start)->format('h:i A') }}</td>
                <td data-cell='Date'>{{$scheduledata->date_schedule}}</td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
       
      </div>
    </div>
    <!-- table container  -->
  </div>
  <script src='jsfile/homepage.js'></script>
</body>

</html>
