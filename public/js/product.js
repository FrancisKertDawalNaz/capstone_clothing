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
    
}

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

document.addEventListener("DOMContentLoaded", function () {
    const qtyInput = document.getElementById("qtyInput");
    const btnPlus = document.getElementById("qtyPlus");
    const btnMinus = document.getElementById("qtyMinus");
    const addToCartBtn = document.getElementById("addToCartBtn");

    // Quantity buttons
    if (btnPlus && btnMinus && qtyInput) {
        btnPlus.addEventListener("click", () => {
            qtyInput.value = (parseInt(qtyInput.value) || 1) + 1;
        });
        btnMinus.addEventListener("click", () => {
            let current = parseInt(qtyInput.value) || 1;
            if (current > 1) qtyInput.value = current - 1;
        });
    }

    // Add to Cart
    if (addToCartBtn) {
        // Remove any previous click listeners (in case script loaded multiple times)
        const newButton = addToCartBtn.cloneNode(true);
        addToCartBtn.parentNode.replaceChild(newButton, addToCartBtn);

        newButton.addEventListener("click", async function (e) {
            e.preventDefault();
            newButton.disabled = true;

            const product = JSON.parse(this.dataset.product);
            const qtyValue = parseInt(qtyInput.value) || 1;
            const priceNumber = parseFloat(product.price.toString().replace(/[^0-9\.]/g, "")) || 0;

            try {
                const res = await fetch(window.cartConfig.storeUrl, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": window.cartConfig.csrfToken,
                        Accept: "application/json"
                    },
                    body: new URLSearchParams({
                        product_id: product.id ?? "",
                        name: product.name,
                        price: priceNumber,
                        image: product.img ?? "",
                        shop: product.shop ?? "",
                        qty: qtyValue,
                        duration: "Not selected"
                    })
                });

                const data = await res.json();

                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Added to Cart!",
                        text: data.message ?? "Product added successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: data.message ?? "Something went wrong!"
                    });
                }
            } catch (err) {
                console.error(err);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to connect to server."
                });
            } finally {
                newButton.disabled = false;
            }
        });
    }
});





