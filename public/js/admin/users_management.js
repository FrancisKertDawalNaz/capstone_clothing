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
        const deanUrl = addAccountBtn.getAttribute("data-dean-url");
        const instructorUrl = addAccountBtn.getAttribute("data-instructor-url");
        const unitHeadUrl = addAccountBtn.getAttribute("data-unit-head-url");
        const registrarUrl = addAccountBtn.getAttribute("data-registrar-url");

        document.querySelectorAll(".choose-type").forEach((tabBtn) => {
            tabBtn.addEventListener("click", function () {
                if (this.id === "dean-tab") {
                    addAccountBtn.href = deanUrl;
                } else if (this.id === "registrar-tab") {
                    addAccountBtn.href = registrarUrl;
                } else if (this.id === "unit-head-tab") {
                    addAccountBtn.href = unitHeadUrl;
                } else {
                    addAccountBtn.href = instructorUrl;
                }
            });
        });
    }
});
