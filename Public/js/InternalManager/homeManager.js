var valueArr = {
    1: "Mặt hàng",
    2: "Khách hàng",
    3: "Đơn hàng",
    4: "Nhân viên",
};
var valueIcon = {
    1: '<i class="fi fi-rr-box-open"></i>',
    2: '<i class="fi fi-rr-users-alt"></i>',
    3: '<i class="fi fi-rr-point-of-sale-bill"></i>',
    4: '<i class="fi fi-rr-users"></i>',
};

const cardBox = document.createElement("div");
cardBox.classList.add("card-box");
const content = document.querySelector(".content-module");
fetch("../InternalManager/GetAllCardValue")
    .then((response) => response.json())
    .then((values) => {
        let i = 1;
        for (let key in values) {
            var card = "";
            card += `
            <div class="card">
            <div>
                <div class="numbers">${values[key]}</div>
                <div class="card-name">${valueArr[i]}</div>
            </div>
            <div class="icon-box">
                ${valueIcon[i]}
            </div>
            </div>
            `;
            i++;
            cardBox.innerHTML += card;
            content.appendChild(cardBox);
        }
    })
    .catch((error) => console.log("Error: ", error));
