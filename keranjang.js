function addToCart(name, price, id) {
    const qty = document.getElementById(`qty-${id}`).value;
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    const existingProduct = cart.find(item => item.name === name);
    if (existingProduct) {
        existingProduct.quantity += parseInt(qty);
    } else {
        cart.push({ name: name, price: price, quantity: parseInt(qty) });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${name} berhasil ditambahkan ke keranjang!`);
}
