(function () {
    const aiChatBtn = document.getElementById("aiChatBtn");
    const fashionBot = document.getElementById("fashionBot");
    const closeBot = document.getElementById("closeBot");
    const sendBotBtn = document.getElementById("sendBotBtn");
    const botInput = document.getElementById("botInput");
    const botBody = document.getElementById("botBody");

    if (!aiChatBtn) return; // nothing to wire on this page

    aiChatBtn.addEventListener("click", function () {
        if (fashionBot) fashionBot.style.display = "flex";
        else alert("AI Chatbot will open here!"); // fallback behavior
    });

    if (closeBot && fashionBot) {
        closeBot.addEventListener("click", () => {
            fashionBot.style.display = "none";
        });
    }

    async function sendMessage() {
        if (!botInput || !botBody || !sendBotBtn) return;
        const msg = botInput.value.trim();
        if (!msg) return;

        sendBotBtn.disabled = true;
        const userMsg = document.createElement("div");
        userMsg.classList.add("bot-message");
        userMsg.style.background = "#ffecd1";
        userMsg.style.alignSelf = "flex-end";
        userMsg.textContent = msg;
        botBody.appendChild(userMsg);
        botBody.scrollTop = botBody.scrollHeight;
        botInput.value = "";

        const botReply = document.createElement("div");
        botReply.classList.add("bot-message");
        botReply.textContent = "Fashionbot is typing...";
        botBody.appendChild(botReply);
        botBody.scrollTop = botBody.scrollHeight;

        try {
            const response = await fetch("/chat", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({ message: msg }),
            });

            const data = await response.json();
            botReply.textContent = data.reply;
            botBody.scrollTop = botBody.scrollHeight;
        } catch (err) {
            botReply.textContent = "Fashionbot: Sorry, something went wrong 😔";
        } finally {
            sendBotBtn.disabled = false;
        }
    }

    if (sendBotBtn) sendBotBtn.addEventListener("click", sendMessage);
    if (botInput)
        botInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") sendMessage();
        });
})();

