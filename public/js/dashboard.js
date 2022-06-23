  // Prevent Form Resubmission
  if(window.history.replaceState) {
    window.history.replaceState(null , null ,window.location.href);
  }

const  toggle = document.getElementById("header-toggle")
const  nav = document.getElementById("nav-bar")
const  bodypd = document.getElementById("body-pd")
const  headerpd = document.getElementById("header")

    // Validate that all variables exist
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show-sec')
    // // change icon
    toggle.classList.toggle('bx-x')
    // // add padding to body
    bodypd.classList.toggle('body-pd')
    // // add padding to header
    headerpd.classList.toggle('body-pd')
    })

    //===== LINK ACTIVE =====//
    const linkColor = document.querySelectorAll('.nav_link')
    linkColor.forEach(link => {
        link.addEventListener("click",()=>{
            linkColor.forEach(l=> l.classList.remove('active'))
            link.classList.add("active")
        })
    });