<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/AddEditStyle.css') }}">
    <link rel="stylesheet" href="{{asset('css/adminAddScheduleStyle.css')}}">
    <title>Edit SCHEDULE</title>
</head>

<body>
    <div class="body-container">
        <form action="{{url('updateSchedule',$scheduledata->id)}}" method="post">
            @csrf
            <h2>Edit SCHEDULE</h2>
            <div class="input-group">
                <div class="input-box">
                    <label for="location">Location</label>
                    <select name="location" id="location" required>
                        <option value="">Select Locations</option>
                        @foreach ($locations as $location) 
                            <option value="{{$location->id}}">{{$location->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-box">
                    <label for="cinema">Cinema</label>
                    <select name="cinema" id="cinema" required>
                        <option value="">Select Cinema</option>
                    @foreach ($cinemas as $cinema  ) 
                        <option  value="{{$cinema->id}}" >{{$cinema->cinema_number}}</option>
                    @endforeach>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="movie">Movie</label>
                    <select name="movie" id="movie" required>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" >{{$movie->MovieTitle}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="input-box">
                    <label for="price">Price </label>
                    <input type="text" id="price" name="price" value="{{$scheduledata->price}}">
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="timeStart">Time Start </label>
                    <input type="time" id="timeStart" name="timeStart" value="{{$scheduledata->time_start}}">
                </div>
                <div class="input-box">
                    <label for="timeEnd">Time End </label>
                    <input type="time" id="timeEnd" name="timeEnd" value="{{$scheduledata->time_end }}">
                </div>
                <div class="input-box">
                    <label for="showdate">Date </label>
                    <input type="date" id="showdate" name="showdate" value="{{$scheduledata->date_schedule}}">
                </div>
            </div>
            <div class="input-box button-container">
                <a href="{{url()->previous()}}" class="btn"><button type="button" class="btn btn-cancel">Cancel</button></a>
                <input type="submit" name="submit" value="Edit" class="btn btn-add">
            </div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        // When the location filter value changes
        $('#location').change(function() {
            var locationId = $(this).val(); // Get the selected location ID
            filterCinemas(locationId); // Call the filterCinemas function with the location ID
        });
    
        // Function to filter cinemas based on the selected location
        function filterCinemas(locationId) {
            var cinemas = {!! json_encode($cinemas) !!}; // Get all cinemas data (passed from the controller)
            var filteredCinemas = []; // Array to store filtered cinemas
    
            if (locationId !== '') {
                // Filter cinemas based on the selected location
                filteredCinemas = cinemas.filter(function(cinema) {
                    return cinema.location_id == locationId;
                });
            } else {
                // If "All Locations" is selected, show "Select Cinema" option
                filteredCinemas = [];
            }
    
            // Generate the HTML for the filtered cinemas and update the cinema dropdown
            var html = '';
            if (filteredCinemas.length > 0) {
                $.each(filteredCinemas, function(index, cinema) {
                    html += '<option value="' + cinema.id + '">' + cinema.cinema_number + '</option>';
                });
            } else {
                html += '<option value="">Select Cinema</option>';
            }
            $('#cinema').html(html); // Update the cinema dropdown with the filtered cinemas
        }
    });
     </script>

</html>
