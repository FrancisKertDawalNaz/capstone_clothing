document.addEventListener("DOMContentLoaded", function () {
    const addBtn = document.getElementById("addToCartBtn");
    if (!addBtn) return;

    addBtn.addEventListener("click", async function () {
        const product = JSON.parse(this.dataset.product);
        const priceNumber = parseFloat(product.price.toString().replace(/[^0-9\.]/g, '')) || 0;

        try {
            const res = await fetch(window.cartConfig.storeUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": window.cartConfig.csrfToken,
                    "Accept": "application/json",
                },
                body: new URLSearchParams({
                    product_id: product.id ?? "",
                    name: product.name,
                    price: priceNumber,
                    image: product.img ?? "",
                    shop: product.shop ?? "",
                    qty: 1,
                    duration: "Not selected",
                }),
            });

            const data = await res.json();

            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Added to Cart!",
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.message ?? "Something went wrong!",
                });
            }
        } catch (err) {
            console.error(err);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Failed to connect to server.",
            });
        }
    });
});
