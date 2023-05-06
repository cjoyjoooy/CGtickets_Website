<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/AddEditStyle.css') }}">
    <link rel="stylesheet" href="{{asset("css/adminAddMovieStyle.css")}}"">
    <title>Edit SCHEDULE</title>
</head>

<body>
    <div class="body-container">
        <form action="{{url('updateSchedule', )}}" method="post">
            @csrf
            <h2>Edit SCHEDULE</h2>
            <div class="input-group">
                <div class="input-box">
                    <label for="location">Location</label>
                    <select name="location" id="location">
                    @foreach ($locations as $location ) 
                        <option  value="{{$location->id}}">{{$location->location_name}}</option>
                    @endforeach 
                    </select>
                </div>
                <div class="input-box">
                    <label for="cinema">Cinema</label>
                    <select name="cinema" id="cinema">
                    @foreach ($cinemas as $cinema  ) 
                        <option  value="{{$cinema->id}}" >{{$cinema->cinema_number}}</option>
                    @endforeach>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="movie">Movie</label>
                    <select name="movie" id="movie">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" >{{$movie->MovieTitle}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="input-box">
                    <label for="price">Price </label>
                    <input type="text" id="price" name="price">
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="timeStart">Time Start </label>
                    <input type="time" id="timeStart" name="timeStart">
                </div>
                <div class="input-box">
                    <label for="timeEnd">Time End </label>
                    <input type="time" id="timeEnd" name="timeEnd">
                </div>
                <div class="input-box">
                    <label for="showdate">Date </label>
                    <input type="date" id="showdate" name="showdate">
                </div>
            </div>
            <div class="input-box button-container">
                <a href="{{url()->previous()}}" class="btn"><button type="button" class="btn btn-cancel">Cancel</button></a>
                <input type="submit" name="submit" value="Edit" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
