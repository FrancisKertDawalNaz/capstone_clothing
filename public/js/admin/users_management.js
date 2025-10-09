$(document).on("submit", "#add_seller_account_form", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    showLoading();
    $.ajax({
        type: "POST",
        url: "/admin/submit_seller_account",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            hideLoading();
            global_showalert(response.message, "Success", "green");
            $("#add_seller_account_form")[0].reset();
        },
        error: function (xhr) {
            hideLoading();
            let response = JSON.parse(xhr.responseText);
            let errorMessage = "An error occurred";
            if (response.errors) {
                errorMessage = "";
                for (let errorKey in response.errors) {
                    errorMessage += response.errors[errorKey][0] + "\n";
                }
            }
            global_showalert(errorMessage, "Alert!", "red");
        },
    });
});

$(document).on("submit", "#add_rider_account_form", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    showLoading();
    $.ajax({
        type: "POST",
        url: "/admin/submit_rider_account",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            hideLoading();
            global_showalert(response.message, "Success", "green");
            $("#add_rider_account_form")[0].reset();
        },
        error: function (xhr) {
            hideLoading();
            let response = JSON.parse(xhr.responseText);
            let errorMessage = "An error occurred";
            if (response.errors) {
                errorMessage = "";
                for (let errorKey in response.errors) {
                    errorMessage += response.errors[errorKey][0] + "\n";
                }
            }
            global_showalert(errorMessage, "Alert!", "red");
        },
    });
});

$(document).on("submit", "#changepassword", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    // Show loading indicator
    showLoading();
    $.ajax({
        type: "POST",
        url: "/admin/change_password",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            hideLoading();
            global_showalert(response.message, "Success", "green");
            $("#changepassword")[0].reset();
        },
        error: function (xhr) {
            hideLoading();
            let response = JSON.parse(xhr.responseText);
            let errorMessage = "An error occurred";
            if (response.errors) {
                errorMessage = "";
                for (let errorKey in response.errors) {
                    errorMessage += response.errors[errorKey][0] + "\n";
                }
            } else if (response.error) {
                errorMessage = response.error;
            }
            global_showalert(errorMessage, "Alert!", "red");
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const addAccountBtn = document.getElementById("addAccountBtn");
    if (addAccountBtn) {
        const seller = addAccountBtn.getAttribute("data-seller-url");
        const customer = addAccountBtn.getAttribute("data-customer-url");
        const rider = addAccountBtn.getAttribute("data-rider-url");

        document.querySelectorAll(".choose-type").forEach((tabBtn) => {
            tabBtn.addEventListener("click", function () {
                if (this.id === "seller-tab") {
                    addAccountBtn.href = seller;
                } else if (this.id === "rider-tab") {
                    addAccountBtn.href = rider;
                } else if (this.id === "customer-tab") {
                    addAccountBtn.href = customer;
                }
            });
        });
    }
});
