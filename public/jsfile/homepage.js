// side menu 

const burger = document.querySelector(".menu-burger");
const menuSidebar = document.querySelector(".menu-sidebar");
const closeMenu = document.querySelector(".close-menu");

let buttonsDOM = [];

burger.addEventListener("click", function () {
    menuSidebar.style.transform = "translate(0%)";
  });
  
  closeMenu.addEventListener("click", function () {
    menuSidebar.style.transform = "translate(-100%)";
  });


  //search icon button
const searcicon = document.querySelector(".search-icon");
const searchcontainer = document.querySelector(".search-menu");

searcicon.addEventListener("click", function () {
  searchcontainer.classList.toggle("search-box");
  });
  


// home page filter search
const filter = document.querySelector(".search-input");
const movies = document.querySelector(".movie-list"); // parent container
const notfound = document.querySelector(".notfound")
filter.addEventListener("keyup", filterItems);

function filterItems(e) {
  // convert text to lowercase
  let text = e.target.value.toLowerCase();

  let items = movies.getElementsByClassName("movie-item"); //child element

  Array.from(items).forEach(function (item) {
   
    let itemname = item.lastElementChild.textContent;
    console.log(itemname);

    //compare itemname to the search box
    if (itemname.toLowerCase().indexOf(text) != -1) {
      item.style.display = "block";
    } else
     item.style.display = "none";
    
  });

}


  
