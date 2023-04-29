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
    <link rel="stylesheet" href="css/adminShowScheduleStyle.css">
    <title>Show Schedule</title>
</head>

<body>
    <div class="grid-container">
        @include('components.adminNavbar')

        <section class="info-container">
            <div class="info-content">
                <h2>Show Schedule</h2>
                @include('components.adminsearch')
                <button type="button" class="add-btn" data-toggle="modal" data-target="#addsched"><i class="fa-solid fa-plus side-bar-icon"></i></button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Cinema</th>
                            <th>Movie</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th> </th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-toggle="modal" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-toggle="modal" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-cell='Location'>SM</td>
                            <td data-cell='Cinema'>Cinema 1</td>
                            <td data-cell='Movie'>Avatar</td>
                            <td data-cell='Time Start'>3:00</td>
                            <td data-cell='Time End'>5:00</td>
                            <td data-cell='Date'>3/23/23</td>
                            <td data-cell='Price'>139</td>
                            <td>
                                <div class="action-btn-container">
                                    <button type="button" class="action-btn edit-btn" data-target='#editsched'><i
                                            class="fa-solid fa-pen action-btn"></i></button>
                                    <button type="button" class="action-btn del-btn"><i
                                            class="fa-solid fa-trash action-btn"></i></button>
                                </div>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
    </div>
    @include('components.adminModals')
    </section>
    </div>
    <script src='jsfile/homepage.js'></script>
    <!-- script para dili ma repeat ug execute ang query pag irefresh and page  -->
    {{-- <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- javascript for edit schedule  -->
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {

                $('#editsched').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                // get data from the table and display to edit modal 
                console.log(data);
                $('#location').val(data[0]);
                $('#cinema').val(data[1]);
                $('#movie').val(data[2]);
                $('#timeStart').val(data[3]);
                $('#timeEnd').val(data[4]);
                $('#showdate').val(data[5]);
                $('#prices').val(data[6]);
            });
        });
    </script> --}}
    
</body>

</html>
