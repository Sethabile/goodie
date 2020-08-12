const productsContainer = document.querySelector('.products.container')

function buildElement (html) {
    const template = document.createElement('template')
    template.innerHTML = html
    return template.content
}

function clearProducts () {
    productsContainer.innerHTML = ""
}

function addToCart (id) {
    fetch('/goodie/api/cart.php', {
        method: 'PUT',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({product_id: id})
    })
    .then(res=>res.json())
    .then(products => alert(`Added ${products[products.length - 1].name} to your cart`))
    .catch(() => showMessage('No results found'))
}

function removeFromCart (id) {
    fetch('/goodie/api/cart.php', {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({id})
        })
    .then(res=>res.json())
    .then(products => (clearProducts(), alert('Item removed from your cart'), updateCart(products)))
    .then(total => document.querySelector('.total .amount').innerHTML = 'R'+total)
    .catch(() => showMessage('No results found'))
}

function updateProducts (products) {
    products.forEach(function(product) {
        productsContainer.append(buildElement(`
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="images/products/${product.image}" /></div>
                    <div class="product-details">
                        <div class="product-name">${product.name}</div>
                        <div class="product-price">R${product.price}</div>
                        <button onclick="addToCart(${product.id})">Add to cart</button>
                    </div>
                </div>
            </div>
        `))
    })
}

function cartRows (products) {
    let rows = ''

    products.forEach(function(product) {
        rows += `<tr>
            <td>
                <div class="product-container">
                    <div class="product-item">
                        <div class="product-image"><img src="images/products/${product.image}" /></div>
                        <div class="product-details">
                            <div class="product-name">${product.name}</div>
                            <button onclick="removeFromCart(${product.id})">Remove from cart</button>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="product-price">R${product.price}</div>
            </td>
        </tr>`
    })
    return rows
}

function updateCart (products) {
    const table = buildElement(`
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                ${cartRows(products)}
                <tr>
                    <td colspan="2">
                        total: R${products.reduce((acc, curr) => acc += Number(curr.price), 0)}
                    <td>
                </tr>
            </tbody>
        </table>
    `)
    productsContainer.append(table)
}

function showMessage (message) {
    productsContainer.innerHTML = message
}