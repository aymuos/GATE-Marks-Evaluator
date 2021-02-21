const menu = document.querySelector(".select-menu");
const search_bar = document.querySelector("#search-bar");
const search_icon = document.querySelector(".search-icon");
const cancel_icon = document.querySelector(".cancel-icon");
let cat = {}
menu.addEventListener("click",(e)=>{
    // cat = e;
   if(e.target.localName!="input"){
        let inp = e.target.closest("li").querySelector("input")
        inp.checked = !inp.checked
   }
})

search_bar.addEventListener("keyup",()=>{
     if(search_bar.value==""){
          cancel_icon.style.display="none";
          search_icon.style.display="";
     }
     else{
          search_icon.style.display="none";
          cancel_icon.style.display="";
     }
})


