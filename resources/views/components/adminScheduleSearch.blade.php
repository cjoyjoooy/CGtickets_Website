<form action="{{url('schedulesearch')}}" method="POST">
@csrf
  <div class="action-container">
            <div class="search-container">
              <input type="text" class="searchbox-input" placeholder="Search..." id="searchsched" name="searchsched">
              <button type="submit" class="searchbtn" value="search"><i class="fa-solid fa-magnifying-glass"  style=" color: #ECECEC "></i></button>
            </div>
</form>