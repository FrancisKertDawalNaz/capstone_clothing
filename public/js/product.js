document.addEventListener("DOMContentLoaded", function () {
    const addBtn = document.getElementById("addToCartBtn");
    if (!addBtn) return;

    addBtn.addEventListener("click", async function () {
        const product = JSON.parse(this.dataset.product);
        const priceNumber =
            parseFloat(product.price.toString().replace(/[^0-9\.]/g, "")) || 0;

        try {
            const res = await fetch(window.cartConfig.storeUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": window.cartConfig.csrfToken,
                    Accept: "application/json",
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

if ($("main.shope-page").length) {
    document.addEventListener("DOMContentLoaded", function () {
        const cartOffcanvas = document.getElementById("offcanvasCart");

        cartOffcanvas.addEventListener("show.bs.offcanvas", async function () {
            try {
                let res = await fetch(window.cartConfig.fetchUrl);
                let data = await res.json();

                let container = document.getElementById("cartItemsContainer");
                let subtotalEl = document.getElementById("cartSubtotal");

                container.innerHTML = ""; // clear old items
                data.items.forEach((item) => {
                    container.innerHTML += `
                    <div class="d-flex align-items-center mb-3 p-3 bg-white rounded-4 shadow-sm">
                        <img src="${
                            item.image ? item.image : "/img/placeholder.jpg"
                        }"
                             class="rounded-3 me-3"
                             style="width:50px; height:50px; object-fit:cover;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-semibold">${item.name}</h6>
                            <small class="text-muted">₱${(
                                item.price * item.qty
                            ).toFixed(2)}</small>
                        </div>
                        <button class="btn btn-sm btn-outline-danger rounded-pill" 
                                onclick="removeCartItem(${item.id})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                `;
                });

                subtotalEl.textContent =
                    "₱" + parseFloat(data.subtotal).toFixed(2);
            } catch (err) {
                console.error("Failed to load cart items:", err);
            }
        });
    });
}

// Remove cart item
async function removeCartItem(id) {
    try {
        let res = await fetch(window.cartConfig.removeUrl.replace(":id", id), {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": window.cartConfig.csrfToken,
                Accept: "application/json",
            },
        });

        let data = await res.json();
        if (data.success) {
            // Reload cart list without closing offcanvas
            document
                .getElementById("offcanvasCart")
                .dispatchEvent(new Event("show.bs.offcanvas"));
        }
    } catch (err) {
        console.error("Remove failed", err);
    }
}
