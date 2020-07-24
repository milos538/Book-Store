let search = document.querySelector('.sub_menu_search_field');         // search input field
let button = document.querySelector('#sub_menu_search_img');           // search button 
let container = document.querySelector('#cart_box_products');           // container for products in cart
let divTotalPrice = document.querySelector('.cart_totalPrice');         // box for total price of products in cart


// get everything from cart
function getBookmarks() {
    let total = 0.0;
    fetch('/cart/all', { credentials: 'include'})
    .then(result => result.json())
    .then(data =>{
        if(data.bookmarks.length == 0) { 
            container.innerHTML = 
            `<div class="no_products_in_cart" style="color: white">
                <p>No books in the cart!</p>
            </div>`
        }
        data.bookmarks.forEach(bookmark => {
            total += Number(bookmark[0].cena);
            console.log(bookmark[0]);
            let imageSrc = `/assets/img/productImages/${bookmark[0].slika}`;
            let bookId =bookmark[0].knjiga_id;
            let name = bookmark[0].naziv;
            let price = bookmark[0].cena;
            let authorName = bookmark[0].ime + " " + bookmark[0].prezime;
            container.innerHTML += 
            `
            <div class="cart_book_product">
                <img src='${imageSrc}' alt='Book cover' />
                <div class='cart_book_product_title'>'${name}' from ${authorName} </div><br/>
                <div class='cart_book_product_price'><span class='valuta'>${price} €</span></div>
            </div>
            `
        });
        divTotalPrice.innerHTML = total;
    })
    .catch(error =>{
        console.log(error);
    })
}

//add products to cart
function addBookmark(bookId) {
    let newBookId = bookId.replace('"','');
    fetch('/cart/add/' + newBookId, { credentials: 'include'})
    .then(result => result.json())
    .then(data =>{
        alert("You added book to the cart!");
    })
    .catch(error =>{
        console.log(error);
    });
}

// clear cart
function clearBookmarks() {
    fetch('/cart/clear', { credentials: 'include'})
    .then(result => result.json())
    .then(data =>{
        window.location.replace("/cart/");
    });
}

// call get everything from cart if on the cart page
if(window.location.href === "http://localhost/cart/"){
    getBookmarks();
};

// SEARCH BOOKS 
button.addEventListener( "click", event => {
    let searchedTerm = search.value;
    if(searchedTerm){
        window.location = '/search/' + searchedTerm;
    }
});
