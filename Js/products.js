const cart = document.getElementById('cart-logo');
const cart_card = document.getElementById('cart-card');
const account = document.getElementById('account')
const account_card = document.getElementById('account-content'); 
const home = document.getElementById('home');

const checkout = document.getElementById('checkout-btn');

var counter = 0;
var counter1 = 0;
cart.addEventListener('click',()=>{
 counter += 1;
 if(counter==1)
 {
     cart_card.style = "display:flex";
 }
 if(counter==2)
 {
     cart_card.style = "display:none;";
     counter = 0;
 }
}
)
account.addEventListener('click',()=>{
    counter1 += 1;
    if(counter1==1)
    {
        account_card.style = "display:block; border-radius:5px;" 
    }
    if(counter1==2)
    {
        account_card.style = "display:none;"
        counter1 = 0;
    }
})
home.addEventListener('click',()=>{
   location.href="home.php";
})
checkout.addEventListener('click',()=>{
    location.href="checkout.php";

})