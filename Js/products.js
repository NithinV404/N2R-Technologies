var cart = document.getElementById('cart-logo');
var card = document.getElementById('cart-card');
var counter = 0;
cart.addEventListener('click',()=>{
 counter += 1;
 if(counter==1)
 {
     card.style = "display:flex";
 }
 if(counter==2)
 {
     card.style = "display:none;"
     counter = 0;
 }
}
)