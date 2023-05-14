<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/AddEditStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminAddMovieStyle.css') }}">
    <title>Add Cinema</title>
</head>

<body>
    <div class="body-container">
        <form action="{{ url('insertCinema') }}" method="POST">
            @csrf
            <h2>Add Cinema</h2>
            <div class="input-box">
                <label for="location">Location</label>
                    <select name="location" id="location" required>
                    @foreach ($locations as $location ) 
                        <option  value="{{$location->id}}">{{$location->location_name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="input-box">
                <label for="Cinema">Cinema</label>
                <input type="text" name="cinema_num" id="Cinema" required>
            </div>
            <div class="input-box">
                <label for="Seat">Number of Seat</label>
                <input type="text" name="seat_num" id="Seat" required>
            </div>
            <div class="input-box button-container">
                <a href='{{ url()->previous() }}' class="btn"><button type="button" class="btn btn-cancel"
                        data-dismiss="modal">Cancel</button></a>
                <input type="submit" name="submit" value="Add" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
