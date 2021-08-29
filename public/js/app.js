
document.querySelectorAll('li').forEach(
    (element, id)=>element.addEventListener('change', ()=>{
        let checkbox = document.querySelectorAll('input')[id]
        if(checkbox.checked)
            element.style.textDecoration = "line-through"
        else
            element.style.textDecoration = "none"
    })
    )