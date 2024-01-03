export class Helper {
    
    static ElementsArrayAddClickListener (elements,callback){
        if(elements == null) {
            return null;
        }
        if (elements.length === 0) {
            return null;
        }
        elements.forEach(element => {
            element.addEventListener('click', callback);
        });
    }
    
    static ElementsAddClickListener (element,callback){
        if(element == null) {
            return null;
        }
        element.addEventListener('click', callback);
    }

    static SelectAllClassWith(element,classname) {
        if(element == null) {
            return null;
        }
        const elements = element.querySelectorAll(classname);
        if (elements.length > 0) {
            return elements;
        }
        return null;
    }

    static SelectClassWith(element,classname) {
        if(element == null) {
            return null;
        }
        const elements = element.querySelector(classname);
        if (!elements) {
            return null;
        }
        return elements;
    }

    static formatPrice(price) {
        const parts = Number(price).toFixed(2).split('.');
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        const decimalPart = parts[1];
        return `₱${integerPart}.${decimalPart}`;
      }

      static GetCartFromLocalStorage() {
        const cartData = localStorage.getItem('Carts');
        if (!cartData) {
            return [];
        }
        const cartInstances = JSON.parse(cartData);
        return cartInstances;
    }

    static AddItemToCart(newItem) {
        const cartData = this.GetCartFromLocalStorage();
        cartData.push(newItem);
        localStorage.setItem('Carts', JSON.stringify(cartData));
    }

    static DeleteItemFromCart(ItemId) {
        const cartData = this.GetCartFromLocalStorage();
        const updatedCartData = cartData.filter(item => item !== ItemId);
        localStorage.setItem('Carts', JSON.stringify(updatedCartData));
    }
}

