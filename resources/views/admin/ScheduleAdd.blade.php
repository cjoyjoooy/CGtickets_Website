<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/adminAddScheduleStyle.css">
    <link rel="stylesheet" href="css/AddEditStyle.css">
    <title>ADD SCHEDULE</title>
</head>

<body>
    <div class="body-container">
        <form action="" method="post">
            <h2>ADD SCHEDULE</h2>
            <div class="input-group">
                <div class="input-box">
                    <label for="location">Location</label>
                    <select name="location" id="location">
                        <option value="volvo">Abreeza</option>
                        <option value="saab">Gmall</option>
                        <option value="opel">SM Eco</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="cinema">Cinema</label>
                    <select name="cinema" id="cinema">
                        <option value="volvo">Cinema 1</option>
                        <option value="saab">Cinema 2</option>
                        <option value="opel">Cinema 3</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="movie">Movie</label>
                    <select name="movie" id="movie">
                        <option value="volvo">Movie 1</option>
                        <option value="saab">Movie 2</option>
                        <option value="opel">Movie 3</option>
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
                <input type="submit" name="submit" value="Add" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
