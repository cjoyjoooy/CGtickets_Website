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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- page css  -->
    <link rel="stylesheet" href="css/adminTableStyle.css">
    <link rel="stylesheet" href="css/adminComponents.css">
    <link rel="stylesheet" href="css/adminMoviesStyle.css">
    <link rel="stylesheet" href="css/adminShowScheduleStyle.css">
    <title>Show Schedule</title>
</head>

<body>
    <div class="grid-container">
        @include('components.adminNavbar')

        <section class="info-container">
            <div class="info-content">
                <h2>Show Schedule</h2>
                @include('components.adminsearch')
                <a href="{{url('addSchedule')}}"><button type="button" class="add-btn"><i class="fa-solid fa-plus side-bar-icon" style=" color: #ECECEC "></i></button></a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Cinema</th>
                            <th>Movie</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th> </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{$schedule->location->location_name}}</td>
                            <td>{{$schedule->cinema->cinema_number}}</td>
                            <td>{{$schedule->movie->MovieTitle}}</td>
                            <td>{{$schedule->time_start}}</td>
                            <td>{{$schedule->time_end}}</td>
                            <td>{{$schedule->date_schedule}}</td>
                            <td>{{$schedule->price}}</td>                                 
                            <td>
                                <div class="action-btn-container">
                                <a href="{{url('movieRestore', $movie->id)}}"><i class="fa-solid fa-trash-restore fa-xl" style="color:green;"></i>
                                <a href="{{url('deletemovie', $movie->id)}}"><button type='button' class='action-btn del-btn'><i
                                class='fa-solid fa-trash action-btn'></i></button></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
    </div>
    {{-- @include('components.adminModals') --}}
    </section>
    </div>
    <script src='jsfile/homepage.js'></script>
    
</body>

</html>
