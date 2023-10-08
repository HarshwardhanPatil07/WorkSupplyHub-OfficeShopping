'use strict';

let cart = (JSON.parse(localStorage.getItem('cart')) || []);
const cartDOM = document.querySelector('.cart');
const addToCartButtonsDOM = document.querySelectorAll('[data-action="ADD_TO_CART"]');
var dot = document.querySelector('.dot');

const span1 = document.querySelector(".spn1");
const span2 = document.querySelector(".spn2");
const span3 = document.querySelector(".spn3");
const burger = document.querySelector(".burger");
const mobile = document.querySelector(".mobileMenu");

function transmutation() {
  span1.classList.toggle("spn1-trnsfrm");
  span2.classList.toggle("spn2-trnsfrm");
  span3.classList.toggle("spn3-trnsfrm");
  burger.classList.toggle('burger-transform');
  mobile.classList.toggle('pokaz');
}

burger.addEventListener("click", transmutation);

if (cart.length > 0) {
  cart.forEach(cartItem => {
    const product = cartItem;
    insertItemToDOM(product);
    countCartTotal();

    addToCartButtonsDOM.forEach(addToCartButtonDOM => {
      const productDOM = addToCartButtonDOM.parentNode;

      if (productDOM.querySelector('.product-name').innerText === product.name) {
        handleActionButtons(addToCartButtonDOM, product);
      }
    });

  });
}

addToCartButtonsDOM.forEach(addToCartButtonDOM => {
  addToCartButtonDOM.addEventListener('click', () => {
    const productDOM = addToCartButtonDOM.parentNode;
    const product = {
      image: productDOM.querySelector('.product-img').getAttribute('src'),
      name: productDOM.querySelector('.product-name').innerText,
      price: productDOM.querySelector('.product-price').innerText,
      quantity: 1,
    };

    const isInCart = (cart.filter(cartItem => (cartItem.name === product.name)).length > 0);

    if (!isInCart) {
      insertItemToDOM(product);
      cart.push(product);
      saveCart();
      handleActionButtons(addToCartButtonDOM, product);
    }
  });
});

function insertItemToDOM(product) {
  cartDOM.insertAdjacentHTML('beforeend', `
    <div class="cart-item">
      <img class="cart-item-image" src="${product.image}" alt="${product.name}">
      <h3 class="cart-item-name">${product.name}</h3>
      <h3 class="cart-item-price">${product.price}</h3>
      <button class="btn btn-main btn-small${(product.quantity === 1 ? ' btn-main' : '')}" data-action="DECREASE_ITEM">&minus;</button>
      <h3 class="cart-item-quantity">${product.quantity}</h3>
      <button class="btn btn-main btn-small" data-action="INCREASE_ITEM">&plus;</button>
      <button class="btn btn-danger btn-small" data-action="REMOVE_ITEM">&times;</button>
    </div>
  `);

  addCartFooter();
}

function handleActionButtons(addToCartButtonDOM, product) {
  addToCartButtonDOM.innerText = 'In Cart';
  addToCartButtonDOM.disabled = true;
  addToCartButtonDOM.style.cursor = "not-allowed";

  const cartItemsDOM = cartDOM.querySelectorAll('.cart-item');
  cartItemsDOM.forEach(cartItemDOM => {
    if (cartItemDOM.querySelector('.cart-item-name').innerText === product.name) {
      cartItemDOM.querySelector('[data-action="INCREASE_ITEM"]').addEventListener('click', () => increaseItem(product, cartItemDOM));
      cartItemDOM.querySelector('[data-action="DECREASE_ITEM"]').addEventListener('click', () => decreaseItem(product, cartItemDOM, addToCartButtonDOM));
      cartItemDOM.querySelector('[data-action="REMOVE_ITEM"]').addEventListener('click', () => removeItem(product, cartItemDOM, addToCartButtonDOM));
    }
  });
}

function increaseItem(product, cartItemDOM) {
  cart.forEach(cartItem => {
    if (cartItem.name === product.name) {
      cartItemDOM.querySelector('.cart-item-quantity').innerText = ++cartItem.quantity;
      cartItemDOM.querySelector('[data-action="DECREASE_ITEM"]').classList.remove('btn-danger');
      saveCart();
    }
  });
}

