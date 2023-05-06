<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/clientHomePageStyle.css">
    <title>Home Page</title>
</head>

<body>
    @include('components.navbar')
    <div class="body-container">
        <header class="banner-container">
    @include('components.homepagecarousel')

            {{-- <div class="banner-content">
                <h1 class="banner-header">Experience each moment with a movie ticket in your hand</h1>
            </div> --}}
        </header>
        <main class="main-content" id="movies">
            <div class="content">
                <h1 class="content-header">NOW SHOWING</h1>
                <div class="grid-container movie-list">
                    <div class="notfound ">
                        <img src="/IT26-FINALPROJECT/resource/NotFound.png" alt="">
                    </div>
                    @foreach ($movies as $movie)
                    <div class='grid-item movie-item'>
                        <a href='{{url('ShowTimes', $movie->id)}}'><img src="{{ asset('/uploads/'.$movie->MoviePoster) }}" class="movie-img" alt="Movie Poster"></a>
                        <p class='movie-title'>{{$movie->MovieTitle}}</p>
                    </div>
                    @endforeach
                    {{-- <div class='grid-item movie-item'>
                        <a href=''><img class='movie-img' src='/resource/avengers.jpg'></a>
                        <p class='movie-title'>Avengers</p>
                    </div> --}}
                    
                </div>
            </div>

        </main>
        @include('components.footer')
    </div>
    {{-- <span class="loader"></span> --}}
    <script src='jsfile/homepage.js'></script>
    {{-- <script>
        window.addEventListener("load",()=> {
            document.querySelector(".loader")
        });
    </script> --}}
</body>

</html>
