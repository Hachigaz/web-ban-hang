let productsAddedToCart = 0;
function addProducttocart(product_id, sku_id, checkboxState,inputValue) {
    fetch("../Shopcart/getAllProductSku")
        .then((response) => response.json())
        .then((data) => {
            const productSku = data.productSku;
            const foundProduct = productSku.find(item => item.product_id === product_id && item.sku_id === sku_id);
            if (foundProduct) {
                const cartContent = document.querySelector(".cart-content");

                // Tạo các phần tử HTML
                const productDiv = document.createElement("div");
                productDiv.classList.add("product-item");
                productDiv.id = sku_id;

                const checkbox = document.createElement("input");
                checkbox.id = "sku_" + sku_id;
                checkbox.type = "checkbox";
                checkbox.checked = true; // Đặt mặc định là checked
                productDiv.appendChild(checkbox);

                // Thêm sự kiện change cho checkbox
                checkbox.addEventListener("change", () => {
                    updateTotalAmount(); // Gọi hàm tính tổng giá trị khi checkbox thay đổi trạng thái
                    saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                });

                const img = document.createElement("img");
                img.src = foundProduct.thumbnail; // Thay thế bằng URL thực tế của hình ảnh
                productDiv.appendChild(img);

                const nameDiv = document.createElement("div");
                nameDiv.classList.add("product-name");
                nameDiv.textContent = foundProduct.product_name;
                productDiv.appendChild(nameDiv);

                const priceDiv = document.createElement("div");
                priceDiv.classList.add("product-price");
                priceDiv.textContent = foundProduct.price + "đ"; // Thêm "đ" vào giá trị của price
                cartContent.appendChild(priceDiv); // Thêm priceDiv vào cart-content
                productDiv.appendChild(priceDiv);

                const quantityDiv = document.createElement("div");
                quantityDiv.classList.add("quantity");

                const minusBtn = document.createElement("button");
                minusBtn.textContent = "-";
                quantityDiv.appendChild(minusBtn);

                const quantityInput = document.createElement("input");
                quantityInput.id ="quantity_sku_" + sku_id;
                quantityInput.type = "input";
                quantityInput.value = 1;
                quantityInput.min = 1; // Số nhỏ nhất là 1
                quantityInput.addEventListener("change", () => {
                    if (parseInt(quantityInput.value) < 1) {
                        quantityInput.value = 1;
                    }
                    updateTotalPrice(); // Cập nhật giá trị total price khi thay đổi số lượng
                    saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                });
                quantityInput.addEventListener("keydown", (event) => {
                    // Ngăn sự kiện mặc định của phím (ví dụ: khi người dùng bấm các phím số)
                    event.preventDefault();
                });

                quantityInput.addEventListener("change", () => {
                    // Kiểm tra nếu giá trị nhập vào là số và lớn hơn hoặc bằng 1 thì cập nhật giá trị của input
                    if (!isNaN(quantityInput.value) && parseInt(quantityInput.value) >= 1) {
                        quantityInput.value = parseInt(quantityInput.value);
                        updateTotalPrice(); // Cập nhật giá trị total price khi thay đổi số lượng
                        updateTotalAmount();
                    } else {
                        // Nếu giá trị nhập vào không phải là số hoặc nhỏ hơn 1, đặt lại giá trị của input là 1
                        quantityInput.value = 1;
                        updateTotalPrice(); // Cập nhật giá trị total price khi thay đổi số lượng
                        updateTotalAmount();
                    }
                });
                quantityDiv.appendChild(quantityInput);

                const plusBtn = document.createElement("button");
                plusBtn.textContent = "+";
                quantityDiv.appendChild(plusBtn);

                cartContent.appendChild(quantityDiv); // Thêm quantityDiv vào cart-content
                productDiv.appendChild(quantityDiv);

                const totalPriceDiv = document.createElement("div");
                totalPriceDiv.classList.add("total-price-product");
                totalPriceDiv.textContent = foundProduct.price + "đ"; // Khởi tạo giá trị ban đầu của totalPriceDiv bằng giá trị của price
                cartContent.appendChild(totalPriceDiv); // Thêm totalPriceDiv vào cart-content
                productDiv.appendChild(totalPriceDiv);

                // Thêm sản phẩm vào cart-content
                cartContent.appendChild(productDiv);
                checkCartContent();
                

                productsAddedToCart++;

                // Nếu đã thêm tất cả các sản phẩm vào giỏ hàng, gọi hàm calculateTotalAmount()
                if (productsAddedToCart === productSku.length) {
                    calculateTotalAmount();
                }
                // Hàm cập nhật giá trị total price
                function updateTotalPrice() {
                    const totalPrice = parseInt(foundProduct.price) * parseInt(quantityInput.value);
                    totalPriceDiv.textContent = totalPrice + "đ";
                    saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                }

                // Thêm sự kiện click cho nút minusBtn
                minusBtn.addEventListener("click", () => {
                    const currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                        updateTotalPrice();
                        updateTotalAmount(); // Cập nhật giá trị total khi số lượng thay đổi
                    }
                });

                // Thêm sự kiện click cho nút plusBtn
                plusBtn.addEventListener("click", () => {
                    quantityInput.value = parseInt(quantityInput.value) + 1;
                    saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                    updateTotalPrice();
                    updateTotalAmount(); // Cập nhật giá trị total khi số lượng thay đổi
                });

                // Hàm lưu trạng thái vào localStorage khi checkbox hoặc giá trị input thay đổi
                function saveState(product_id, sku_id, checkboxState, inputValue) {
                    console.log(`Save input ${checkbox.id} = ${inputValue}`);
                    console.log(`Checkbox ${checkbox.id} = ${checkboxState ? "checked" : "unchecked"}`);
                    localStorage.setItem("product_" + sku_id, JSON.stringify({ product_id, sku_id, checkboxState, inputValue }));
                }

                // Hàm khôi phục trạng thái từ localStorage khi tải trang
                function restoreState(product_id, sku_id) {
                    const storedState = localStorage.getItem("product_" + sku_id);
                    if (storedState) {
                        const { checkboxState, inputValue } = JSON.parse(storedState);
                        
                        // Get the checkbox and quantity input elements based on their IDs
                        const checkbox = document.getElementById("sku_" + sku_id);
                        const quantityInput = document.getElementById("quantity_sku_" + sku_id);
                        
                        // Check the checkbox and set the quantity input value
                        checkbox.checked = checkboxState;
                        quantityInput.value = inputValue;
                
                        // Call addProductToCart to update the UI
                    }
                    updateTotalPrice();
                    updateTotalAmount();
                }
                
                function updateTotalAmount() {
                    let totalPrice = 0;
                
                    // Lấy tất cả các checkbox
                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach((checkbox) => {
                        // Kiểm tra nếu checkbox được chọn (checked)
                        if (checkbox.checked) {
                            // Lấy productDiv tương ứng của checkbox
                            const productDiv = checkbox.parentElement;
                            // Tìm totalPriceDiv trong productDiv
                            const totalPriceDiv = productDiv.querySelector(".total-price-product");
                            // Lấy giá trị số từ textContent bỏ đi ký tự 'đ'
                            const price = parseInt(totalPriceDiv.textContent.replace('đ', ''));
                            totalPrice += price;
                        }
                    });
                
                    // Cập nhật giá trị cho temp-money
                    const tempMoneyDiv = document.getElementById("temp-money");
                    tempMoneyDiv.textContent = totalPrice + "đ";
                
                    // Tính thành tiền và cập nhật giá trị cho value-total-money
                    const totalMoneyDiv = document.querySelector(".value-total-money");
                    const totalMoney = totalPrice * 1.1; // Thành tiền = Tạm tính * 1.1
                    totalMoneyDiv.textContent = totalMoney + "đ";
                }
                // Khôi phục trạng thái từ localStorage khi tải trang
                // saveState(product_id, sku_id, checkbox.checked, quantityInput.value);
                restoreState(product_id, sku_id);
            } else {
                console.log("Product not found");
            }
        })
        .catch((error) => console.log("Error: ", error));
}

