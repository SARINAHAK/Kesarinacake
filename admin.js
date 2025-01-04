document.addEventListener('DOMContentLoaded', () => {
    const manageProductsButton = document.getElementById('manageProducts');
    const viewOrdersButton = document.getElementById('viewOrders');
    const logoutButton = document.getElementById('logout');
    const contentDiv = document.getElementById('content');

    manageProductsButton.addEventListener('click', () => {
        loadContent('manage-products.php');
    });

    viewOrdersButton.addEventListener('click', () => {
        loadContent("view-orders.php");
    });

    logoutButton.addEventListener('click', () => {
        window.location.href = 'logout.php';
    });

    function loadContent(url) {
        fetch(url) 
            .then(response => {
                if (!response.ok){
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.text();
            })
            
            .then(html => {
                contentDiv.innerHTML = html;
            })
            

            .catch(err => {
                contentDiv.innerHTML = '<p>Gagal memuat konten. Silakan coba lagi.</p>';
                console.error(err);
            });
        }
});