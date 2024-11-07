let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let item = document.querySelector('.item')

iconCart.addEventListener('click', open = () => {
    body.classList.toggle('showCart')
})
closeCart.addEventListener('click', close = () => {
    body.classList.toggle('showCart')
})

item.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')){
        let product_id = positionClick.parentNode.id;
        alert(product_id); 
    }
})