// Gọi hàm addProducttocart để thêm sản phẩm vào giỏ hàng
calculateTotalAmount();

// test
// addProducttocart("1", "1");
// addProducttocart("3", "17");


// Hàm tính tổng giá trị của tất cả các sản phẩm trong giỏ hàng
function calculateTotalAmount() {
    let totalPrice = 0;
    
    // Lấy tất cả các sản phẩm trong giỏ hàng
    const products = document.querySelectorAll('.product-item');
    products.forEach((product) => {
        // Lấy giá của sản phẩm
        const totalPriceDiv = product.querySelector(".total-price-product");
        const price = parseInt(totalPriceDiv.textContent.replace('đ', ''));
        totalPrice += price;
    });

    // Cập nhật giá trị cho temp-money
    const tempMoneyDiv = document.getElementById("temp-money");
    tempMoneyDiv.textContent = totalPrice + "đ";
    
    // Tính và cập nhật giá trị cho value-total-money
    const totalMoneyDiv = document.querySelector(".value-total-money");
    const totalMoney = totalPrice * 1.1; // Thành tiền = Tạm tính * 1.1
    totalMoneyDiv.textContent = totalMoney + "đ";
}



var resetButton = document.getElementById('reset-button');

function resetCart() {
    const cartContent = document.querySelector(".cart-content");
    cartContent.innerHTML = "";
    // Xóa toàn bộ dữ liệu của local storage
    localStorage.clear();
    // Sau khi xóa hết các phần tử con, kiểm tra lại cart-content để hiển thị hoặc ẩn phần tử no-item
    checkCartContent();
}