function decreaseItem(product, cartItemDOM, addToCartButtonDOM) {
  cart.forEach(cartItem => {
    if (cartItem.name === product.name) {
      if (cartItem.quantity > 1) {
        cartItemDOM.querySelector('.cart-item-quantity').innerText = --cartItem.quantity;
        saveCart();
      } else {
        removeItem(product, cartItemDOM, addToCartButtonDOM);
      }
    }
  });
}

function removeItem(product, cartItemDOM, addToCartButtonDOM) {
  cartItemDOM.classList.add('cart__item--removed');
  setTimeout(() => cartItemDOM.remove(), 250);
  cart = cart.filter(cartItem => cartItem.name !== product.name);
  saveCart();
  addToCartButtonDOM.style.cursor = "pointer";
  addToCartButtonDOM.innerText = 'Add To Cart';
  addToCartButtonDOM.disabled = false;
  
  if (cart.length < 1) {
    document.querySelector('.cart-footer').remove();
  }

}

function addCartFooter() {
  if (document.querySelector('.cart-footer') === null) {
    cartDOM.insertAdjacentHTML('afterend', `
      <div class="cart-footer">
        <button class="btn btn-danger" data-action="CLEAR_CART">Clear Cart</button>
        <button class="btn btn-main" data-action="CHECKOUT">Pay</button>
      </div>
    `);

    document.querySelector('[data-action="CLEAR_CART"]').addEventListener('click', () => clearCart());
    document.querySelector('[data-action="CHECKOUT"]').addEventListener('click', () => checkout());
  }
}

function clearCart() {
  cartDOM.querySelectorAll('.cart-item').forEach(cartItemDOM => {
    cartItemDOM.classList.add('cart__item--removed');
    setTimeout(() => cartItemDOM.remove(), 250);
  });

  cart = [];
  localStorage.removeItem('cart');
  document.querySelector('.cart-footer').remove();

  addToCartButtonsDOM.forEach(addToCartButtonDOM => {
    addToCartButtonDOM.style.cursor = "pointer";
    addToCartButtonDOM.innerText = 'Add To Cart';
    addToCartButtonDOM.disabled = false;
  });

  dot.style.display = 'none';
}

function checkout() {
  let paypalFormHTML = `
    <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="upload" value="1">
      <INPUT TYPE="hidden" NAME="currency_code" value="RS">
      <input type="hidden" name="business" value="info@cytrobit.com">
  `;

  cart.forEach((cartItem, index) => {
    ++index;
    paypalFormHTML += `
      <input type="hidden" name="item_name_${index}" value="${cartItem.name}">
      <input type="hidden" name="amount_${index}" value="${cartItem.price}">
      <input type="hidden" name="quantity_${index}" value="${cartItem.quantity}">
    `;
  });

  paypalFormHTML += `
      <input type="submit" value="PayPal">
    </form>
    <div class="overlay"></div>
  `;

  document.querySelector('body').insertAdjacentHTML('beforeend', paypalFormHTML);
  document.getElementById('paypal-form').submit();
}

function countCartTotal() {
  let cartTotal = 0;
  cart.forEach(cartItem => (cartTotal += cartItem.quantity * cartItem.price));
  document.querySelector('[data-action="CHECKOUT"]').innerText = 'Pay ' + (cartTotal).toFixed(2) + 'RS';
  cartTotal > 0 ? dot.style.display = 'block' : dot.style.display = 'none';
}

function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
  countCartTotal();
}

// // scripts.js

// Function to animate the counters
function animateCounters() {
  const counters = document.querySelectorAll('.counter');
  const speed = 320; // Adjust the speed as needed

  counters.forEach((counter) => {
    const target = +counter.getAttribute('data-count');
    const increment = target / speed;

    const updateCounter = () => {
      const currentValue = +counter.innerText;
      if (currentValue < target) {
        counter.innerText = Math.ceil(currentValue + increment);
        setTimeout(updateCounter, 1);
      } else {
        counter.innerText = target;
      }
    };

    updateCounter();
  });
}

// Trigger the counter animation when the element comes into view
const countersElement = document.querySelector('.count-numbers');
const isInViewport = (element) => {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
  );
};

window.addEventListener('scroll', () => {
  if (isInViewport(countersElement)) {
    animateCounters();
    window.removeEventListener('scroll', animateCounters);
  }
});




    