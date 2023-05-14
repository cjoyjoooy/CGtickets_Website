<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/adminAddMovieStyle.css")}}">
    <link rel="stylesheet" href="{{asset("css/AddEditStyle.css")}}">
    <title>Edit Location</title>
</head>

<body>
    <div class="body-container">
        <form action="{{url('updateLocation',$locationdata->id)}}" method="POST">
            @csrf   
            <h2>EDIT LOCATION</h2>
            <div class="input-box">
                <label for="location">Location</label>
                <input type="text" id="location" name="location_name" value="{{$locationdata->location_name}}" required>
            </div>
            <div class="input-box button-container">
                <a href="{{url()->previous()}}" class="btn"><button type="button" class="btn btn-cancel">Cancel</button></a>
                <input type="submit" name="submit" value="Edit" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
