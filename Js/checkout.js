const add_card = document.getElementById('card-btn');
const card = document.getElementById('card');
const check = document.getElementById('check1');
const submit = document.getElementById('submit');


let counter = 0;
add_card.addEventListener('click',()=>{
    counter += 1;
    if(counter==1)
    card.style = "display:block";
    if(counter==2)
    {
        card.style = "display:none";
        counter=0;
    }
})

