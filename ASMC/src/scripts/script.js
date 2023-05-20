lists = document.querySelectorAll('li');
lists.forEach((elem, index)=>{
    elem.addEventListener("click", ()=>{
        current = index + 1;
        hide = document.querySelectorAll("[data-type='selection'] > section");
        hide.forEach((lessons)=>{
            lessons.style.display = "none";
        })
        selection = document.querySelector(`[data-type='selection'] > section:nth-child(${current})`).style.display = "block";
        
        lists.forEach((unselect)=>{
            unselect.classList.remove("active");
        })
        elem.classList.add("active");
    })
})