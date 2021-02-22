const menu = document.querySelector(".select-menu")
const search_bar = document.querySelector("#search-bar")
const search_icon = document.querySelector(".search-icon")
const clear_icon = document.querySelector(".clear-icon")
const select_trigger = document.querySelector(".custom-select-trigger")
const html = document.querySelector("html")
let cat = {}
let data = {};
fetch("./subject_select/subject_data.json")
     .then(response=>response.json())
     .then(info=>{
          data = info.data.map(elem=>{
               return {
                    id: elem.id,
                    name: elem.name,
                    isChecked: false 
               }
          })
          updateUIList(data)
     })
clear_icon.addEventListener("click",(e)=>{
     search_bar.value="";
     updateIcon();
     updateUIList(data);
})

const updateIcon = ()=>{
     if(search_bar.value==""){
          clear_icon.style.display="none";
          search_icon.style.display="";
     }
     else{
          search_icon.style.display="none";
          clear_icon.style.display="";
     }
}

const updateUIList = (data)=>{
     menu.innerHTML = "";
     data.forEach((element,index) => {
          menu.innerHTML += `<li data-value="${element.name}" data-id="${element.id}" data-list-index="${index}"><input type="checkbox" ${element.isChecked?"checked":""}/><div>${element.name}</div></li>`
     });
}

const closeDrawer= (e,close=true)=>{
     console.log("hello");
     if(!e?.target.closest(".custom-options") && close){
          select_trigger.parentElement.classList.remove("opened")
     }
     else{
          html.addEventListener("click",closeDrawer,{once: true})
     }
}

select_trigger.addEventListener("click",(e)=>{
     closeDrawer(null,false)
     select_trigger.parentElement.classList.toggle("opened");
     e.stopPropagation();
})
menu.addEventListener("click",(e)=>{
     let li = e.target.closest("li")
    // cat = e;
     if(e.target.localName!="input"){
        
        let inp = li.querySelector("input")
        inp.checked = !inp.checked
     }
     data[li.getAttribute("data-list-index")].isChecked = !data[li.getAttribute("data-list-index")].isChecked
})

search_bar.addEventListener("keyup",()=>{
     updateUIList(data.filter((elem)=>{
          return elem.name.toLowerCase().includes(search_bar.value.toLowerCase())
     }))
     updateIcon()
})


