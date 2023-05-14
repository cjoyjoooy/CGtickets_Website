<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/AddEditStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminAddMovieStyle.css') }}"">
    <title>Edit Movies</title>
</head>

<body>
    <div class="body-container">
        <form action="{{ url('updateMovie', $moviedata->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>EDIT MOVIE</h2>
            <div class="input-group">
                <div class="input-box">
                    <label for="title">Movie Title</label>
                    <input type="text" id="title" name="title" value="{{ $moviedata->MovieTitle }}" required>
                </div>
                <div class="input-box">
                    <label for="genre">Genre</label>
                    <input type="text" id="genre" name="genre" value="{{ $moviedata->Genre }}" required>
                </div>
            </div>
            <div class="input-box">
                <label for="description">Description</label>
                <textarea class="desctextarea" id="description" name="description" rows="4" cols="50" required>{{ $moviedata->MovieDescription }}</textarea>
            </div>
            <div class="input-box">
                <label for="moviePoster">Movie Poster</label>
                <input type="file" id="moviePoster" name="moviePoster">
            </div>
            <div class="input-box button-container">
                <a href="{{ url()->previous() }}" class="btn"><button type="button"
                        class="btn btn-cancel">Cancel</button></a>
                <input type="submit" name="submit" value="Edit" class="btn btn-add">
            </div>
        </form>
    </div>
</body>

</html>
