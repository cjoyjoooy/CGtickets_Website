 <!-- ------------Movie page ----------- -->
 
 <!-- Add Movie Modal -->
 <div class="modal fade" id="addmovie" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Add Movie</h3>
             </div>

             <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="input-box">
                         <label for="movieTitle">Movie Title</label>
                         <input type="text" id="movieTitle" name="movieTitle">
                     </div>
                     <div class="input-box">
                         <label for="genre">Genre</label>
                         <input type="text" id="genre" name="genre">
                     </div>
                     <div class="input-box">
                         <label for="description">Description</label>
                         <textarea class="desctextarea" id="description" name="description" rows="4" cols="50"></textarea>
                     </div>
                     <div class="input-box">
                         <label for="moviePoster">Movie Poster</label>
                         <input type="file" id="moviePoster" name="moviePoster">

                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                     <input type="submit" name="submit" value="Add" class="btn btn-add">

                 </div>
             </form>

         </div>

     </div>
 </div>
 <!-- Modal -->


 <!-- Edit Movie Modal -->
 <div class="modal fade" id="editmovie" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Edit Movie</h3>
             </div>
             <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <input type="hidden" name="updateID" id="updateID">

                     <div class="input-box">
                         <label for="Title">Movie Title</label>
                         <input type="text" id="Title" name="Title">
                     </div>
                     <div class="input-box">
                         <label for="movieGenre">Genre</label>
                         <input type="text" id="movieGenre" name="movieGenre">
                     </div>
                     <div class="input-box">
                         <label for="movieDescription">Description</label>
                         <textarea class="desctextarea" id="movieDescription" name="movieDescription" rows="4" cols="50"></textarea>
                         
                     </div>
                     <div class="input-box">
                         <label for="moviePoster">Movie Poster</label>
                         <input type="file" id="moviePoster" name="moviePoster">


                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                     <input type="submit" name="editsubmit" value="Edit" class="btn btn-add">
                 </div>
             </form>

         </div>

     </div>
 </div>
 <!-- Modal -->

<!-- ------------Show Schedule page ----------- -->

 <!--  add schedule Modal -->
 <div class="modal fade" id="addsched" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Add Schedule</h3>
             </div>
             <div class="modal-body">
                 <div class="input-box">
                     <label for="movieTitle">Location</label>
                     <select name="location" id="location">
                         <option value="volvo">Abreeza</option>
                         <option value="saab">Gmall</option>
                         <option value="opel">SM Eco</option>
                     </select>
                 </div>
                 <div class="input-box">
                     <label for="genre">Cinema</label>
                     <select name="cinema" id="cinema">
                         <option value="volvo">Cinema 1</option>
                         <option value="saab">Cinema 2</option>
                         <option value="opel">Cinema 3</option>
                     </select>
                 </div>
                 <div class="input-box">
                     <label for="movie">Movie</label>
                     <select name="movie" id="movie">
                         <option value="volvo">Movie 1</option>
                         <option value="saab">Movie 2</option>
                         <option value="opel">Movie 3</option>
                     </select>
                 </div>
                 <div class="time-container">
                     <div class="time-input-box">
                         <label for="timestart">Time Start </label>
                         <input type="time" id="timeStart" name="timeStart">
                     </div>
                     <div class="time-input-box">
                         <label for="timestart">Time End </label>
                         <input type="time" id="timeEnd" name="timeEnd">
                     </div>
                 </div>


                 <div class="input-box">
                     <label for="showdate">Date </label>
                     <input type="date" id="showdate" name="showdate">
                 </div>
                 <div class="input-box">
                     <label for="price">Price </label>
                     <input type="text" id="price" name="price">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                 <button type="submit" name="addsched" class="btn btn-add" data-dismiss="modal">Add</button>
             </div>
         </div>

     </div>
 </div>

 <!--  edit schedule Modal -->
 <div class="modal fade" id="editsched" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Edit Schedule</h3>
             </div>
             <div class="modal-body">
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
                 <div class="input-box">
                     <label for="movie">Movie</label>
                     <select name="movie" id="movie">
                         <option value="volvo">Movie 1</option>
                         <option value="saab">Movie 2</option>
                         <option value="opel">Movie 3</option>
                     </select>
                 </div>
                 <div class="time-container">
                     <div class="time-input-box">
                         <label for="timestart">Time Start </label>
                         <input type="time" id="timeStart" name="timeStart">
                     </div>
                     <div class="time-input-box">
                         <label for="timestart">Time End </label>
                         <input type="time" id="timeEnd" name="timeEnd">
                     </div>
                 </div>


                 <div class="input-box">
                     <label for="showdate">Date </label>
                     <input type="date" id="showdate" name="showdate">
                 </div>
                 <div class="input-box">
                     <label for="prices">Price </label>
                     <input type="text" id="prices" name="price">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                 <button type="submit" name="editsched" class="btn btn-add" data-dismiss="modal">Edit</button>
             </div>
         </div>

     </div>
 </div>
 <!-- Modal -->

 <!-- ------------Cinema page ----------- -->

 <!--  edit Location Modal -->
 <div class="modal fade" id="editLocation" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Edit Location</h3>
             </div>
             <div class="modal-body">

                 <div class="input-box">
                     <label for="locationedit">Location </label>
                     <input type="text" id="locationedit" name="locationedit" value = "{{$location->location_name}}">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                 <button type="submit" name="editLocation" class="btn btn-add" data-dismiss="modal">Edit</button>
             </div>
         </div>

     </div>
 </div>
 <!-- Modal -->

  <!--  edit Cinema Modal -->
  <div class="modal fade" id="editcinema" role="dialog">
     <div class="modal-dialog modal-dialog-centered">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title">Edit Cinema</h3>
             </div>
             <div class="modal-body">

                 <div class="input-box">
                     <label for="cnum">Cinema </label>
                     <input type="text" id="cnum" name="cnum">
                 </div>
                 <div class="input-box">
                     <label for="numSeats">Number of Seat </label>
                     <input type="text" id="numSeats" name="numSeats">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                 <button type="submit" name="editCinema" class="btn btn-add" data-dismiss="modal">Edit</button>
             </div>
         </div>

     </div>
 </div>
 <!-- Modal -->

 