document.addEventListener("DOMContentLoaded", () => {
    const content = document.getElementById("content");
    const pageTitle = document.getElementById("page-title");

    const pages = {
        dashboard: {
            title: "Dashboard",
            content: "<p>Ini adalah tampilan dashboard</p>",
        },
        orders: {
            title: "Pesanan",
            content: "<p>Daftar pesanan akan muncul disini</p>",
        },
        products: {
            title: "Produk",
            content: "<p>Kelola produk disini</p>",
        },
        settings: {
            title: "Pengaturan",
            content: "<p>pengaturan toko dapat dilakukan disini</p>",
        },
    };

    const updateContent = (page) => {
        if (pages[page]) {
            pageTitle.textContent = pages[page].title;
            content.innerHTML = pages[page].content;
        }
    };

    document.querySelectorAll(".sidebara").forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const page = e.target.id.split("-")[0];
            updateContent(page);
        });
    });

    updateContent("dasboard");
});