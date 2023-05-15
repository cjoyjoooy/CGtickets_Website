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

// navigation active state 
const activePage=window.location.pathname;
const navLinks = document.querySelectorAll('.side-menu-items a').forEach(link => {
  if (link.href.includes(`${activePage}`)) {
    link.classList.add('active');
    const icon = link.querySelector('i');
    if (icon) {
      icon.classList.add('icon-active');
    }
  }
});

  //search icon button
const searcicon = document.querySelector(".search-icon");
const searchcontainer = document.querySelector(".search-menu");

searcicon.addEventListener("click", function () {
  searchcontainer.classList.toggle("search-box");
  });

  
  // let netCharges = document.getElementById('charges');

  // netCharges.textContent =  total;





  
