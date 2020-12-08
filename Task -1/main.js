const dropdown_btn = document.querySelector("#dropdown-trigger");
const dropdown_content = document.querySelector("#dropdown-content");

dropdown_btn.addEventListener("click", () => {
  let displayProp = dropdown_content.style.display;
  dropdown_content.style.display = displayProp == "block"? "none": "block";
});