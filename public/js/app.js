//Add active class to the current button (highlight it)

const navAcvite = document.getElementById("myActive");
const btns = navAcvite.getElementsByClassName("nav-item");
for (let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  let current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

const profileShow = document.querySelector(".nav-profile");
profileShow.addEventListener('click' , ()=> {

    let dropUser = document.querySelector(".dropdown-user")
    
    dropUser.classList.toggle('show-user')
})

// const activeCategory = window.location.pathname;
// const categoryActives = document.querySelectorAll('li a').forEach(active =>{
//   if(active.href.includes(`${activeCategory}`)){
//     active.classList.add('active');
//   }
// }) 
