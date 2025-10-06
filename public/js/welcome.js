
$("#loginsubmit").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
        showLoading();
        $.ajax({
            url: "/loginsubmit",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                hideLoading();
                global_showalert(
                    response.message,
                    "Login Success",
                    "blue",
                    response.redirect
                );
            },
            error: function (xhr) {
                hideLoading();
                if (xhr.status === 409) {
                    global_showalert(
                        xhr.responseJSON.message,
                        "Warning!",
                        "orange"
                    );
                } else {
                    let response = JSON.parse(xhr.responseText);
                    let errorMessage = "An error occurred";
                    if (response.errors) {
                        errorMessage = "";
                        for (let errorKey in response.errors) {
                            errorMessage += response.errors[errorKey][0] + "\n";
                        }
                    }
                    global_showalert(errorMessage, "Alert!", "red");
                }
            },
        });
});


$("#signupsubmit").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
        showLoading();
        $.ajax({
            url: "/register",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                hideLoading();
                global_showalert(
                    response.message,
                    "Login Success",
                    "blue",
                    response.redirect
                );
            },
            error: function (xhr) {
                hideLoading();
                if (xhr.status === 409) {
                    global_showalert(
                        xhr.responseJSON.message,
                        "Warning!",
                        "orange"
                    );
                } else {
                    let response = JSON.parse(xhr.responseText);
                    let errorMessage = "An error occurred";
                    if (response.errors) {
                        errorMessage = "";
                        for (let errorKey in response.errors) {
                            errorMessage += response.errors[errorKey][0] + "\n";
                        }
                    }
                    global_showalert(errorMessage, "Alert!", "red");
                }
            },
        });
});