const menu = document.querySelector(".select-menu")
const search_bar = document.querySelector("#search-bar")
const search_icon = document.querySelector(".search-container .search-icon")
const clear_icon = document.querySelector(".search-container .clear-icon")
const select_trigger = document.querySelector(".custom-select-trigger")
const chip_container = document.querySelector(".subject-chips-container")
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
chip_container.addEventListener("click",(e)=>{
     // cat = e;
    if(e.target.closest("svg")){
          // cat=e;
          let chip = e.target.closest(".chip");
          let index = chip.getAttribute("data-list-index")
          data[index].isChecked = false
          let li = document.querySelector(`li[data-id='${data[index].id}']`)
          li.querySelector("input").checked = false;
          updateUIChips()
    } 
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
const updateUIChips = ()=>{
     chip_container.innerHTML=""
     let count=0;
     data.forEach((elem,index)=>{
          if(elem.isChecked){
               chip_container.innerHTML+=`
               <div class="chip" data-id="${elem.id}" data-list-index="${index}">
                    ${elem.name}
                    <svg
                              class="clear-icon icon"
                              width="19"
                              height="19"
                              viewBox="0 0 19 19"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                         >
                         <path
                              d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z"
                              fill="currentColor"
                         />
                    </svg>
               </div>
               `
               count++;
          }
     })
     if(count==0){
          chip_container.style.display = "none";
     }
     else{
          chip_container.style.display = "block";
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
     let element = data.filter((elem)=> elem.id==li.getAttribute("data-id"))[0];
     element.isChecked = !element.isChecked;
     updateUIChips();
})

search_bar.addEventListener("keyup",()=>{
     updateUIList(data.filter((elem)=>{
          return elem.name.toLowerCase().includes(search_bar.value.toLowerCase())
     }))
     updateIcon()
})


