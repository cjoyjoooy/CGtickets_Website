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
    <link rel="stylesheet" href="{{ asset('css/adminTableStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clientshowListPageStyle.css') }}">


    <title>Show List</title>
</head>

<body>
    @include('components.navbar')
    <div class="body-container">
        <section class="movie-details-container">
            <div class="movie-details-content">
                <div class="movie-img-container">
                    <img class="movie-img" src="{{ asset('/uploads/' . $movies->MoviePoster) }}" alt="movie img">
                </div>
                <div class="movie-details">
                    <h3>{{ $movies->MovieTitle }}</h3>
                    <p>{{ $movies->MovieDescription }}</p>
                    <span>GENRE:</span> <span>{{ $movies->Genre }}</span>
                </div>
            </div>
        </section>
        <section class="section-divider">
            <div class="divider"></div>
        </section>
        <section class="showtimes-container">
            <div class="showtimes-content">
                <h1>SHOW TIMES</h1>
                @foreach ($locationIds as $locationId)
                <div class="show-container">
                    @php
                        $location = $locationNames->firstWhere('id', $locationId);
                    @endphp
                    <div class="show-info">
                        @if ($location)
                            <h3>{{ $location->location_name }}</h3>
                        @endif
                    </div>
                    @foreach ($dates->where('location_id', $locationId) as $date)
                        <div class="show-info-container">
                            <h5>{{ $date->date_schedule }}</h5>
                            <div class="show-times">
                                @foreach ($schedules->where('date_schedule', $date->date_schedule)->where('location_id', $locationId) as $schedule)
                                    <a href="{{url('TicketDetails', $schedule->id)}}"><button
                                            class="time-btn">{{ $schedule->time_start }}</button></a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                  </div>
                  @endforeach 

    </section>
    </div>
    @include('components.footer')
    <script src={{ asset('jsfile/homepage.js')}}></script>


    <!-- script para ma click each row sa table  -->
    {{-- <script>
    document.addEventListener("DOMContentLoaded", () =>{
      const rows = document.querySelectorAll("tr[data-href]");

      rows.forEach(row =>{
        row.addEventListener("click", () => {
          window.location.href = row.dataset.href;
        });
      });
    });
  </script> --}}

    <!-- <script>
        $(document).ready(function() {
            $(document.body).on("click", "tr[data-href]", function() {
                window.location.href = this.dataset.href;
            });
        });
    </script> -->
</body>

</html>
