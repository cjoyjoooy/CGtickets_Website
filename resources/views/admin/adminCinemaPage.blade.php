<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
                            <a href="{{ url('addLocation') }}"><button type="button" class="add-btn"><i
                                        class="fa-solid fa-plus side-bar-icon"
                                        style=" color: #ECECEC "></i></button></a>
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
                        <div class="inputbox cinema-action">
                            <select name="locationfilter" id="locationfilter">
                                <option value="">All Locations</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                            <a href="{{ url('addCinema') }}"><button type="button" class="add-btn"><i class="fa-solid fa-plus side-bar-icon" style="color: #ECECEC"></i></button></a>
                        </div>
                        <div class="table-responsive" >
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Cinema</th>
                                        <th>Number of Seat</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
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
    <script>
       $(document).ready(function() {
    // When the location filter value changes
    $('#locationfilter').change(function() {
        var locationId = $(this).val(); // Get the selected location ID
        filterCinemas(locationId); // Call the filterCinemas function with the location ID
    });

    // Function to filter cinemas based on the selected location
    function filterCinemas(locationId) {
        var cinemas = {!! $cinemas !!}; // Get all cinemas data (passed from the controller)
        var filteredCinemas = []; // Array to store filtered cinemas

        if (locationId !== '') {
            // Filter cinemas based on the selected location
            filteredCinemas = cinemas.filter(function(cinema) {
                return cinema.location_id == locationId;
            });
        } else {
            // If "All Locations" is selected, show all cinemas
            filteredCinemas = cinemas;
        }

        // Generate the HTML for the filtered cinemas and update the table body
        var html = '';
        $.each(filteredCinemas, function(index, cinema) {
            html += '<tr>';
            html += '<td>' + cinema.cinema_number + '</td>';
            html += '<td>' + cinema.seat_number + '</td>';
            html += '<td>';
            html += '<div class="action-btn-container">';
            html += '<a href="{{ url('editCinema') }}/' + cinema.id + '"><button type="button" class="action-btn edit-btn cinemaEdit"><i class="fa-solid fa-pen action-btn"></i></button></a>';
            html += '<a href="{{ url('deleteCinema') }}/' + cinema.id + '"><button type="button" class="action-btn del-btn"><i class="fa-solid fa-trash action-btn"></i></button></a>';
            html += '</div>';
            html += '</td>';
            html += '</tr>';
        });
        $('#tbody').html(html); // Update the table body with the filtered cinemas
    }
});

    </script>

</body>

</html>