document.addEventListener("DOMContentLoaded", function () {
    const rentNowBtn = document.querySelector(".bot-btn");
    const botBody = document.getElementById("botBody");
    if (rentNowBtn && botBody) {
        rentNowBtn.addEventListener("click", function () {
            // Step 1: Show category options
            const msg = document.createElement("div");
            msg.className = "bot-message";
            msg.textContent =
                "Please choose the category that you are looking for.";
            botBody.appendChild(msg);

            const categories = ["Women", "Men", "Kids", "Accesories", "Shoes"];
            const catDiv = document.createElement("div");
            catDiv.className = "bot-buttons";
            categories.forEach((cat) => {
                const btn = document.createElement("button");
                btn.className = "bot-btn";
                btn.textContent = cat;
                btn.onclick = function () {
                    // Show user selection
                    const userMsg = document.createElement("div");
                    userMsg.className = "bot-message";
                    userMsg.style.textAlign = "right";
                    userMsg.innerHTML = `<span style="background:#eee;padding:4px 10px;border-radius:12px;">${cat}</span>`;
                    botBody.appendChild(userMsg);

                    // Step 2: Show style options
                    const styleMsg = document.createElement("div");
                    styleMsg.className = "bot-message";
                    styleMsg.textContent =
                        "What is your fashion style do you prefer? Please choose one.";
                    botBody.appendChild(styleMsg);

                    const styles = [
                        "Casual",
                        "Semi-Formal",
                        "StreetWear",
                        "Workwear",
                        "Formal",
                        "Minimalist",
                        "Vintage",
                        "Minimalism",
                    ];
                    const styleDiv = document.createElement("div");
                    styleDiv.className = "bot-buttons";
                    styles.forEach((style) => {
                        const sbtn = document.createElement("button");
                        sbtn.className = "bot-btn";
                        sbtn.textContent = style;
                        sbtn.onclick = function () {
                            // Show user style selection
                            const userStyleMsg = document.createElement("div");
                            userStyleMsg.className = "bot-message";
                            userStyleMsg.style.textAlign = "right";
                            userStyleMsg.innerHTML = `<span style="background:#eee;padding:4px 10px;border-radius:12px;">${style}</span>`;
                            botBody.appendChild(userStyleMsg);

                            // Step 3: Show size options
                            const sizeMsg = document.createElement("div");
                            sizeMsg.className = "bot-message";
                            sizeMsg.textContent =
                                "What is your size preferences? Please choose one";
                            botBody.appendChild(sizeMsg);

                            const sizes = ["XS", "S", "M", "L", "XL", "XXL"];
                            const sizeDiv = document.createElement("div");
                            sizeDiv.className = "bot-buttons";
                            sizes.forEach((size) => {
                                const sizeBtn =
                                    document.createElement("button");
                                sizeBtn.className = "bot-btn";
                                sizeBtn.textContent = size;
                                sizeBtn.onclick = function () {
                                    // Show user size selection
                                    const userSizeMsg =
                                        document.createElement("div");
                                    userSizeMsg.className = "bot-message";
                                    userSizeMsg.style.textAlign = "right";
                                    userSizeMsg.innerHTML = `<span style="background:#eee;padding:4px 10px;border-radius:12px;">${size}</span>`;
                                    botBody.appendChild(userSizeMsg);

                                    // Step 4: Show skin tone options
                                    const skinMsg =
                                        document.createElement("div");
                                    skinMsg.className = "bot-message";
                                    skinMsg.textContent =
                                        "What is your skin tone or skin color? Let me know and I'll guide you! Kindly choose one.";
                                    botBody.appendChild(skinMsg);

                                    const skins = [
                                        "Fair Skin",
                                        "Tan/ Olive Skin",
                                        "Light-Medium Skin",
                                        "Deep/ Dark Skin",
                                    ];
                                    const skinDiv =
                                        document.createElement("div");
                                    skinDiv.className = "bot-buttons";
                                    skins.forEach((skin) => {
                                        const skinBtn =
                                            document.createElement("button");
                                        skinBtn.className = "bot-btn";
                                        skinBtn.textContent = skin;
                                        skinBtn.onclick = function () {
                                            // Show user skin selection
                                            const userSkinMsg =
                                                document.createElement("div");
                                            userSkinMsg.className =
                                                "bot-message";
                                            userSkinMsg.style.textAlign =
                                                "right";
                                            userSkinMsg.innerHTML = `<span style="background:#eee;padding:4px 10px;border-radius:12px;">${skin}</span>`;
                                            botBody.appendChild(userSkinMsg);

                                            // Step 5: Show summary and product cards
                                            const summaryMsg =
                                                document.createElement("div");
                                            summaryMsg.className =
                                                "bot-message";
                                            summaryMsg.innerHTML =
                                                "Okay, the formal attire should enhance your natural coloring and provide a flattering silhouette. Here's a solid breakdown of what works well and 5 products suggestions to get you styled up.";
                                            botBody.appendChild(summaryMsg);

                                            // Product cards by category
                                            const cardWrap =
                                                document.createElement("div");
                                            cardWrap.style.display = "flex";
                                            cardWrap.style.overflowX = "auto";
                                            cardWrap.style.gap = "12px";
                                            cardWrap.style.margin = "12px 0";

                                            // Product data for each category
                                            const productMap = {
                                                Men: [
                                                    {
                                                        img: "/img/men1.jpg",
                                                        name: "Men's Formal Outfit Pro",
                                                        price: "₱1,200",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/men2.jpg",
                                                        name: "Luxury Black Suit",
                                                        price: "₱1,500",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/men3.jpg",
                                                        name: "Elegant Green Gown",
                                                        price: "₱1,200",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/men4.jpg",
                                                        name: "Men's Black Tie Attire",
                                                        price: "₱900",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/men5.jpg",
                                                        name: "Classic Tuxedo",
                                                        price: "₱2,500",
                                                        btn: "View",
                                                    },
                                                ],
                                                Women: [
                                                    {
                                                        img: "/img/women1.jpg",
                                                        name: "Red Evening Gown",
                                                        price: "₱1,900",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/women2.jpg",
                                                        name: "Floral Summer Dress",
                                                        price: "₱600",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/women3.jpg",
                                                        name: "Elegant Black Dress",
                                                        price: "₱1,100",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/women4.jpg",
                                                        name: "Blue Cocktail Dress",
                                                        price: "₱1,400",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/women5.jpg",
                                                        name: "Classic White Gown",
                                                        price: "₱3,500",
                                                        btn: "View",
                                                    },
                                                ],
                                                Kids: [
                                                    {
                                                        img: "/img/kids1.jpg",
                                                        name: "Boys Suit Set",
                                                        price: "₱2,500",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/kids2.jpg",
                                                        name: "Girls Party Dress",
                                                        price: "₱1,500",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/kids3.jpg",
                                                        name: "Kids Tuxedo",
                                                        price: "₱1,800",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/kids4.jpg",
                                                        name: "Flower Girl Dress",
                                                        price: "₱1,100",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/kids5.jpg",
                                                        name: "Boys Blazer",
                                                        price: "₱1,700",
                                                        btn: "View",
                                                    },
                                                ],
                                                Accesories: [
                                                    {
                                                        img: "/img/ace1.jpg",
                                                        name: "Gold Necklace",
                                                        price: "₱700",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/ace2.jpg",
                                                        name: "Pearl Earrings",
                                                        price: "₱200",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/ace3.jpg",
                                                        name: "Leather Belt",
                                                        price: "₱500",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/ace4.jpg",
                                                        name: "Silk Scarf",
                                                        price: "₱350",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/ace5.jpg",
                                                        name: "Classic Watch",
                                                        price: "₱1,000",
                                                        btn: "View",
                                                    },
                                                ],
                                                Shoes: [
                                                    {
                                                        img: "/img/shoe1.jpg",
                                                        name: "Black Oxford Shoes",
                                                        price: "₱2,500",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/shoe2.jpg",
                                                        name: "Red Heels",
                                                        price: "₱1,800",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/shoe3.jpg",
                                                        name: "White Sneakers",
                                                        price: "₱1,200",
                                                        btn: "View",
                                                    },
                                                    {
                                                        img: "/img/shoe4.jpg",
                                                        name: "Brown Loafers",
                                                        price: "₱1,100",
                                                        btn: "Book Now",
                                                    },
                                                    {
                                                        img: "/img/shoe5.jpg",
                                                        name: "Blue Sandals",
                                                        price: "₱900",
                                                        btn: "View",
                                                    },
                                                ],
                                            };
                                            const products =
                                                productMap[cat] || [];
                                            products.forEach((prod) => {
                                                const card =
                                                    document.createElement(
                                                        "div"
                                                    );
                                                card.style.background = "#fff";
                                                card.style.border =
                                                    "1px solid #eee";
                                                card.style.borderRadius =
                                                    "12px";
                                                card.style.width = "140px";
                                                card.style.flex = "0 0 auto";
                                                card.style.textAlign = "center";
                                                card.style.padding =
                                                    "10px 8px 12px 8px";
                                                card.style.boxSizing =
                                                    "border-box";
                                                card.style.overflow = "hidden";
                                                // Build query string for product details
                                                const params =
                                                    new URLSearchParams({
                                                        img: prod.img || "",
                                                        name: prod.name || "",
                                                        desc: prod.desc || "",
                                                        price: prod.price || "",
                                                        inclusions:
                                                            JSON.stringify(
                                                                prod.inclusions ||
                                                                    []
                                                            ),
                                                        shop:
                                                            prod.shop ||
                                                            "Shop 1",
                                                        size:
                                                            prod.size ||
                                                            "Medium Size",
                                                    }).toString();
                                                card.innerHTML = `
<div style="
width:100%;
background:rgba(255,255,255,0.9);
backdrop-filter:blur(10px);
border-radius:16px;
padding:14px;
box-shadow:0 6px 20px rgba(0,0,0,0.08);
transition:transform 0.25s ease, box-shadow 0.25s ease;
cursor:pointer;
" 
class="fxg-card">

<div style="width:100%;height:110px;overflow:hidden;display:flex;align-items:center;justify-content:center;border-radius:12px;background:#fafafa;">
<img src="${prod.img}" alt="${prod.name}" 
    style="max-width:100%;max-height:110px;object-fit:cover;border-radius:12px;transition:transform 0.3s ease;">
</div>

<div style="font-size:15px;font-weight:600;margin:10px 0 8px 0;color:#222;white-space:normal;text-align:center;line-height:1.3;">
${prod.name}
</div>
<div style="font-size:14px;color:#111;font-weight:700;margin-bottom:6px;text-align:center;">${prod.price}</div>

<div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap;">
<a class="btn btn-sm btn-outline-dark view-product-btn" 
    href="/shope?${params}"
    style="border-radius:12px;padding:7px 20px;font-weight:600;border-width:1.5px;"
    >
    View
</a>
</div>
</div>
`;

                                                cardWrap.appendChild(card);
                                            });
                                            botBody.appendChild(cardWrap);

                                            skinDiv.remove();
                                        };
                                        skinDiv.appendChild(skinBtn);
                                    });
                                    botBody.appendChild(skinDiv);

                                    sizeDiv.remove();
                                };
                                sizeDiv.appendChild(sizeBtn);
                            });
                            botBody.appendChild(sizeDiv);
                            styleDiv.remove();
                        };
                        styleDiv.appendChild(sbtn);
                    });
                    botBody.appendChild(styleDiv);

                    catDiv.remove();
                };
                catDiv.appendChild(btn);
            });
            botBody.appendChild(catDiv);
            botBody.scrollTop = botBody.scrollHeight;
        });
    }
});


document.getElementById('aiChatBtn').addEventListener('click', function(e) {
  e.preventDefault();
  document.getElementById('fashionBot').classList.add('show');
});

document.getElementById('closeBot').addEventListener('click', function() {
  document.getElementById('fashionBot').classList.remove('show');
});