<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/AddEditStyle.css">
    <link rel="stylesheet" href="css/adminAddMovieStyle.css">
    <title>Add Movies</title>
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
        <form action="{{url('insertMovie')}}" method="POST" enctype="multipart/form-data">
            @csrf 
          <h2>ADD MOVIE</h2>
          <div class="input-group">
            <div class="input-box">
                <label for="title">Movie Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="input-box">
                <label for="genre">Genre</label>
                <input type="text" id="genre" name="genre" required>
            </div>
          </div>
          <div class="input-box">
            <label for="description">Description</label>
            <textarea class="desctextarea" id="description" name="description" rows="4" cols="50" required></textarea>
        </div>
        <div class="input-box">
            <label for="moviePoster">Movie Poster</label>
            <input type="file" id="moviePoster" name="image" required>
        </div>
        @if($errors->any())
                    <span class="message alert alert-danger fade-in-out ">
                        {{ $errors->first() }}
                    </span>
                @endif
        <div class="input-box button-container">
            <a href="{{url()->previous()}}" class="btn"><button type="button" class="btn btn-cancel">Cancel</button></a>
            <input type="submit" name="submit" value="Add" class="btn btn-add">
        </div>
        </form>
    </div>
</body>
</html>