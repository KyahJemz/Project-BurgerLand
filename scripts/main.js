import { Helper } from "./helper.js";

console.log("Starting...");

Helper.ElementsArrayAddClickListener(document.querySelectorAll('.add-to-cart-btn'),addToCart);

function addToCart(event) {
    console.log(event.currentTarget.parentNode.dataset.itemid);
    const ItemId = event.currentTarget.parentNode.dataset.itemid;

    if (event.currentTarget.innerHTML === "Add To Cart") {
        event.currentTarget.innerHTML = "Remove From Cart";
        Helper.AddItemToCart(ItemId);
    } else {
        event.currentTarget.innerHTML = "Add To Cart";
        Helper.DeleteItemFromCart(ItemId);
    }
    console.log("Cart:", Helper.GetCartFromLocalStorage());
}

displayCart();
export function displayCart() {
    let x = 0;
    let y = '';
    if (document.querySelector(".cart-container")) {
        const ListContainer = document.querySelector(".cart-container");
        ListContainer.innerHTML = "";
        const Cart = Helper.GetCartFromLocalStorage();
        console.log(Cart);

        let totalAmount = 0;
        let selectedItems = [];

        if (Cart.length > 0) {
            Cart.forEach(itemId => {
                const matchingItem = items.find(item => item['ItemId'] === itemId);

                if (matchingItem) {
                    totalAmount += Number(matchingItem['ItemPrice']);
                    selectedItems.push(matchingItem['ItemName']);

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.dataset.itemid = matchingItem['ItemId'];
                    cartItem.innerHTML = `
                        <img class="image" src="../images/uploads/${matchingItem['ItemImage']}" alt="${matchingItem['ItemName']}">
                        <h3>${matchingItem['ItemName']}</h3>
                        <p class="price">${Helper.formatPrice(matchingItem['ItemPrice'], 2)}</p>
                        <p class="description">${matchingItem['ItemDescription']}</p>
                        <p class="category">${matchingItem['ItemCategory']}</p>
                        <button class="remove-to-cart-btn">Remove To Cart</button>
                    `;

                    ListContainer.appendChild(cartItem);
                }
            });
            document.querySelector('.total-price').innerHTML = totalAmount.toFixed(2);
            document.getElementById('amount').value = totalAmount.toFixed(2);
            document.getElementById('items').value = selectedItems.join(', ');

            Helper.ElementsArrayAddClickListener(document.querySelectorAll(".remove-to-cart-btn"), removeFromCarts);
        } else {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');

            cartItem.innerHTML = `
                    <div class="cart-item-details">
                        <span class="cart-item-name">No Items Selected</span>
                        <span class="cart-item-price">Select items from our menu page.</span>
                    </div>
                    <button class="go-to-menu"><a href="./menu.php">Go to menu</a></button>`;

            ListContainer.appendChild(cartItem);

            document.querySelector('.total-price').innerHTML = '0.00';
            document.getElementById('amount').value = '0';
            document.getElementById('items').value = '';
        }
    }
}



function removeFromCarts(event){
    console.log(event.currentTarget.parentNode.dataset.itemid);
    const ItemId = event.currentTarget.parentNode.dataset.itemid;

    Helper.DeleteItemFromCart(ItemId);
    displayCart();
}

Helper.ElementsAddClickListener(document.querySelector('.header-bar .container .toggle'), toggleMenuDisplay);

function toggleMenuDisplay() {
    const nav = document.querySelector('.nav-links');
    if (window.getComputedStyle(nav).display === 'none') {
        nav.style.display = 'block';
    } else {
        nav.style.display = 'none';
    }
}

Helper.ElementsAddClickListener(document.querySelector('.header-bar .container .tab'), removeMenu);

function removeMenu() {
    const nav = document.querySelector('.nav-links');
    nav.style.display = 'none';
}