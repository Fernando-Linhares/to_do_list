
let li = document.querySelectorAll('li')

let checkbox = document.querySelectorAll('input')

let checkedElements = getCheckedElements();

if(localStorage.stateApp == undefined)
    localStorage.stateApp = JSON.stringify(checkedElements);


let last_state = JSON.parse(localStorage.stateApp)

last_state.forEach((e,i)=>{
    if(e){
        li[i].style.textDecoration = "line-through"
        checkbox[i].checked = true
    }
})

li.forEach(
        (element, id)=>element.addEventListener('change', ()=>{
            let checkbox = document.getElementsByTagName('input')[id]
            checkedElements = getCheckedElements()

            if(checkbox.checked){
                element.style.textDecoration = "line-through"
                checkedElements[id] = true
            }else{
                element.style.textDecoration = "none"
                checkedElements[id] = false
            }

            localStorage.stateApp = JSON.stringify(checkedElements);
        })
    )

    function getCheckedElements(){
        let checkbox =  document.querySelectorAll('input')
        let array = Array.from(checkbox)
        return  array.map(e=>{
            return e.checked
        })
    }
