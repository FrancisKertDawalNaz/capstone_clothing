const salesCtx = document.getElementById("salesChart").getContext("2d");
new Chart(salesCtx, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [
            {
                label: "Sales",
                data: [15, 25, 35, 40, 45, 50, 55, 60],
                backgroundColor: "#f4a261",
                borderRadius: 10,
            },
        ],
    },
    options: { responsive: true, scales: { y: { beginAtZero: true } } },
});

const categoryCtx = document.getElementById("categoryChart").getContext("2d");
new Chart(categoryCtx, {
    type: "doughnut",
    data: {
        labels: [
            "Accessories",
            "Business Attire",
            "Casual Wear",
            "Evening Wear",
        ],
        datasets: [
            {
                data: [15, 25, 40, 20],
                backgroundColor: ["#f4a261", "#e76f51", "#2a9d8f", "#264653"],
            },
        ],
    },
});

document.addEventListener("DOMContentLoaded", function () {
    const gcashCount = Number($("#gcashCount").val());
    const codCount = Number($("#codCount").val());

    const paymentCtx = document.getElementById("paymentChart").getContext("2d");

    new Chart(paymentCtx, {
        type: "pie",
        data: {
            labels: ["Gcash", "Cash on Delivery"],
            datasets: [
                {
                    data: [gcashCount, codCount],
                    backgroundColor: ["#007bff", "#f1c40f"],
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        font: { size: 14 },
                    },
                },
            },
        },
    });
});

const calendarEl = document.getElementById("calendar");
new Datepicker(calendarEl, { todayHighlight: true, autohide: true });

function previewProductImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById("previewImage");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
