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
    @include('components.homepagenavbar')
    <div class="body-container">
        <header class="banner-container">
            @include('components.homepagecarousel')
        </header>
        <main class="main-content" id="movies">
            <div class="content">
                <h1 class="content-header">NOW SHOWING</h1>
                <div class="grid-container movie-list">
                    {{-- <div class="notfound ">
                        <img src="/IT26-FINALPROJECT/resource/NotFound.png" alt="">
                    </div> --}}
                    @foreach ($movies as $movie)
                        <div class='grid-item movie-item'>
                            <a href='{{ url('ShowTimes', $movie->id) }}'>
                                <img src="{{ asset('/uploads/' . $movie->MoviePoster) }}" class="movie-img"
                                    alt="Movie Poster">
                            </a>
                            <p class='movie-title'>{{ $movie->MovieTitle }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>
        @include('components.footer')
    </div>
    <script src={{ asset('jsfile/homepage.js') }}></script>

{{-- navigation bar active state--}}
<script>
    // Get the current URL path
    const path = window.location.href;

    // Find the corresponding navigation link and add the 'active' class
    const homeLink = document.getElementById('home-link');
    const moviesLink = document.getElementById('movies-link');
    
    if (path.endsWith('/Homepage') || path.endsWith('/Homepage#')) {
        homeLink.classList.add('active');
    } else if (path.endsWith('/Homepage#movies')) {
        moviesLink.classList.add('active');
    }

    // Add event listeners to links
    const links = document.querySelectorAll('.menu-items a');
    links.forEach(link => {
        link.addEventListener('click', (event) => {
            // Remove the 'active' class from all links
            links.forEach(link => {
                link.classList.remove('active');
            });
            // Add the 'active' class to the clicked link
            event.target.classList.add('active');
        });
    });

    // Get all the menu links
    const menuLinks = document.querySelectorAll('.side-menu-items a');

    // Loop through the menu links and add a click event listener to each
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Remove the active class from all menu links
            menuLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add the active class to the clicked link
            link.classList.add('active');
        });
    });
</script>

  
  
  
  
  
  
  
  
  

</body>

</html>
