<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/adminAddScheduleStyle.css">
    <link rel="stylesheet" href="css/AddEditStyle.css">
    <title>Add Schedule</title>
</head>

<body>
    <div class="body-container">
        @if (session('success'))
            <div class="alert alert-success fade-in-out ">
                {{ session('success') }}
            </div>
        @endif
        
    
        @if (session('fail'))
            <div class="alert alert-danger fade-in-out">
                {{ session('fail') }}
            </div>
        @endif


        <form action="{{ url('insertSchedule') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('error'))
        <div class="alert alert-danger fade-in-out " style="text-align: center;">
            {{ session('error') }}
        </div>
    @endif 
            <h2>ADD SCHEDULE</h2>
            <div class="input-group">
                <div class="input-box">
                    <label for="location">Location</label>
                    <select name="location" id="location" required>
                        <option value="">Select Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-box">
                    <label for="cinema">Cinema</label>
                    <select name="cinema" id="cinema" required>
                        <option value="">Select Cinema</option>
                        @foreach ($cinemas as $cinema)
                            <option value="{{ $cinema->id }}">{{ $cinema->cinema_number }}</option>
                        @endforeach>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="movie">Movie</label>
                    <select name="movie" id="movie" required>
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->MovieTitle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-box">
                    <label for="price">Price </label>
                    <input type="text" id="price" name="price" required>
                    @if ($errors->any())
                        <span class="message alert alert-danger fade-in-out ">
                            {{ $errors->first() }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="timeStart">Time Start </label>
                    <input type="time" id="timeStart" name="timeStart" required>
                </div>
                <div class="input-box">
                    <label for="timeEnd">Time End </label>
                    <input type="time" id="timeEnd" name="timeEnd" required>
                </div>
                <div class="input-box">
                    <label for="showdate">Date </label>
                    <input type="date" id="showdate" name="showdate" required>
                </div>
            </div>
            <div class="input-box button-container">
                <a href="{{ url('AdminShowSchedule') }}" class="btn"><button type="button"
                        class="btn btn-cancel">Cancel</button></a>
                <input type="submit" name="submit" value="Add" class="btn btn-add">
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
