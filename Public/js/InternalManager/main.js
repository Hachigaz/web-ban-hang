var moduleArr = {
    0: "HomeManager",
    1: "AccountManager",
    2: "StaffManager",
    3: "CustomerManager",
    4: "ProductManager",
    5: "SupplierManager",
    6: "WarehouseManager",
    7: "ImportManager",
    8: "ExportManager",
    9: "OrderManager",
    10: "SalaryManager",
    11: "StatisticManager",
    12: "DecentralizationManager",
};
var moduleName = {
    1: "Tài khoản",
    2: "Nhân viên",
    3: "Khách hàng",
    4: "Sản phẩm",
    5: "Nhà cung cấp",
    6: "Kho",
    7: "Nhập hàng",
    8: "Xuất hàng",
    9: "Hóa đơn",
    10: "Lương",
    11: "Thống kê",
    12: "Phân quyền",
};
var moduleIcon = {
    1: '<i class="fi fi-rr-circle-user"></i>',
    2: '<i class="fi fi-rr-users"></i>',
    3: '<i class="fi fi-rr-users-alt"></i>',
    4: '<i class="fi fi-rr-boxes"></i>',
    5: '<i class="fi fi-rr-supplier"></i>',
    6: '<i class="fi fi-rr-warehouse-alt"></i>',
    7: '<i class="fi fi-rr-truck-check"></i>',
    8: '<i class="fi fi-rr-point-of-sale-bill"></i>',
    9: '<i class="fi fi-rr-file-invoice-dollar"></i>',
    10: '<i class="fi fi-rr-payroll-calendar"></i>',
    11: '<i class="fi fi-rr-chart-histogram"></i>',
    12: '<i class="fi fi-rr-users-medical"></i>',
};
const ulInNavigation = document.querySelector(".navigation ul");
const customerBtn = document.querySelector(".customer-btn");
const productBtn = document.querySelector(".product-btn");
const internalManager = document.querySelector(".internal-manager");
const screenModule = document.querySelector(".screen");
const contentModule = document.querySelector(".content-module");

var roleId = sessionStorage.getItem("role_id");

fetch("../Decentralization/GetAllModuleByRole/" + roleId)
    .then((response) => response.json())
    .then((modules) => {
        modules.forEach((module, i) => {
            var moduleBtn = "";
            if (i == 0) {
                // module trang chu khong tao trong db
                moduleBtn += `<li class='module-${i}' title='Trang chủ'>
                <div>
                    <span class="icon"
                        ><i class="fi fi-rr-home"></i>
                    </span>
                    <span class="title">Trang chủ</span>
                </div>
                </li>`;
            }
            moduleBtn += `<li class='module-${i + 1}' title='${
                moduleName[module.module_id]
            }'> 
                    <div>
                        <span class="icon">${
                            moduleIcon[module.module_id] // Lay ra cac module
                        }</span>
                        <span class="title">${
                            moduleName[module.module_id]
                        }</span>
                    </div>
                </li>`;
            ulInNavigation.innerHTML += moduleBtn;
        });
        const liInNavigation = document.querySelectorAll(".navigation ul li");
        var liInNavigationArr = Array.from(liInNavigation);
        liInNavigationArr.forEach(function (liItem) {
            // Thêm sự kiện click cho mỗi phần tử li
            liItem.addEventListener("click", function () {
                // Xóa class 'active' khỏi tất cả các phần tử li
                liInNavigationArr.forEach(function (item) {
                    item.classList.remove("active");
                });
                this.classList.add("active");
            });
        });
    })
    .catch((error) => console.log("Error: ", error));

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        contentModule.innerHTML = xhr.responseText;
    }
};
xhr.open("GET", `../MVC/Views/pages/Manager/HomeManager.php`, true); // man hinh mac dinh la home
xhr.send();
fetch("../Decentralization/GetAllModuleByRole/" + roleId)
    .then((response) => response.json())
    .then((modules) => {
        modules.forEach((module, i) => {
            if (i == 0) {
                document
                    .querySelector(`.module-${i}`)
                    .addEventListener("click", function () {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                contentModule.innerHTML = xhr.responseText;
                            }
                        };
                        xhr.open(
                            "GET",
                            `../MVC/Views/pages/Manager/HomeManager.php`,
                            true
                        );
                        xhr.send();
                    });
            }
            document
                .querySelector(`.module-${i + 1}`)
                .addEventListener("click", function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            contentModule.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.open(
                        "GET",
                        `../MVC/Views/pages/Manager/${
                            moduleArr[module.module_id]
                        }.php`,
                        true
                    );
                    xhr.send();
                });
        });
    })
    .catch((error) => console.log("Error: ", error));
var toggle = document.querySelector(".toggle");
var navigation = document.querySelector(".navigation");
toggle.addEventListener("click", function () {
    navigation.classList.toggle("active");
    screenModule.classList.toggle("active");
});

// fetch("../Decentralization/GetAllModuleByRole/" + 1)
//     .then((response) => response.json())
//     .then((modules) => {
//         var i = 1;
//         modules.forEach((module) => {

//             i++;
//         });
//     })
//     .catch((error) => console.log("Error: ", error));
// customerBtn.addEventListener("click", function () {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             internalManager.innerHTML = xhr.responseText;
//         }
//     };
//     xhr.open("GET", "../MVC/Views/pages/Manager/CustomerManager.php", true);
//     xhr.send();
// });
// productBtn.addEventListener("click", function () {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             internalManager.innerHTML = xhr.responseText;
//         }
//     };
//     xhr.open("GET", "../MVC/Views/pages/Manager/ProductManager.php", true);
//     xhr.send();
// });
// <?php require_once "./MVC/Views/pages/Manager/HomeManager.php"; ?>
