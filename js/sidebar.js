//Sidebar:

let sidebar = document.getElementById("sidebar");
let dots = document.getElementById("sidebarcall");

dots.addEventListener("click", (event) => {
  sidebar.classList.add("showsidebar");
});

console.log(dots);