// Gắn sự kiện click cho nút resetButton
resetButton.addEventListener("click", resetCart);

// Test the function with example inputs
// Lấy phần tử cart-content và no-item từ DOM
// Lấy phần tử cart-content và no-item từ DOM
const cartContent = document.querySelector(".cart-content");
const noItemDiv = document.getElementById("no-item");
const cartDiv = document.getElementById("cart");

// Hàm kiểm tra xem có sản phẩm trong cart-content không và ẩn/hiện tương ứng
function checkCartContent() {
    if (cartContent.children.length > 0) {
        // Nếu có sản phẩm trong cart-content, ẩn no-item và hiển thị cart
        noItemDiv.style.display = "none";
        cartDiv.style.display = "flex";
    } else {
        // Nếu không có sản phẩm trong cart-content, ẩn cart và hiển thị no-item
        noItemDiv.style.display = "block";
        cartDiv.style.display = "none";
    }
}
function checkStoredProducts() {
    const addedSkuIds = new Set(); // Use a Set to store added sku_ids
    for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        if (key.startsWith("product_")) {
            const { sku_id } = JSON.parse(localStorage.getItem(key));
            if (!addedSkuIds.has(sku_id)) {
                const { product_id, checkboxState, inputValue } = JSON.parse(localStorage.getItem(key));
                addProducttocart(product_id, sku_id, checkboxState, inputValue);
                addedSkuIds.add(sku_id); // Add sku_id to the Set to mark it as added
            }
        }
    }
}
checkStoredProducts();


const thanhToanButton = document.getElementById('Total-footer');

// Add event listener to check total amount and enable/disable the button
thanhToanButton.addEventListener('click', function() {
    const totalMoneyDiv = document.querySelector(".value-total-money");
    const totalMoney = parseInt(totalMoneyDiv.textContent.replace('đ', ''));
    if (totalMoney !== 0) {
        document.getElementById("Total-footer").addEventListener("click", function() {
            // Hiển thị form khi người dùng nhấp vào div "Total-footer"
            document.getElementById("personalInfoForm").style.display = "block";
        });
    } else {
        // Show a message or perform other actions when the total amount is 0
        alert("Vui lòng chọn sản phẩm để thanh toán.");
    }
});
// Gọi hàm checkCartContent khi trang được tải và sau mỗi lần thêm hoặc xoá sản phẩm trong cart-content
document.addEventListener("DOMContentLoaded", checkCartContent);


