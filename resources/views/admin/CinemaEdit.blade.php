<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/AddEditStyle.css') }}">
    <link rel="stylesheet" href="{{asset("css/adminAddMovieStyle.css")}}">
    <title>Edit Cinema</title>
</head>

<body>
    <div class="body-container">
        @if (session('success'))
        <div class="alert alert-success fade-in-out ">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger fade-in-out ">
            {{ session('error') }}
        </div>
    @endif
    @if (session('fail'))
        <div class="alert alert-danger fade-in-out">
            {{ session('fail') }}
        </div>
    @endif
        <form action="{{url('updateCinema',$cinemadata->id)}}" method="post">
            @csrf   
            <h2>EDIT Cinema</h2>
            <div class="input-box">
                <label for="location">Location</label>
                    <select name="location" id="location">
                    @foreach ($locations as $location ) 
                        <option  value="{{$location->id}}">{{$location->location_name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="input-box">
                <label for="Cinema">Cinema</label>
                <input type="text" name="cinema_num" id="Cinema"  value="{{ $cinemadata->cinema_number }}">
            </div>
            <div class="input-box">
                <label for="Seats">Number of Seats</label>
                <input type="text" id="Seats" name="seat_num" value="{{ $cinemadata->seat_number }}">
                @if ($errors->any())
                <span class="message alert alert-danger fade-in-out ">
                    {{ $errors->first() }}
                </span>
            @endif
            </div>
            <div class="input-box button-container">
                <a href='{{ url('AdminCinema')}}' class="btn"><button type="button" class="btn btn-cancel"
                        data-dismiss="modal">Cancel</button></a>
                <input type="submit" name="submit" value="Edit" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
