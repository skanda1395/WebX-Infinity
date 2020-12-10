const dropdown_btn = document.querySelector("#dropdown-trigger");
const dropdown_content = document.querySelector("#dropdown-content");

const coll_menu_icon = document.querySelector("#menu-icon");
const nav_links = document.querySelector("#nav-links");

dropdown_btn.addEventListener("click", () => {
  let displayProp = dropdown_content.style.display;
  dropdown_content.style.display = displayProp == "block"? "none": "block";
});


coll_menu_icon.addEventListener("click", () => {
  let displayProp = nav_links.style.display;
  nav_links.style.display = displayProp == "flex"? "none": "flex";
});