//Sidebar:

let sidebar = document.getElementById("sidebar");
let dots = document.getElementById("sidebarcall");

// document.addEventListener("click", (event) => {
//   if (dots.contains(event.target)) {
//     sidebar.classList.add("showsidebar");
//   }
// });

document.addEventListener("click", (e) => {
  if (sidebar.contains(e.target) || dots.contains(e.target)) {
    console.log("Dentro");
    sidebar.classList.add("showsidebar");
  } else {
    console.log("Fuera");
    sidebar.classList.remove("showsidebar");
  }
});
