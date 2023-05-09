<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- fontawesome and fonts  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- fontaawesome link sa bago na button -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- page css  -->
    <link rel="stylesheet" href="css/adminTableStyle.css">
    <link rel="stylesheet" href="css/adminComponents.css">
    <link rel="stylesheet" href="css/adminMoviesStyle.css">
    <title>Movies</title>
</head>

<body>
    <div class="grid-container">
        @include('components.adminNavbar')
        <section class="info-container">
            <div class="info-content">
                <h2>Movie Archives</h2>
                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @include('components.adminsearch')
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Movie ID</th>
                            <th>Movie Poster</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody class="movielist">
                      @foreach ($movies as $movie)
                        <tr class="movielist-item">
                                
                          <td data-cell='Movie ID'>{{$movie->id}}</td>
                          <td data-cell='Movie Poster'><img src="{{ asset('/uploads/'.$movie->MoviePoster) }}" class="poster" alt="Movie Poster"></td>
                          <td data-cell='Title'>{{$movie->MovieTitle}}</td>
                          <td data-cell='Genre'>{{$movie->Genre}}</td>
                          <td data-cell='Description'>{{$movie->MovieDescription}}</td>
                          <td>
                            <div class='action-btn-container'>
                              <a href="{{url('movieRestore', $movie->id)}}"><i class="fa-solid fa-trash-restore fa-xl" style="color:green;"></i>
                              <a href="{{url('deletemovie', $movie->id)}}"><button type='button' class='action-btn del-btn'><i
                                class='fa-solid fa-trash action-btn'></i></button></a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                </table>
                <a href="{{url('AdminMovie')}}"> Movie Page
            </div>
    </div>
    <!-- add and edit modal  -->
    {{-- @include('components.adminModals') --}}

    </section>
    </div>
    <script src='jsfile/homepage.js'></script>
</body>

</html>


