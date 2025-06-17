// sidebar start
let sidebar = document.querySelector(".Adminsidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
// sidebar end

// image show start
document.getElementById('img-f').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const imgPreview = document.getElementById('img-pic');
        imgPreview.src = e.target.result;
        imgPreview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    }
  });
// image show end

// Initialization for ES Users
import { Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Ripple });
