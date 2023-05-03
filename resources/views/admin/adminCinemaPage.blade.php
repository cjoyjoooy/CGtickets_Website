<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/adminComponents.css">
    <link rel="stylesheet" href="css/adminMoviesStyle.css">
    <link rel="stylesheet" href="css/adminCinemaStyle.css">
    <title>Cinema</title>
</head>

<body>
    <div class="grid-container">
        @include('components.adminNavbar')
        <section class="info-container">
            <div class="info-content">
                <h2>Cinemas</h2>
                
                <div class="cinema-table-container">
                    <div class="table-content-container">
                        <h3>Location</h3>
                        <div class="inputbox">
                            <a href="{{url('addLocation')}}"><button type="button" class="add-btn"><i class="fa-solid fa-plus side-bar-icon" style=" color: #ECECEC "></i></button></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                {{-- loop through each row in location table into the database --}}
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr>
                                            {{-- display the data from the location database --}}
                                            <td>{{ $location->location_name }}</td>
                                            <td>
                                                <div class="action-btn-container">
                                                    <a href="{{ url('editLocation', $location->id) }}"><button
                                                            type="button" class="action-btn edit-btn locEdit"><i
                                                                class="fa-solid fa-pen action-btn"></i></button></a>
                                                    <a href="{{ url('delete', $location->id) }}"><button type="button"
                                                            class="action-btn del-btn"><i
                                                                class="fa-solid fa-trash action-btn"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                    <div class="table-content-container">
                        <h3>Cinema</h3>
                        <div class="inputbox">
                            <a href="{{url('addCinema')}}"><button type="button" class="add-btn"><i class="fa-solid fa-plus side-bar-icon" style=" color: #ECECEC "></i></button></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Cinema</th>
                                        <th>Number of Seat</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cinemas as $cinema)
                                        <tr>
                                            <td>{{ $cinema->cinema_number }}</td>
                                            <td>{{ $cinema->seat_number }}</td>
                                            <td>
                                                <div class="action-btn-container">
                                                    <a href="{{ url('editCinema', $cinema->id) }}"><button
                                                            type="button" class="action-btn edit-btn cinemaEdit"><i
                                                                class="fa-solid fa-pen action-btn"></i></button></a>
                                                    <a href="{{ url('deleteCinema', $cinema->id) }}"><button
                                                            type="button" class="action-btn del-btn"><i
                                                                class="fa-solid fa-trash action-btn"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src='jsfile/homepage.js'></script>

    {{-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script> --}}
    <!-- javascript for location schedule  -->
    {{-- <script>
    $(document).ready(function(){
      $('.locEdit').on('click',function(){
        
        $('#editLocation').modal('show');
          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          // get data from the table and display to edit modal 
          console.log(data);    
          $('#locationedit').val(data[0]);
      });
    });
  </script>
  <!-- javascript for location schedule  --> 
<script>
    $(document).ready(function(){
      $('.cinemaEdit').on('click',function(){
        
        $('#editcinema').modal('show');
          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          // get data from the table and display to edit modal 
          console.log(data);    
          $('#cnum').val(data[0]);
          $('#numSeats').val(data[1]);
      });
    });
  </script> --}}

</body>

</html>
