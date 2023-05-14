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
            @if (Session::has('success'))
                <div class="alert alert-success fade-in-out">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger fade-in-out">{{ Session::get('fail') }}</div>
            @endif
            <div class="info-content">
                <h2>Movies</h2>
                @include('components.adminsearch')
                <a href="{{ url('movieArchive') }}"> <button type="button" class="add-btn"><i
                            class="fa-solid fa-box-archive side-bar-icon" style="color: #ECECEC"></i></button></a>
                <a href="{{ url('addMovie') }}"><button type="button" class="add-btn"><i
                            class="fa-solid fa-plus side-bar-icon" style=" color: #ECECEC "></i></button></a>
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

                                <td data-cell='Movie ID'>{{ $movie->id }}</td>
                                <td data-cell='Movie Poster'><img src="{{ asset('/uploads/' . $movie->MoviePoster) }}"
                                        class="poster" alt="Movie Poster"></td>
                                <td data-cell='Title'>{{ $movie->MovieTitle }}</td>
                                <td data-cell='Genre'>{{ $movie->Genre }}</td>
                                <td data-cell='Description'>{{ $movie->MovieDescription }}</td>
                                <td>
                                    <div class='action-btn-container'>
                                        <a href="{{ url('editMovie', $movie->id) }}"><button type='button'
                                                class='action-btn edit-btn'><i
                                                    class='fa-solid fa-pen action-btn'></i></button></a>
                                        <a href="{{ url('deletemovie', $movie->id) }}"><button type='button'
                                                class='action-btn del-btn'><i
                                                    class='fa-solid fa-trash action-btn'></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <!-- add and edit modal  -->
    {{-- @include('components.adminModals') --}}

    </section>
    </div>
    <script src='jsfile/homepage.js'></script>
</body>

</html>
