document.getElementById("checkoutForm").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);

    fetch(window.orderConfig.placeUrl, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": window.orderConfig.csrfToken,
            "Accept": "application/json",
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            alert(data.message);
            window.location.href = window.orderConfig.redirectUrl;
        }else{
            alert(data.message || "Failed to place order.");
        }
    })
    .catch(err => console.error(err));
});
