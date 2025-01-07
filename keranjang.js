let cartItems = [];

function addToCart(productName, productPrice) {
    // Periksa apakah produk sudah ada di keranjang
    let existingItem = cartItems.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1; // Tambahkan jumlah produk jika sudah ada
    } else {
        cartItems.push({ name: productName, price: productPrice, quantity: 1 });
    }
    displayCart();
}

function displayCart() {
    let cartDiv = document.getElementById('cart');
    cartDiv.innerHTML = ''; // Kosongkan konten sebelumnya
    if (cartItems.length === 0) {
        cartDiv.innerHTML = '<p>Your cart is empty</p>';
        return;
    }
    cartItems.forEach(item => {
        cartDiv.innerHTML += `<p>${item.name} - $${item.price} x ${item.quantity}</p>`;
    });
    let total = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    cartDiv.innerHTML += `<h3>Total: $${total.toFixed(2)}</h3>`;
}

